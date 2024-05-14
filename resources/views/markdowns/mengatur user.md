# Mengatur User

Pengaturan user merupakan bagian yang harus diisi di awal. Untuk mengakses data user, user harus memiliki akses untuk membuka menu tersebut.

## 1. List Data User

![List data user](docs/user.png)

List data user dapat dibuka dengan masuk pada menu "User Management". Pada halaman ini menampilkan list data user. Klik pada "Tambah User" untuk membuat user. Klik pada "Import" untuk mengimpor data Excel. Button action untuk edit, hapus data user, reset password user, dan switch toggle untuk status aktif user. User dengan status tidak aktif tidak bisa melakukan login.

## 2. Create Data User

![Create data user](docs/usercreate.png)

Klik pada tombol "Tambah User" maka popup untuk create data user akan muncul. Isi form tersebut kemudian klik pada "Simpan" untuk menyimpan data user baru. `telegram_id` bisa didapatkan dari @userinfobot. `telegram_id`, nomor telepon, dan lokasi site bisa dikosongkan.

## 3. Import Data User

![Import data user](docs/userimport.png)

Buat sebuah file Excel dengan kolom `name`, `username`, `password`, `notelp`, `telegram_id`, `nama_site`, dan `role`, kemudian isi dengan data user yang ada. Kolom `notelp`, `telegram_id`, dan `nama_site` boleh dikosongkan. `nama_site` dan `role` disesuaikan dengan data site dan role yang tersedia di aplikasi.

Setelah membuat Excel data user, buka menu "User Management" kemudian klik pada tombol "Import" dan pilih file Excel yang dibuat tadi kemudian klik "Import".

## 4. Edit Data User

![Edit data user](docs/useredit.png)

Klik pada button action di sebelah kanan data user dengan ikon pensil kemudian akan muncul popup untuk edit data user. Ubah data user dengan data yang benar kemudian klik "Simpan".

## 5. Delete Data User

Klik pada button action di sebelah kanan data user dengan ikon tempat sampah untuk menghapus data user. Apabila user dihapus, maka data terkait user ini akan ikut terhapus juga seperti data laporan rutin dan insidensial.

## 6. Reset Password

Klik pada button action di sebelah kanan data user dengan ikon kunci untuk reset password user. Setelah direset, password user akan kembali menjadi "password".

## 7. Mengubah Status Aktif User

Klik pada switch pada kolom `active?` di tabel user. Apabila user tidak aktif maka user tidak bisa login.
