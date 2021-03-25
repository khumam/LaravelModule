@extends('layouts.master')
@push('css')
<link href="{{ url('assets/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endpush
@section('content')
@include('components.breadcrumb', ['title' => 'Item', 'lists' => ['Home' => '/', 'Item' => '/item', 'Create transaction' => '#']])

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4>Tambahkan Transaksi</h4>
                        <p>Tambahkan detail transaksi untuk menambah stok pada barang yang dimaksud</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Transaksi</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('stock.store') }}" id="formdata" method="POST">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $detail->id }}">
                    <div class="form-group">
                        <label for="name">Nama Item</label>
                        <input type="text" class="form-control" value="{{ $detail->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="invoice">No Invoice</label>
                        <input type="text" name="invoice" id="invoice" placeholder="No Invoice" required class="form-control @error('invoice') is-invalid @enderror" value="{{ old('invoice') }}">
                        @error('invoice')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="expired">Expired date</label>
                        <input type="date" name="expired" id="expired" placeholder="Expired date" required class="form-control @error('expired') is-invalid @enderror" value="{{ old('expired') }}">
                        @error('expired')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" name="price" id="price" placeholder="Harga item" min="0" required class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                        @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="number" name="total" id="total" placeholder="Total item" min="0" required class="form-control @error('total') is-invalid @enderror" value="{{ old('total') }}">
                        @error('total')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection