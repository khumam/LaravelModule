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
Route::resource('item', ItemController::class);
Route::post('item/list', [ItemController::class, 'list'])->name('item.list');

Route::resource('stock', StockController::class)->except(['show', 'create']);
Route::get('/{id}/create', [StockController::class, 'create'])->name('stock.create');
Route::post('/list', [StockController::class, 'list'])->name('stock.list');
```

## Merubah view
Untuk merubah view, dapat dilihat pada folder `resources/views/item/`
