# Aplikasi OPPAK - Operasional SITE PAK

Template starter aplikasi ini ditujukan sebagai template code dasar sebelum membuat aplikasi agar cepat. Template starter ini mengharuskan memiliki paket sebagai berikut ini:

-   [Laravel 11 : membutuhkan minimal PHP 8.2](https://laravel.com/docs/11.x)
-   [Livewire 3 : sebagai frontent laravel 11](https://livewire.laravel.com/)
-   [Bun : sebagai package manager js](https://bun.sh)
-   [Tailwindcss : sebagai css entity](https://tailwindcss.com/docs/guides/laravel)
-   [Daisyui : thema bawaan menggunakan tailwindcss](https://daisyui.com/components/)
-   [Adminer : database management system](https://github.com/onecentlin/laravel-adminer)

Silakan jalankan perintah untuk menginstall menggunakan composer maupun pnpm. silakan ubah dokumentasi ini di file README.md dan sesuaikan dengan aplikasi yang sedang dibangun.

## Fitur bawaan

Berikut ini adalah beberapa fitur bawaan yang disediakan oleh template starter ini:

-   Frontend menggunakan livewire
-   Authentication login dan register
-   User management
-   Halaman profile user yang masuk
-   Role dan Permission menggunakan spatie laravel permission
-   Livewire sweetalert
-   Database management system menggunakan adminer laravel
-   Halaman responsive sudah disedsuaikan dengan resolusi perangkat

## Setelah copy repository

```
cp .env.example .env
composer install
bun install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link

```

## Instalasi OPPAK

berikut ini adalah cara untuk menginsatall oppak di server

-   harap pastikan versi php sudah 8.2 atau diatasnya, sudah install composer, dan sudah menginstall mysql-server
-   clone dari repositori git atau mendapatkan source code oppak ke lokasi web server biasanya /var/www
-   masuk ke directory oppak kemudian jalankan `composer install`
-   jalankan `php artisan oppak:install`
-   kemudian buka aplikasi di ip atau localhost
