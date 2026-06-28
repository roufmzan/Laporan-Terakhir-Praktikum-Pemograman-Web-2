<div align="center">

# Laporan Praktikum Pemrograman Web 2
### Lab 7: PHP CodeIgniter 4 & Vue.js

Proyek ini menghubungkan backend CodeIgniter 4 dengan frontend Vue.js untuk membuat aplikasi CRUD artikel. Ini adalah laporan praktikum Pemrograman Web 2 yang mendemonstrasikan integrasi antara framework PHP modern dengan framework JavaScript progresif.

</div>

### 👨‍💻 Informasi Mahasiswa
| Identitas | Keterangan |
| :--- | :--- |
| **Nama** | Ro'uf Muhammad Fauzan |
| **NIM** | 312410157 |
| **Kelas** | I.24.1A |
| **Demo** | [Link Demo](https://praktikumterakhir.infinityfreeapp.com/#/) |
| **Vidio penjelasan**| [Link Vidio Youtube](https://youtu.be/pK2RxvV5LtE) |

**Live Preview / Demo Aplikasi:**
- **URL Frontend (Admin Panel):** [http://praktikumterakhir.infinityfreeapp.com/#/](http://praktikumterakhir.infinityfreeapp.com/#/)
- **URL Frontend (User/Publik):** [http://praktikumterakhir.infinityfreeapp.com/backend/public/artikel](http://praktikumterakhir.infinityfreeapp.com/backend/public/artikel)

**Kredensial Login Admin:**
- **Email/Username:** `admin` atau `admin@email.com`
- **Password:** `admin123`


## 📑 Daftar Isi Praktikum

1. [Praktikum 1: Pengenalan PHP Framework & Instalasi CodeIgniter 4](https://github.com/roufmzan/Laporan-Terakhir-Praktikum-Pemograman-Web-2/blob/main/README.md#praktikum-1-php-framework-codeigniter)
2. [Praktikum 2: Framework Lanjutan - Pembuatan CRUD Sederhana](https://github.com/roufmzan/Laporan-Terakhir-Praktikum-Pemograman-Web-2/blob/main/README.md#praktikum-2-framework-lanjutan-crud)
3. [Praktikum 3: Struktur Tampilan Menggunakan View Layout & View Cell](https://github.com/roufmzan/Laporan-Terakhir-Praktikum-Pemograman-Web-2/blob/main/README.md#praktikum-3-view-layout-dan-view-cell)
4. [Praktikum 4: Implementasi Modul Login, Autentikasi, & Filter](https://github.com/roufmzan/Laporan-Terakhir-Praktikum-Pemograman-Web-2/blob/main/README.md#praktikum-4-framework-lanjutan-modul-login)
5. [Praktikum 5: Fitur Penomoran Halaman (Pagination) & Pencarian Data](https://github.com/roufmzan/Laporan-Terakhir-Praktikum-Pemograman-Web-2/blob/main/README.md#praktikum-5-pagination-dan-pencarian)
6. [Praktikum 6: Relasi Antar Tabel (One-to-Many) & Query Builder](https://github.com/roufmzan/Laporan-Terakhir-Praktikum-Pemograman-Web-2/blob/main/README.md#praktikum-6-relasi-tabel-dan-query-builder)
7. [Praktikum 7: Fitur Validasi Form & Unggah File Gambar Artikel](https://github.com/roufmzan/Laporan-Terakhir-Praktikum-Pemograman-Web-2/blob/main/README.md#praktikum-7-upload-file-gambar)
8. [Praktikum 8: Integrasi AJAX (Asynchronous JavaScript and XML)](https://github.com/roufmzan/Laporan-Terakhir-Praktikum-Pemograman-Web-2/blob/main/README.md#praktikum-8-ajax)
9. [Praktikum 9: Implementasi AJAX Pagination & Live Search](https://github.com/roufmzan/Laporan-Terakhir-Praktikum-Pemograman-Web-2/blob/main/README.md#praktikum-9-implementasi-ajax-pagination-dan-search)
10. [Praktikum 10: Pembangunan RESTful API Backend dengan format JSON](https://github.com/roufmzan/Laporan-Terakhir-Praktikum-Pemograman-Web-2/blob/main/README.md#praktikum-10-api-rest-api-codeigniter)
11. [Praktikum 11: Implementasi RESTful API Client & Pengujian Endpoint](https://github.com/roufmzan/Laporan-Terakhir-Praktikum-Pemograman-Web-2/blob/main/README.md#praktikum-11--12-vuejs-spa)
12. [Praktikum 12: Pengenalan Arsitektur Clean Code & Pengaturan Environment](https://github.com/roufmzan/Laporan-Terakhir-Praktikum-Pemograman-Web-2/blob/main/README.md#praktikum-11--12-vuejs-spa)
13. [Praktikum 13: Implementasi Web Security & Penanganan SQL Injection](https://github.com/roufmzan/Laporan-Terakhir-Praktikum-Pemograman-Web-2/blob/main/README.md#praktikum-13-vuejs-autentikasi-dan-navigation-guards)
14. [Praktikum 14: Finalisasi Proyek Portal Berita & Deployment Hosting](https://github.com/roufmzan/Laporan-Terakhir-Praktikum-Pemograman-Web-2/blob/main/README.md#praktikum-14-token-based-authentication--axios-interceptors)

---

# Laporan Praktikum Pemrograman Web 2 (CodeIgniter 4)
<img width="700" height="400" alt="image" src="https://github.com/user-attachments/assets/b3916d27-d200-474e-8d59-5e1b29bb5b04" />

<img width="700" height="400" alt="image" src="https://github.com/user-attachments/assets/89187b91-dc03-40d0-a20b-8ac9425623c8" />

<img width="700" height="400" alt="image" src="https://github.com/user-attachments/assets/ad30e789-3dad-4e75-ae52-60631013b31a" />



## Praktikum 1: PHP Framework (CodeIgniter)

### 1. Instalasi dan Konfigurasi CodeIgniter
CodeIgniter 4 diinstal menggunakan Composer. Environment dikonfigurasi melalui file `.env` dengan mengatur `CI_ENVIRONMENT = development`.

### 2. Controller dan Routing
Membuat controller `Page` dengan beberapa method seperti `about`, `contact`, `faqs`, dan `tos`. Route dikonfigurasi di `app/Config/Routes.php` dan fitur AutoRoute diaktifkan.

### 3. Layout Web dengan CSS
Layout dasar dibuat menggunakan file `style.css` pada folder `public`. Layout dipisahkan menjadi file `header.php` dan `footer.php` di folder `app/Views/template/` sehingga mempermudah proses templating.


## Praktikum 2: Framework Lanjutan (CRUD)

### 1. Pembuatan Database
Dibuat database `lab_ci4` dan tabel `artikel`. Anda dapat menggunakan file `database.sql` untuk mengimpor tabel dan contoh data secara langsung ke database MySQL.


### 2. Model dan Menampilkan Data (Portal Berita)
Dibuat `ArtikelModel` untuk memproses data dari database. Method `index` pada controller `Artikel` digunakan untuk mengambil data dari database dan menampilkannya pada view `artikel/index`. Terdapat pula method `view()` untuk menampilkan detail artikel menggunakan parameter _slug_.


### 3. Menu Admin (CRUD)
Dibuat layout khusus `admin_header.php` dan `admin_footer.php` untuk menu admin. Di dalam menu admin, kita dapat melakukan fitur Create, Read, Update, Delete (CRUD) untuk artikel:
- **Index**: Menampilkan seluruh artikel di admin portal.
- **Add**: Menambahkan artikel baru ke database.
- **Edit**: Mengubah artikel lama.
- **Delete**: Menghapus artikel.

## Praktikum 3: View Layout dan View Cell

### 1. View Layout
Pembaruan struktur template menggunakan fitur **View Layout** pada CodeIgniter 4 (`extend()` dan `renderSection()`). Layout utama dipindahkan ke `app/Views/layout/main.php`. View konten statis dan portal berita telah dimodifikasi agar mewarisi tata letak utama ini, membuat kode view menjadi jauh lebih bersih.


### 2. View Cell (Artikel Terkini)
Pembuatan **View Cell** `ArtikelTerkini` untuk menampilkan daftar 5 artikel terbaru di sidebar. Fitur ini bersifat modular dan dipanggil langsung pada layout sidebar. Struktur databasenya telah diperbarui dengan field `created_at` untuk mendukung fitur artikel terbaru.



## Praktikum 4: Framework Lanjutan (Modul Login)

### 1. Auth Filter & Login System
Membuat modul **Login** menggunakan model `UserModel` dan controller `User`. Sistem login menggunakan validasi password hashing standar PHP (`password_verify`).

Untuk mengamankan akses ke halaman Admin (CRUD), telah dibuat **Filter** `Auth` (`app/Filters/Auth.php`) yang memverifikasi session login user sebelum mengizinkan akses ke rute `/admin/*`. Jika belum login, user akan dikembalikan ke form login.


### 2. Database Seeder
Akun dummy admin dibuat menggunakan fitur Seeder dari CodeIgniter (`app/Database/Seeds/UserSeeder.php`), memudahkan persiapan data awal saat deployment atau ujicoba (dengan mengeksekusi `php spark db:seed UserSeeder`). Email: `admin@email.com`, Password: `admin123`.

## Praktikum 5: Pagination dan Pencarian

### 1. Pagination & Search di Admin Panel
Fitur *Pagination* diimplementasikan menggunakan fungsi `paginate()` dari *Query Builder* CodeIgniter 4, untuk memecah daftar artikel menjadi halaman-halaman yang lebih kecil (10 data per halaman).
Fitur pencarian (*Search*) ditambahkan dengan menambahkan method `like()` pada query untuk memfilter data berdasarkan kata kunci yang diketik user.


## Praktikum 6: Relasi Tabel dan Query Builder

### 1. Kategori dan Relasi One-to-Many
Dibuat tabel baru bernama `kategori` untuk mengelompokkan artikel. Tabel `artikel` di-update dengan field `id_kategori` sebagai *Foreign Key*.
Di sisi kode, dibuat `KategoriModel` dan *Query Builder* digunakan dengan metode `join()` pada `ArtikelModel` untuk mengambil data relasional (Nama Kategori dari tabel kategori berdasarkan `id_kategori` di tabel artikel).

### 2. Implementasi Relasi pada Aplikasi
Nama kategori telah ditampilkan baik di halaman *Public* (Portal Berita & Detail Berita) maupun halaman *Admin*. Pada form pembuatan dan pengeditan artikel, pengguna dapat memilih kategori dari *dropdown* `<select>` yang datanya diambil secara dinamis dari database.


## Praktikum 7: Upload File Gambar

### 1. Upload Gambar pada Artikel
Menambahkan fungsionalitas unggah berkas (gambar) pada form *Tambah Artikel* (dan Edit Artikel) sehingga pengguna dapat melampirkan *thumbnail* pada tulisannya.
Pada sisi form (View), ditambahkan atribut `enctype="multipart/form-data"` beserta tag `<input type="file" name="gambar">`. Di sisi Controller (`Artikel.php`), gambar tersebut ditangani menggunakan fungsi `$this->request->getFile('gambar')` lalu dipindahkan ke folder `public/gambar` di proyek sebelum nama filenya disimpan ke database.


## Praktikum 8: AJAX

### 1. Manipulasi Data secara Asynchronous
Penerapan **AJAX (Asynchronous JavaScript and XML)** menggunakan *library jQuery* untuk mengambil dan menghapus data tanpa perlu memuat ulang seluruh halaman (reload).

Fitur ini diimplementasikan di halaman `/ajax`. Saat halaman diakses, script jQuery akan memanggil URL `/ajax/getData` di latar belakang (melalui method `$.ajax` ber-tipe `GET`) untuk mengambil data artikel berformat JSON lalu menampilkannya dalam tabel. Terdapat juga fungsionalitas Hapus (Delete) dengan memanggil URL `/ajax/delete/id` menggunakan method `DELETE`.


## Praktikum 9: Implementasi AJAX Pagination dan Search

### 1. Halaman Admin Dinamis (SPA)
Halaman panel admin untuk daftar artikel (`/admin/artikel`) telah direstrukturisasi agar menggunakan konsep *Single Page Application* secara parsial. Fitur **Pagination** dan **Pencarian** yang sebelumnya memuat ulang halaman (*reload*) kini telah diubah sepenuhnya berbasis AJAX jQuery.
Controller `Artikel::admin_index` dimodifikasi agar dapat mendeteksi *request* AJAX dan mengembalikan *response* berupa format JSON yang berisi `artikel` dan informasi `pager`. 

## Praktikum 10: API (REST API CodeIgniter)

### 1. Pembuatan REST Controller
Untuk mengizinkan aplikasi eksternal (seperti Vue.js, React, atau mobile app) mengakses dan memanipulasi data artikel, dibuat sebuah REST API menggunakan kelas bawaan CI4 `ResourceController`.
Endpoint API ini berlokasi di URI `/post`, dengan mengimplementasikan operasi CRUD lengkap:
- `GET /post` - Menampilkan semua artikel.
- `GET /post/{id}` - Menampilkan detail artikel spesifik.
- `POST /post` - Menambahkan artikel baru (param: judul, isi).
- `PUT /post/{id}` - Mengupdate artikel (menggunakan method `x-www-form-urlencoded`).
- `DELETE /post/{id}` - Menghapus artikel.

## Praktikum 11 & 12: VueJS SPA
Aplikasi Frontend terpisah telah dibuat menggunakan **VueJS 3** dan **Vue Router** di repositori terpisah bernama `Lab11Web_VueJS`. Aplikasi SPA tersebut mengkonsumsi REST API yang telah dibuat pada praktikum ini. Silakan lihat folder `Lab11Web_VueJS` untuk kode sumber dan dokumentasinya.

## Praktikum 13: VueJS Autentikasi dan Navigation Guards
1. **API Login Sisi Server**: Endpoint `/api/login` telah ditambahkan di backend (CodeIgniter 4) untuk memvalidasi *username* dan *password* lalu mengembalikan Token dan data *user* berformat JSON.
2. **Client-Side Security (VueJS)**: Pada aplikasi Frontend `Lab11Web_VueJS`, rute dilindungi menggunakan *Navigation Guards* (`router.beforeEach`). Pengguna yang belum *login* akan ditolak mengakses halaman `/artikel` dan `/about`.

## Praktikum 14: Token Based Authentication & Axios Interceptors
Untuk mencegah eksploitasi REST API secara langsung (misal via Postman), *Server-Side Security* telah diterapkan:
1. **API Auth Filter (CodeIgniter 4)**: Filter `ApiAuthFilter` memblokir akses ke rute memanipulasi artikel (`POST`, `PUT`, `DELETE` pada `/post`) apabila request tidak menyertakan *header* `Authorization: Bearer <token>`. Jika token tidak ada atau tidak valid, API mengembalikan error `401 Unauthorized`.
2. **Axios Interceptors (VueJS)**: Pada aplikasi Frontend, *Axios Interceptors* ditambahkan pada `app.js` untuk secara otomatis menyuntikkan Token dari `localStorage` ke *header* HTTP setiap kali melakukan *request* ke backend, serta menangkap kode 401 secara global untuk menendang pengguna ke halaman login jika token habis masa berlakunya.
