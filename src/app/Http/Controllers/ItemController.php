<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Stock;
use App\Services\ItemService;
use Illuminate\Http\Request;
use DataTables;

class ItemController extends Controller
{
    public function index()
    {
        return view('item.index');
    }

    public function create()
    {
        return view('item.create');
    }

    public function show($id, ItemService $itemService)
    {
        $detail = $itemService->detail($id);
        $totalPrice = Stock::where('item_id', $id)->max('price');
        $expired = Stock::where('item_id', $id)->min('expired');

        return view('item.show', compact('detail', 'totalPrice', 'expired'));
    }

    public function list(ItemService $itemService)
    {
        $data = $itemService->getAllData();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return "<div class='btn-group'>
                        <a class='btn btn-primary btn-sm detailButton' href='" . route('item.show', $data->id) . "'>
                            <i class='anticon anticon-search'></i>
                        </a>
                        <form action='" . route('item.destroy', $data->id) . "' method='POST'>" . csrf_field() . " " . method_field('DELETE') . "
                            <button class='btn btn-danger btn-sm deleteButton' data-id='$data->id'>
                                <i class='anticon anticon-delete'></i>
                            </button>
                        </form>
                    </div>";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function store(ItemRequest $request, ItemService $itemService)
    {
        $act = $itemService->store($request);

        if ($act) {
            return redirect()->route('item.index')->with('success', 'Berhasil menambahkan item');
        } else {
            return back()->with('error', 'Gagal menambahkan item');
        }
    }

    public function update($id, ItemRequest $request, ItemService $itemService)
    {
        $act = $itemService->update($request, $id);

        if ($act) {
            return back()->with('success', 'Berhasil mengubah item');
        } else {
            return back()->with('error', 'Gagal mengubah item');
        }
    }

    public function destroy($id, ItemService $itemService)
    {
        $act = $itemService->delete($id);

        if ($act) {
            return back()->with('success', 'Berhasil menghapus item');
        } else {
            return back()->with('error', 'Gagal menghapus item');
        }
    }
}
