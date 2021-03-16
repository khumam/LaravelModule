<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockRequest;
use App\Models\Item;
use App\Services\StockService;
use Illuminate\Http\Request;
use DataTables;

class StockController extends Controller
{
    public function index()
    {
        return view('admin.stock.index');
    }

    public function create($id)
    {
        $detail = Item::where('id', $id)->first();

        return view('item.create_transaction', compact('detail'));
    }

    public function list(Request $request, StockService $stockService)
    {
        $data = $stockService->getAllDataById($request->id);
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return "<div class='btn-group'>
                        <button class='btn btn-danger btn-sm deleteButton' data-id='$data->id' data-itemid='$data->item_id'>
                            <i class='anticon anticon-delete'></i>
                        </button>
                    </div>";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function store(StockRequest $request, StockService $stockService)
    {
        $act = $stockService->store($request);

        if ($act) {
            return redirect()->route('item_show', $request->item_id)->with('success', 'Berhasil menambahkan transaksi', 'Stok akan dihitung otomatis');
        } else {
            return back()->with('error', 'Gagal menambahkan transaksi');
        }
    }

    public function update(Request $request, StockService $stockService)
    {
        $act = $stockService->update($request);

        if ($act) {
            return back()->with('success', 'Berhasil mengubah transaksi');
        } else {
            return back()->with('error', 'Gagal mengubah transaksi');
        }
    }

    public function delete(Request $request, StockService $stockService)
    {
        $act = $stockService->delete($request);

        if ($act) {
            return $this->sendNotificiation('success', 'Berhasil menghapus transkasi', 'Stok akan dihitung otomatis');
        } else {
            return $this->sendNotificiation('error', 'Gagal menghapus transkasi');
        }
    }
}
