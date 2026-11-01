<h1 align="center">Pelaporan dan Pemantauan Keamanan Makanan MBG</h1>

## 1. Identitas Mahasiswa
- **Nama:** Muhammad Rasya Ikram Annasafy
- **NIM:** 251511053
- **Kelas:** 2B
- **Program Studi:** D3 Teknik Informatika

## 2. Kebutuhan Environment
* PHP >= 8.1
* Composer
* MySQL / MariaDB
* Web Server (Apache/Nginx/PHP Built-in Server)

## 3. Langkah Instalasi
1. Clone repository proyek ke direktori lokal
```
git clone <url-repository>
cd <nama-folder-proyek>
```
2. Instal seluruh depedensi Laravel menggunakan Composer
```
composer install
```
3. Gandakan file konfigurasi environment
```
cp .env.example .env
```
4. Buat kunci aplikasi baru
```
php artisan key:generate
```

## 4. Konfigurasi Database
1. Buka **XAMPP Control Panel**, lalu nyalakan (Start) module Apache dan MySQL.
2. Buka aplikasi manajemen basis data di browser dan akses `http://localhost/phpmyadmin`.
3. Buat satu database baru dan beri nama misalnya `db_mbg`.
4. Buka file `.env` di teks editor, lalu lakukan konfigurasi seperti di bawah ini:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_mbg
DB_USERNAME=root
DB_PASSWORD=
```

## 5. Cara Migration dan Seeding
Bangun struktur tabel basis data dan isi dengan data sampel otomatis dengan mengeksekusi perintah berikut di terminal:
```
php artisan migrate:fresh --seed
```

## 6. Akun Demo Setiap Role
* **Pelapor**
  * Nama: Rina Amalia
  * Email: rinaamalia@gmail.com
  * Password: rina000
* **Pemantau**
  * Nama: Dedi Kurniawan
  * Email: dedikurniawan@gmail.com
  * Password: dedi123
* **Koordinator**
  * Nama: Sari Rahayu
  * Email: sarirahayu@gmail.com
  * Password: rahayu999

## 7. Cara Menjalankan Aplikasi
Pastikan terminal sudah diarahkan ke dalam direktori proyek, lalu jalankan perintah berikut:
```
php artisan serve
```