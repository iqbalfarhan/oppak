# Ticketing

Fitur ticketing ini berfungsi untuk mencatat ticket yang dibuat oleh admin dan dikerjakan oleh helpdesk. Terdapat fitur log ticket yang berisi riwayat pengerjaan ticket disertai foto. Admin dapat menutup ticket setelah helpdesk meminta untuk menutup ticket. Berikut ini adalah alur pengerjaan ticket:

1. Admin membuat ticket.
2. Helpdesk membuka detail ticket dan mengerjakan ticket.
3. Helpdesk merubah nilai progress ticket sesuai dengan progres pengerjaan ticket (progress ada di halaman detail ticket).
4. Helpdesk menambahkan log eviden dalam chat pada halaman detail ticket.
5. Setelah selesai, helpdesk membuat request close ticket (terdapat button "Ajukan Close Ticket" di halaman detail ticket).
6. Admin memeriksa progress ticket sudah sesuai atau belum.
7. Jika progress dan ticket sudah sesuai, admin akan melakukan close ticket (dari halaman list ticket atau dari detail ticket).

## 1. Halaman Ticketing

![Halaman ticketing](docs/ticketing.png)

Halaman ini berisi summary status ticket, filter ticket, dan list data ticket.

-   **Summary ticket belum selesai (warna abu-abu)** berisikan nilai jumlah ticket yang belum selesai dikerjakan. Card ini dapat diklik untuk menampilkan data ticket yang belum selesai saja.
-   **Summary ticket request close (warna kuning)** berisikan nilai jumlah ticket yang sudah selesai dikerjakan tetapi belum ditutup oleh admin. Card ini dapat diklik untuk menampilkan data ticket yang sudah ready untuk diclose oleh admin.
-   **Summary ticket selesai (warna hijau)** berisikan nilai jumlah ticket yang selesai dikerjakan. Card ini dapat diklik untuk menampilkan data ticket yang selesai saja.

Kemudian terdapat list data ticket yang memiliki button action edit (icon pensil) dan hapus (icon tempat sampah) di sebelah kanan data.

## 2. Detail Ticketing

![Detail ticket](docs/ticketingdetail.png)

Halaman detail ini terdapat informasi terkait ticket, action data ticket, log chat progress ticket, action untuk mengajukan close ticket atau membatalkan pengajuan ticket, close ticket atau buka kembali ticket.

## 3. Membuat Ticket

![Create ticket](docs/ticketingcreate.png)

Pada menu "Ticketing" terdapat button dengan label "Buat Ticket". Klik button tersebut dan akan muncul popup form create ticket. Isi data ticket dan kemudian klik simpan.

## 4. Edit Ticket

![Edit ticket](docs/ticketingedit.png)

Untuk mengedit ticket, user dapat klik pada button action dengan icon pensil. Setelah klik, akan muncul popup form edit ticket. Isi atau ubah ticket kemudian klik simpan untuk menyimpan perubahan ticket.

## 5. Hapus Ticket

Untuk menghapus ticket, user dapat klik pada button action dengan icon tempat sampah. Hapus ticket hanya dapat dilakukan oleh role yang memiliki akses untuk menghapus ticket.
