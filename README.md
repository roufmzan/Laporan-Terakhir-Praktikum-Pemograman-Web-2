<div align="center">

# Laporan Praktikum Pemrograman Web 2
### Lab 7: PHP CodeIgniter 4 & Vue.js

![Universitas](https://img.shields.io/badge/Universitas-Pelita%20Bangsa-blue?style=for-the-badge)
![Status](https://img.shields.io/badge/Status-Completed-success?style=for-the-badge)
![Framework](https://img.shields.io/badge/Framework-CodeIgniter%204-orange?style=for-the-badge)

![PHP](https://img.shields.io/badge/PHP-8.2-blue)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4-red)
![Vue.js](https://img.shields.io/badge/Vue.js-3-green)
![License](https://img.shields.io/badge/License-MIT-yellow)

Proyek ini menghubungkan backend CodeIgniter 4 dengan frontend Vue.js untuk membuat aplikasi CRUD artikel. Ini adalah laporan praktikum Pemrograman Web 2 yang mendemonstrasikan integrasi antara framework PHP modern dengan framework JavaScript progresif.

</div>

---

## 👤 Profil Mahasiswa

- **Nama:** RO'UF MUHAMMAD FAUZAN
- **NIM:** 312410157
- **Kelas:** I241A
- **Program Studi:** Teknik Informatika
- **Fakultas:** Teknik
- **Universitas:** Universitas Pelita Bangsa

---

## 📑 Daftar Isi Praktikum

1. [Praktikum 1: Pengenalan PHP Framework & Instalasi CodeIgniter 4](#-praktikum-1-pengenalan-php-framework--instalasi-codeigniter-4)
2. [Praktikum 2: Framework Lanjutan - Pembuatan CRUD Sederhana](#-praktikum-2-framework-lanjutan---pembuatan-crud-sederhana)
3. [Praktikum 3: Struktur Tampilan Menggunakan View Layout & View Cell](#-praktikum-3-struktur-tampilan-menggunakan-view-layout--view-cell)
4. [Praktikum 4: Implementasi Modul Login, Autentikasi, & Filter](#-praktikum-4-implementasi-modul-login-autentikasi--filter)
5. [Praktikum 5: Fitur Penomoran Halaman (Pagination) & Pencarian Data](#-praktikum-5-fitur-penomoran-halaman-pagination--pencarian-data)
6. [Praktikum 6: Relasi Antar Tabel (One-to-Many) & Query Builder](#-praktikum-6-relasi-antar-tabel-one-to-many--query-builder)
7. [Praktikum 7: Fitur Validasi Form & Unggah File Gambar Artikel](#-praktikum-7-fitur-validasi-form--unggah-file-gambar-artikel)
8. [Praktikum 8: Integrasi AJAX (Asynchronous JavaScript and XML)](#-praktikum-8-integrasi-ajax-asynchronous-javascript-and-xml)
9. [Praktikum 9: Implementasi AJAX Pagination & Live Search](#-praktikum-9-implementasi-ajax-pagination--live-search)
10. [Praktikum 10: Pembangunan RESTful API Backend dengan format JSON](#-praktikum-10-pembangunan-restful-api-backend-dengan-format-json)
11. [Praktikum 11: Implementasi RESTful API Client & Pengujian Endpoint](#-praktikum-11-implementasi-restful-api-client--pengujian-endpoint)
12. [Praktikum 12: Pengenalan Arsitektur Clean Code & Pengaturan Environment](#-praktikum-12-pengenalan-arsitektur-clean-code--pengaturan-environment)
13. [Praktikum 13: Implementasi Web Security & Penanganan SQL Injection](#-praktikum-13-implementasi-web-security--penanganan-sql-injection)
14. [Praktikum 14: Finalisasi Proyek Portal Berita & Deployment Hosting](#-praktikum-14-finalisasi-proyek-portal-berita--deployment-hosting)

---

## 📝 Detail Praktikum

### 1️⃣ Praktikum 1: Pengenalan PHP Framework & Instalasi CodeIgniter 4
* **Tujuan:** Memahami konsep dasar Framework, arsitektur *Model-View-Controller* (MVC), serta melakukan inisiasi awal project menggunakan CodeIgniter 4.
* **Langkah Kerja:**
  1. Membuka file konfigurasi PHP (`php.ini`) via XAMPP Control Panel untuk mengaktifkan ekstensi wajib: `php-json`, `php-mysqlnd`, `php-xml`, `php-intl`, dan `libcurl`.
  2. Mengunduh arsip CodeIgniter 4, mengekstraknya ke direktori kerja web server (`htdocs/lab11_php_ci`), dan mengubah strukturnya.
  3. Menjalankan perintah bawaan CLI Command Line Tool melalui terminal:
     ```bash
     php spark serve
     ```
  4. Menyalin file `.env` dan mengaktifkan mode debugging dengan mengubah parameter `CI_ENVIRONMENT` menjadi `development`.
* **Hasil Akhir:** Tampilan halaman bawaan (*Welcome Page*) CodeIgniter 4 berhasil dimuat dengan sempurna pada alamat port lokal `http://localhost:8080`.

### 2️⃣ Praktikum 2: Framework Lanjutan - Pembuatan CRUD Sederhana
* **Tujuan:** Memahami konsep dasar manipulasi database menggunakan entitas Model serta mengimplementasikan operasi dasar CRUD (*Create, Read, Update, Delete*).
* **Langkah Kerja:**
  1. Membuat database baru bernama `lab_ci4` dan menginisialisasi skema tabel `artikel`:
     ```sql
     CREATE TABLE artikel (
         id INT(11) AUTO_INCREMENT PRIMARY KEY,
         judul VARCHAR(200) NOT NULL,
         isi TEXT,
         gambar VARCHAR(200),
         status TINYINT(1) DEFAULT 0,
         slug VARCHAR(200)
     );
     ```
  2. Melakukan konfigurasi detail kredensial koneksi database MySQL pada file `.env` proyek.
  3. Membangun file Model data `ArtikelModel.php` di dalam direktori `app/Models` dengan mendaftarkan field-field yang diizinkan (`$allowedFields`).
  4. Menyusun metode pengolah data di Controller dan menyediakan formulir HTML untuk menambah, mengubah, serta menghapus data artikel.
* **Hasil Akhir:** Aplikasi dasar portal berita mampu menyimpan data langsung ke dalam tabel database MySQL.

### 3️⃣ Praktikum 3: Struktur Tampilan Menggunakan View Layout & View Cell
* **Tujuan:** Mengorganisasi struktur visual user-interface secara modular menggunakan fitur bawaan *View Layout* dan *View Cell* agar kode program lebih reusable.
* **Langkah Kerja:**
  1. Membuat struktur folder template tata letak utama pada direktori `app/Views/layout/main.php`.
  2. Menentukan wilayah penempatan dinamis konten halaman utama menggunakan potongan perintah:
     ```php
     <?= $this->renderSection('content') ?>
     ```
  3. Memasukkan pemanggilan komponen parsial header, navigasi menu, dan footer ke dalam template dasar.
  4. Membuat komponen dinamis *View Cell* untuk menampilkan widget "Artikel Terkini" secara independen di panel samping halaman web.
* **Hasil Akhir:** Seluruh halaman visual website (Halaman Utama, Tentang, Kontak) menggunakan cetakan layout master yang seragam dan rapi.

### 4️⃣ Praktikum 4: Implementasi Modul Login, Autentikasi, & Filter
* **Tujuan:** Memahami mekanisme sistem keamanan aplikasi melalui manajemen session autentikasi user dan penerapan pembatasan hak akses route (*Filter*).
* **Langkah Kerja:**
  1. Membuat tabel database baru bernama `user` untuk menampung rekaman data autentikasi user pengelola.
  2. Membangun berkas `UserModel.php` dan merancang Controller khusus proses pendaftaran serta verifikasi kata sandi masuk admin.
  3. Menyusun class Filter autentikasi khusus (`AuthFilter.php`) guna memvalidasi status hak akses aktif user sebelum masuk menu admin.
  4. Mendaftarkan filter tersebut ke dalam file konfigurasi routes utama (`app/Config/Filters.php`).
* **Hasil Akhir:** Halaman administrasi data kelola berita aman secara penuh dari akses ilegal non-admin. Jika diakses paksa, pengguna otomatis dialihkan ke halaman login.

### 5️⃣ Praktikum 5: Fitur Penomoran Halaman (Pagination) & Pencarian Data
* **Tujuan:** Mengimplementasikan teknik pembatasan baris data (*Pagination*) dan query penyaringan data (*Searching*) untuk mengoptimalkan pemuatan data dalam jumlah besar.
* **Langkah Kerja:**
  1. Mengubah struktur logika pemanggilan data model pada metode controller `admin_index()`:
     ```php
     $this->artikelModel->paginate(10);
     ```
  2. Merangkai link navigasi pagination halaman dinamis pada file view dengan kode bawaan engine:
     ```php
     <?= $pager->links() ?>
     ```
  3. Menambahkan klausa penyaringan query database `like()` berdasarkan parameter masukan string dari form pencarian admin.
* **Hasil Akhir:** Tampilan baris daftar data artikel pada panel admin terbagi rapi maksimal 10 rekaman per halaman dan dilengkapi form pencarian teks.

### 6️⃣ Praktikum 6: Relasi Antar Tabel (One-to-Many) & Query Builder
* **Tujuan:** Menerapkan relasi basis data antar tabel (*One-to-Many*) dan menyatukan data menggunakan query join via platform *Query Builder* CodeIgniter 4.
* **Langkah Kerja:**
  1. Membuat tabel master data pendukung bertajuk `kategori` dan menghubungkannya ke dalam struktur tabel `artikel` melalui kolom foreign key `id_kategori`.
  2. Menyusun string sintaks pengambilan data join relasi tabel menggunakan pustaka Query Builder:
     ```php
     $builder = $db->table('artikel');
     $builder->select('artikel.*, kategori.nama_kategori');
     $builder->join('kategori', 'kategori.id_kategori = artikel.id_kategori');
     ```
  3. Mengubah antarmuka form input tambah data artikel agar menyediakan pilihan dropdown dinamis yang bersumber dari tabel kategori.
* **Hasil Akhir:** Setiap entitas artikel berita yang diterbitkan memiliki status klasifikasi kategori yang jelas dan informatif.

### 7️⃣ Praktikum 7: Fitur Validasi Form & Unggah File Gambar Artikel
* **Tujuan:** Mengimplementasikan komponen pengaman data berupa aturan validasi input form dan melakukan manajemen berkas media (*File Upload*) gambar ke dalam direktori server.
* **Langkah Kerja:**
  1. Menambahkan atribut parameter forms wajib berupa properti `enctype="multipart/form-data"` pada komponen view.
  2. Menentukan skema aturan validasi berkas pada controller seperti tipe ekstensi media, batas ukuran berkas maks, serta pesan peringatan error.
  3. Memanfaatkan method pembantu eksekusi perpindahan lokasi penyimpanan berkas media fisik ke penyimpanan lokal:
     ```php
     $fileGambar->move(ROOTPATH . 'public/gambar');
     ```
* **Hasil Akhir:** Aplikasi mampu memvalidasi input teks dengan ketat serta berhasil menyimpan file unggahan gambar artikel ke folder tujuan.

### 8️⃣ Praktikum 8: Integrasi AJAX (Asynchronous JavaScript and XML)
* **Tujuan:** Memahami cara kerja pengiriman request asinkronus menggunakan AJAX untuk memuat data tanpa memicu proses muat ulang halaman (*Page Reload*) secara utuh.
* **Langkah Kerja:**
  1. Memasang link library pendukung framework frontend jQuery CDN pada baris cetakan layout utama.
  2. Membangun endpoint URL internal khusus pada pengelola data controller yang mengembalikan kembalian data berupa respons format objek JSON.
  3. Menyusun skrip JavaScript fungsi penangkap request asinkronus menggunakan perintah `$.ajax()` atau `$.getJSON()`.
* **Hasil Akhir:** Proses manipulasi pemuatan komponen data antarmuka terasa sangat responsif, dinamis, dan mempercepat pengalaman interaksi user.

### 9️⃣ Praktikum 9: Implementasi AJAX Pagination & Live Search
* **Tujuan:** Menggabungkan fungsi sistem navigasi halaman (Pagination) dan pencarian data agar berjalan secara asinkronus memanfaatkan AJAX.
* **Langkah Kerja:**
  1. Menyesuaikan metode penanganan request pada controller admin agar mampu memilah tipe request biasa atau bertipe request AJAX.
  2. Menangkap trigger event input pengetikan teks user pada kolom pencarian menggunakan perintah jQuery `.on('keyup')`.
  3. Mengirimkan parameter string pencarian tersebut ke backend secara langsung di latar belakang aplikasi dan memperbarui blok kontainer tabel HTML secara instan.
* **Hasil Akhir:** Fitur *Live Search* dan pemindahan halaman penomoran berjalan mulus tanpa interupsi kedipan penyegaran layar browser.

### 🔟 Praktikum 10: Pembangunan RESTful API Backend dengan format JSON
* **Tujuan:** Memahami arsitektur sistem integrasi antarmuka aplikasi modern menggunakan arsitektur RESTful API yang menghasilkan output data terstandardisasi format JSON.
* **Langkah Kerja:**
  1. Membuat controller API khusus dengan mewarisi kelas core bawaan CodeIgniter 4 yaitu `ResourceController`.
  2. Memanfaatkan library `ResponseTrait` untuk mempermudah penyusunan struktur status kode respons HTTP otomatis.
  3. Menyusun deretan fungsi standar endpoint API: `index()` (GET), `show()` (GET), `create()` (POST), `update()` (PUT), dan `delete()` (DELETE).
  4. Melakukan simulasi pengujian kualitas respons HTTP, format objek, dan fungsionalitas CRUD endpoint API menggunakan aplikasi REST Client Postman.
* **Hasil Akhir:** Backend sistem siap bertindak sebagai penyedia resource data (*REST Server*) yang dapat diintegrasikan dengan platform lain.

### 1️⃣1️⃣ Praktikum 11: Implementasi RESTful API Client & Pengujian Endpoint
* **Tujuan:** Mengimplementasikan peran aplikasi sebagai konsumen layanan (*REST Client*) yang melakukan konsumsi pertukaran data dari penyedia server luar.
* **Langkah Kerja:**
  1. Menginisialisasi pustaka HTTP Client bawaan CodeIgniter 4 (`Config\Services::curlrequest()`) pada sisi client proyek.
  2. Melakukan request eksternal menuju URL RESTful API yang telah dibangun pada modul sebelumnya.
  3. Melakukan parsing (dekode) data string mentah objek JSON menjadi bentuk format array asosiatif PHP agar bisa dirender pada interface views.
* **Hasil Akhir:** Modul integrasi antar platform eksternal berjalan lancar dengan respon data yang sinkron.

### 1️⃣2️⃣ Praktikum 12: Pengenalan Arsitektur Clean Code & Pengaturan Environment
* **Tujuan:** Memahami penataan pola arsitektur kode bersih (*Clean Code*), pemisahan logika bisnis yang ideal, serta manajemen rahasia kredensial sistem.
* **Langkah Kerja:**
  1. Melakukan refactoring terhadap struktur fungsi kode yang terlalu gemuk di dalam Controller untuk dipindahkan ke dalam lapisan *Service Layer*.
  2. Mengamankan seluruh variabel sensitif proyek seperti enkripsi enkoder, API Key, password database ke dalam file `.env`.
  3. Memastikan file `.env` telah terdaftar di dalam pengecualian file `.gitignore` repositori git.
* **Hasil Akhir:** Source code aplikasi menjadi jauh lebih terstruktur, mudah dibaca, aman, dan siap dikembangkan dalam tim skala besar.

### 1️⃣3️⃣ Praktikum 13: Implementasi Web Security & Penanganan SQL Injection
* **Tujuan:** Memperkuat keamanan sistem web dari potensi celah serangan siber berbahaya seperti *SQL Injection* dan *Cross-Site Scripting* (XSS).
* **Langkah Kerja:**
  1. Mengganti seluruh query database manual mentah menjadi fungsi Query Builder atau metode *Prepared Statements* bawaan Model Object.
  2. Menerapkan fitur proteksi token CSRF (*Cross-Site Request Forgery*) secara menyeluruh pada setiap form input kirim data portal.
  3. Menggunakan fungsi pembantu filter keamanan data masukan:
     ```php
     esc($userInputString)
     ```
* **Hasil Akhir:** Aplikasi portal berita tangguh dan aman dari injeksi script berbahaya yang dapat merusak database.

### 1️⃣4️⃣ Praktikum 14: Finalisasi Proyek Portal Berita & Deployment Hosting
* **Tujuan:** Melakukan optimasi final aplikasi portal berita secara menyeluruh dan melakukan proses perilisan web agar dapat diakses publik (*Deployment*).
* **Langkah Kerja:**
  1. Menghapus data simulasi sampah pengujian dan mengubah konfigurasi parameter `CI_ENVIRONMENT` dari `development` menjadi `production`.
  2. Melakukan kompresi aset gambar, script CSS, dan JavaScript agar ukuran loading web menjadi lebih ringan.
  3. Mengekspor database lokal ke dalam file format `.sql` dan mengunggahnya ke server database hosting online (cPanel/000webhost/Vercel).
  4. Menyesuaikan konfigurasi jalur URL utama server pada properti `app.baseURL`.
* **Hasil Akhir:** Aplikasi portal berita web resmi online penuh di jaringan internet dan siap diakses oleh masyarakat luas melalui tautan domain publik.

---

## 🚀 Fitur Utama

- **CRUD Artikel Lengkap**: Create, Read, Update, Delete artikel.
- **Backend CodeIgniter 4**: Framework PHP modern dan powerful.
- **Frontend Vue.js**: Framework JavaScript reaktif dan *component-based*.
- **RESTful API**: API endpoints yang terstruktur dengan baik.
- **Desain Responsif**: Tampilan yang menyesuaikan dengan berbagai ukuran layar.

## 📋 Prasyarat Sistem

Sebelum menjalankan proyek ini, pastikan Anda telah menginstal:

- **XAMPP** atau server lokal lainnya (Apache + MySQL)
- **PHP** versi 8.2 atau lebih tinggi
- **Composer** (untuk *dependency management* PHP)
- **Node.js** dan **npm** (untuk *development* Vue.js)

## 📁 Struktur Proyek

```text
lab7_php_ci/
├── app/                      # CI4 App (versi 1)
│   ├── Controllers/          # Controller aplikasi
│   ├── Models/               # Model database
│   ├── Views/                # View templates
│   └── Config/               # Konfigurasi aplikasi
├── ci4/                      # CI4 App (versi 2, dengan frontend Vue)
│   ├── app/                  # Application core
│   ├── public/               # Public assets
│   ├── system/               # CodeIgniter system files
│   ├── writable/             # Writable directories
│   └── frontend-vuejs/       # Frontend Vue.js
├── composer.json             # PHP dependencies
├── env                       # Template konfigurasi environment
└── spark                     # CLI tool
```
## 🛠️ Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/username/Laporan-Terakhir-Praktikum-Pemograman-Web-2-main.git
   cd Laporan-Terakhir-Praktikum-Pemograman-Web-2-main
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Konfigurasi environment**
   ```bash
   cp env .env
   ```
   Edit file `.env` dan sesuaikan konfigurasi database Anda.

4. **Setup database**
   - Buat database baru di MySQL/phpMyAdmin
   - Import file SQL jika tersedia
   - Konfigurasi koneksi database di `.env`

## 🚀 Menjalankan Aplikasi

### Backend (CodeIgniter 4)

Pastikan XAMPP sudah berjalan, lalu akses backend di:
```
http://localhost/lab7_php_ci/ci4/public
```

### Frontend (Vue.js)

Buka file `ci4/frontend VueJS/index.html` di browser atau jalankan development server:
```bash
cd ci4/frontend VueJS
npm install
npm run dev
```

## 📡 API Endpoints

| Method | Endpoint        | Deskripsi                  |
|--------|-----------------|---------------------------|
| GET    | /post           | Ambil semua artikel       |
| POST   | /post           | Tambah artikel baru       |
| PUT    | /post/:id       | Update artikel by ID      |
| DELETE | /post/:id       | Hapus artikel by ID       |

## 🛠️ Teknologi yang Digunakan

### Backend
- **PHP 8.2+** - Bahasa pemrograman server-side
- **CodeIgniter 4** - Framework PHP
- **MySQL** - Database management system

### Frontend
- **Vue.js 3** - Framework JavaScript
- **HTML5/CSS3** - Markup dan styling
- **JavaScript (ES6+)** - Logika frontend

## 🙏 Terima Kasih
