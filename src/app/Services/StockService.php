<?php

namespace App\Services;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Services\ItemService;

class StockService
{
    private $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function get($id)
    {
        return Stock::where('id', $id)->first();
    }

    public function getAllData()
    {
        return Stock::latest()->get();
    }

    public function getAllDataById($id)
    {
        return Stock::where('item_id', $id)->latest()->get();
    }

    public function store(Request $request)
    {
        Stock::create(
            [
                'item_id' => $request->item_id,
                'expired' => $request->expired,
                'invoice' => $request->invoice,
                'total' => $request->total,
                'price' => $request->price,
            ]
        );

        return $this->itemService->calculateStock($request->item_id);
    }

    public function update(Request $request, $id)
    {
        Stock::where('id', $id)->update(
            [
                'expired' => $request->expired,
                'invoice' => $request->invoice,
                'total' => $request->total,
                'price' => $request->price,
            ]
        );

        return $this->itemService->calculateStock($request->item_id);
    }

    public function delete($id)
    {
        Stock::where('id', $id)->delete();
        $item = $this->get($id);

        return $this->itemService->calculateStock($item->item_id);
    }

    public function checkDuplicate($invoice = null, $item_id = null, $id = null)
    {
        return ($id == null) ? (Stock::where('invoice', $invoice)->where('item_id', $item_id)->count() == 0 ? true : false) : (Stock::where('invoice', $invoice)->where('item_id', $item_id)->whereNotIn('id', [$id])->count() == 0 ? true : false);
    }
}
