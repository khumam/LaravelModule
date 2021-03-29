# Laravel Module Template
Ini adalah template untuk menambahkan modul ke dalam laravel. Modul yang dimaksud adalah sekumpulan file controller, models, dan lain sebagainya yang bisa digunakan kembali

# Instalasi
1. Clone repo ini
2. Copy `composer.json.example` menjadi `composer.json`
3. Isi `composer.json` dengan BENAR
4. Ubah nama file `YourModuleNamePublishCommand.php` dan `YourModuleNameServiceProvider.php` dengan nama module kamu
5. Pastikan penamaan modul benar di setiap bagian dan penamaan file.
6. Pindahkan controller, models, views, dsb ke dalam folder src. Pastikan file dimasukkan ke dalam folder yang sesuai. 

# Publishing
Untuk mempublish repo kalian supaya bisa digunakan dilain projek, lakukan hal berikut
1. Pastikan semua data sudah benar, penamaan file dan class sudah benar, dan tidak ada typo
2. Push ke repo masing-masing
3. Masuk ke packagist, dan tambahkan package baru di sana
4. Jika belum berhasil, maka ada kesalahan di `composer.json` yang sudah dibuat
