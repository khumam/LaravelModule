# StockModule
Modul penyimpanan barang. Ini merupakan official repo dari Barra Dev Studio. Modul ini berisi controller, view, models, dan migration untuk pendataan barang. Adapun fiturnya sebagai berikut

1. CRUD Barang
2. CRUD Pendataan transaksi stok barang
3. Detail barang
4. Detail transaksi stok barang

## Installasi
```
composer require barradev/stockmodule
```

Setelah berhasil diinstal, jalankan perintah

```
php artisan stockmodule:publish
```

## Route
Tambahkan route berikut
```php
Route::prefix('item')->group(function () {
    Route::get('/', [ItemController::class, 'index'])->name('item_page');
    Route::get('/list', [ItemController::class, 'list'])->name('item_list');
    Route::post('store', [ItemController::class, 'store'])->name('item_store');
    Route::post('update', [ItemController::class, 'update'])->name('item_update');
    Route::delete('delete', [ItemController::class, 'delete'])->name('item_delete');
    Route::get('{id}/detail', [ItemController::class, 'show'])->name('item_show');
});

Route::prefix('stock')->group(function () {
    Route::get('/', [StockController::class, 'index'])->name('stock_page');
    Route::get('/list', [StockController::class, 'list'])->name('stock_list');
    Route::post('store', [StockController::class, 'store'])->name('stock_store');
    Route::post('update', [StockController::class, 'update'])->name('stock_update');
    Route::delete('delete', [StockController::class, 'delete'])->name('stock_delete');
});
```

## Merubah view
Untuk merubah view, dapat dilihat pada folder `resources/views/item/`
