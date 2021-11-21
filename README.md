# FTI e-Surat
Aplikasi Sistem Manajemen Surat Sederhana dengan laravel v8.x System requirementsnya liat di sini yah https://laravel.com/docs/8.x/deployment#server-requirements

# Konfigurasi
Setelah download/clone jalankan perintah berikut untuk menginstall dependency composer via command prompt/terminal etc.

```bash
cd folder fti-eSurat
composer install
```

# Setup Database
Copy file .env.example dengan nama .env dan sesuaikan konfigurasi database anda. Contoh
```php
DB_DATABASE=esurat-fti
DB_USERNAME=root
DB_PASSWORD=
```
Kemudian jalankan perintah berikut untuk menggenerate key
```bash
php artisan key:generate
```

Jalankan perintah berikut untuk serve aplikasi

```bash
php artisan serve
```
Kemudian akses http://localhost:8000 via browser kesukaan lo
Jadi deh ^_^

# Pengguna
Untuk demo login dengan menggunakan username/password
```bash
user : admin@staff.ukdw.ac.id
Pass : 123456789
-----------------------------
user : dosen@si.ukdw.ac.id
Pass : 123456789
-----------------------------
user : mahasiswa@si.ukdw.ac.id
Pass : 123456789
```

# License
This project is licensed under the MIT License - see the [License File](LICENSE) for details

# Info
php yang digunakan harus sama, disini saya menggunakan php 7.3.7
