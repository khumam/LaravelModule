<?php
/*
 * This file is part of the Stock Module package.
 *
 * (c) Khoerul Umam <id.khoerulumam@gmail.com>
 *
 */

namespace BarraDev\StockModule;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class StockModulePublishCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'stockmodule:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish Stock Module assets from vendor packages';

    /**
     * Compatiblity for Lumen 5.5.
     *
     * @return void
     */
    public function handle()
    {
        $this->fire();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->publishModels();
        $this->publishMigrations();
        $this->publishService();
        $this->publishView();
        $this->publishAssets();

        $this->info("Publishing Stock Module complete");
    }


    /**
     * Publish the directory to the given directory.
     *
     * @param  string  $from
     * @param  string  $to
     * @return void
     */
    protected function publishDirectory($from, $to)
    {
        $exclude = array('..', '.', '.DS_Store');
        $source = array_diff(scandir($from), $exclude);

        foreach ($source as $item) {
            $this->info("Copying file: " . $to . $item);
            File::copy($from . $item, $to . $item);
        }
    }

    /**
     * Publish model.
     *
     * @return void
     */
    protected function publishModels()
    {
        $targetPath = app()->path() . "/Models/";

        if (!File::isDirectory($targetPath)) {
            File::makeDirectory($targetPath, 0777, true, true);
        }

        $this->publishDirectory(__DIR__ . '/database/models/', app()->path() . "/Models/");
    }

    /**
     * Publish migrations.
     *
     * @return void
     */
    protected function publishMigrations()
    {
        $this->publishDirectory(__DIR__ . '/database/migrations/', app()->databasePath() . "/migrations/");
    }

    /**
     * Publish view.
     *
     * @return void
     */
    protected function publishView()
    {
        $this->publishDirectory(__DIR__ . '/resources/views/', app()->resource_path() . "/views");
    }

    /**
     * Publish Service
     * 
     * @return
     */
    protected function publishService()
    {
        $targetPath = app()->path() . "/Services/";

        if (!File::isDirectory($targetPath)) {
            File::makeDirectory($targetPath, 0777, true, true);
        }

        $this->publishDirectory(__DIR__ . '/database/Services/', app()->path() . "/Services/");
    }

    /**
     * Publish Service
     * 
     * @return
     */
    protected function publishAssets()
    {
        $targetPath = app()->public_path() . "/assets/";

        if (!File::isDirectory($targetPath)) {
            File::makeDirectory($targetPath, 0777, true, true);
        }

        $this->publishDirectory(__DIR__ . '/public/assets/', app()->public_path() . "/assets/");
    }
}
