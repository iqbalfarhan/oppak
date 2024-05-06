# OPPAK - Operasional SITE PAK

Aplikasi ini bertujuan untuk memonitoring pekerjaan PAK di site/sto yang bersangkutan.

Aplikasi OPPAK ini dibangun menggunakan Laravel 11, Livewire, Tailwind CSS, dan DaisyUI.

## Instalasi OPPAK

### Persyaratan Server

1. PHP 8.2 atau versi yang lebih tinggi.
2. Ekstensi PHP yang harus diinstal:
    - php-mysql
    - php-intl
    - php-common
    - php-mbstring
    - php-gd
    - php-xml
    - php-dom
    - php-zip
    - php-ldap
3. Database MySQL.
4. Composer.

### Petunjuk Instalasi

1. Letakkan source code OPPAK di server, misalnya di `/var/www` jika menggunakan Apache atau Nginx. Jika menggunakan PHP Serve, letakkan di mana saja.
2. Salin file environment dengan menjalankan perintah `cp .env.example .env`.
3. Buka file .env dan lakukan pengeditan khususnya pada bagian database `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD`.
4. Jalankan `composer install`.
5. Jalankan perintah `php artisan oppak:install`.
6. Untuk mereset data, gunakan perintah `php artisan oppak:reset`.
7. Saat pertama kali masuk, OPPAK menyediakan akun super yang bisa diakses dengan username "super" dan password "adminoke".

### Konfigurasi Awal

1. Isi data site satu per satu atau impor data dari file Excel dengan mengeklik tombol "import" pada halaman site management.
2. Isi data pengguna satu per satu atau impor data dari file Excel dengan mengeklik tombol "import" pada halaman user management.
