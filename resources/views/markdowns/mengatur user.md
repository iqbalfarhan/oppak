# Mengatur user

Pengaturan user merupakan bagian yang harus diisi diawal. Untuk mengakses data user, user harus memiliki akses untuk membuka menu tersebut.

## 1. List data user

![List data user](docs/user.png)

List data user dapat dibuka dengan masuk pada menu "user mangement". pada halaman ini menampilkan list data user. klik pada "tambah user" untuk membuat user. klik pada "import" untuk import data excel, button action untuk edit, hapus data user, reset password user dan switch toggle untuk status aktif user. user dengan status tidak aktif tidak bisa melakukan login.

## 2. Create data user

![List data user](docs/usercreate.png)

Klik pada tombol "tambah user" maka popup untuk create data user. isi form tersebut kemudian klik pada "simpan" untuk menyimpan data user baru. telegram_id bisa didapatkan dari @userinfobot. telegram_id, nomor telepon dan lokasi site bisa di kosongkan.

## 3. Import data user

![List data user](docs/userimport.png)

Buat sebuah file excel dengan kolom name, username, password, notelp, telegram_id, nama_site dan role, kemudian isi dengan data user yang ada. kolom notelp, telegram_id dan nama site boleh dikosongkan. nama site dan role disesuaikan dengan data site dan role yang tersedia di aplikasi.

Setelah membuat excel data user, buka menu "user management" kemudian klik pada tombol "import" dan pilih file excel yand dibuat tadi kemudian klik "import".

## 4. Edit data user

![List data user](docs/useredit.png)

Klik pada button action disebelah kanan data user dengan icon pensil kemudian akan muncul popup untuk edit data user. ubah data user dengan data yang benar kemudian klik simpan.

## 5. Delete data user

Klik pada button action disebelah kanan data user dengan icon tempat sampah untuk menghapus data user. apabila user dihapus maka data terkait user ini akan ikut terhapus juga seperti data laporan rutin dan insidensial.

## 6. Reset password

Klik pada button action disebelah kanan data user dengan icon kunci untuk reset password user. setelah direset, password user akan kembali menjadi "password".

## 7. Mengubah status aktif user

Klik pada switch pada kolom active? di table user. apabila user tidak aktif maka user tidak bisa login.
