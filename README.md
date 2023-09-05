<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sistem Informasi Manajemen Aset Berbasis Web Untuk BUMDES (Badan Usaha Milik Desa)


Sistem informasi manajemen aset biasanya diperlukan untuk memantau dan mengelola aset suatu organisasi atau perusahaan. Tujuan utama dari sistem ini adalah untuk membantu organisasi dalam mengoptimalkan penggunaan aset mereka dan memastikan bahwa mereka beroperasi secara efektif dan efisien.



## Fitur
1. Manajemen User
Fitur ini berguna untuk mengelola data user yang menggunakan sistem informasi ini, seperti menambahkan user, edit user, dan hapus user. Hak ases ini dimiliki oleh sekretaris (superadmin).

 

2. Data Master / Manajemen Aset
Data master adalah fitur yang berguna untuk menambahkan data aset. Pada menu ini terdiri dari beberapa menu lain yaitu Data Barang, Kategori, Lokasi, dan Satuan yang berfungsi untuk mengelompokan barang/aset. Semua pengguna yaitu Sekretaris, Direktur, dan Kepala Usaha memiliki hak ases ini. Yang membedakan adalah jika sekretaris dan direktur bisa melihat semua data yang ditambahkan oleh semua pengguna. Sedangkan kepala usaha hanya bisa melihat data barang/aset yang dia tambahkan saja.


3. Pengadaan Barang
Pengadaan barang merupakan fitur untuk mengelola pengadaan barang baru. Semua pengguna memiliki akses pengadaan barang ini namun fungsinya berbeda.

4. Laporan
Laporan digunakan untuk melihat dan mencetak data pada aplikasi. Pada menu ini, terdiri dari Statistik untuk melihat grafik aset, Keuangan untuk melihat harga dan total harga dari keseluruhan aset, Cetak laporan berguna untuk mencetak data aset berdasarkan tanggal yang dipilih, dan Cetak label untuk mencetak label masing-masing aset guna memudahkan pelacakan aset.

5. Riwayat
Pada menu riwayat terdapat penghapusan aset. Fungsinya adalah untuk melihat data aset yang telah dihapus, nantinya bisa dikembalikan atau di hapus secara permanent. Hak aksesnya sama seperti diatas, Kepala Usaha hanya dapat melihat data yang dia hapus saja, sedangkan Kepala Usaha dan Sekretaris bisa melihat semua riwayat penghapusan aset.

6. Pengaturan
Pengaturan terdapat reset password atau ubah password. Fitur ini digunakan untuk memperbarui password sesuai keinginan pengguna.



## Teknologi

Sistem Informasi Manajemen Aset menggunakan beberapa Teknologi diantaranya :

- Laravel - The PHP Framework for Web Artisans
- JavaScript - JavaScript, often abbreviated as JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS.
- Bootstrap - Bootstrap is a free and open-source CSS framework directed at responsive, mobile-first front-end web development. 


## Installasi

Lakukan Clone Project/Unduh manual .

Aktifkan Xampp Control Panel, lalu akses ke http://localhost/phpmyadmin/.

Buat database dengan nama 'simaset'.

Jika melakukan Clone Project, rename file .env.example dengan env dan hubungkan
database nya dengan mengisikan nama database, 'DB_DATABASE=simaset'.


Kemudian, Ketik pada terminal :
```sh
php artisan migrate
```

Lalu ketik juga

```sh
php artisan migrate:fresh --seed
```

Jalankan aplikasi 

```sh
php artisan serve
```

Akses Aplikasi di Web browser 
```sh
127.0.0.1:8000
```



![Screenshot_935](https://github.com/dwipurnomo12/Sistem-Informasi-Manajemen-Aset-Bumdes/assets/105181667/ca70c6b3-3a3f-4fd3-be2b-7bdff59917f1)

![Screenshot_936](https://github.com/dwipurnomo12/Sistem-Informasi-Manajemen-Aset-Bumdes/assets/105181667/b2a44f40-6e05-4288-ae9c-0c8a116bfcbe)

![Screenshot_937](https://github.com/dwipurnomo12/Sistem-Informasi-Manajemen-Aset-Bumdes/assets/105181667/a691b1e1-8f4b-4091-a68d-36477d493fa2)

![Screenshot_939](https://github.com/dwipurnomo12/Sistem-Informasi-Manajemen-Aset-Bumdes/assets/105181667/82643220-d346-477c-a17a-5e06521687c5)

![Screenshot_940](https://github.com/dwipurnomo12/Sistem-Informasi-Manajemen-Aset-Bumdes/assets/105181667/e1046ddd-c486-46cb-8d66-b9bf335d5fd9)


