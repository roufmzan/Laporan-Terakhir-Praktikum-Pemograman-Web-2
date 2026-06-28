# Laporan Praktikum VueJS & Vue Router (SPA)

Proyek ini adalah implementasi *Frontend* yang terpisah dari *Backend* CodeIgniter 4 menggunakan **VueJS 3**, **Vue Router**, dan **Axios**. Proyek ini mendemonstrasikan arsitektur *Single Page Application* (SPA) berbasis komponen di mana navigasi antar halaman tidak memerlukan *reload* dari browser.

## Praktikum 11: VueJS

### 1. Komponen Data Dinamis
Penerapan kerangka kerja VueJS untuk mengambil, menampilkan, dan mengubah data secara reaktif menggunakan *reactive data binding*. Data diambil dari RESTful API Backend CI4 (`http://localhost:8080/post`) via **Axios**.

## Praktikum 12: VueJS Komponen dan Routing (SPA)

### 1. Struktur Komponen Terisolasi
Aplikasi telah dipecah menjadi beberapa komponen independen (`Home.js`, `Artikel.js`, `About.js`) yang menangani template HTML, data state, dan *methods* masing-masing.

### 2. Client-Side Routing
Menerapkan `vue-router` untuk beralih tampilan antar komponen (`/`, `/artikel`, `/about`) secara asinkron (SPA). 

### 3. Tugas: Halaman About
Komponen tambahan (`About.js`) telah dibuat dan diregistrasikan ke rute `/about` untuk menampilkan profil pembuat aplikasi.

*(Silakan tambahkan Screenshot Halaman Beranda di sini)*
`![Screenshot Home](screenshot/home.png)`

*(Silakan tambahkan Screenshot Halaman Manajemen Artikel di sini)*
`![Screenshot Artikel](screenshot/artikel.png)`

*(Silakan tambahkan Screenshot Halaman Form Tambah/Ubah Artikel di sini)*
`![Screenshot Form](screenshot/form.png)`

*(Silakan tambahkan Screenshot Halaman About (Profil) di sini)*
`![Screenshot About](screenshot/about.png)`

## Praktikum 13: VueJS Autentikasi dan Navigation Guards
Aplikasi Frontend SPA ini sekarang telah diamankan (Client-Side Security).
1. **API Login Sisi Server**: Endpoint `/api/login` telah ditambahkan di backend untuk memvalidasi *username* dan *password* lalu mengembalikan objek kredensial dan Token jika berhasil.
2. **Navigation Guards (`router.beforeEach`)**: Pada `app.js`, setiap kali terjadi perpindahan rute, aplikasi akan mengecek status `isLoggedIn` di `localStorage`. Jika rute membutuhkan otentikasi (contoh: `/artikel` atau `/about`) tetapi pengguna belum login, pengguna akan di-redirect paksa ke halaman `/login`.
3. **Menu Dinamis**: Tombol menu navigasi di header menyesuaikan status secara dinamis. Jika login, tombol akan menampilkan *Logout*.

*(Tambahkan Bukti Screenshot Form Login dan Pencegatan Navigation Guards)*
`![Screenshot Form Login](screenshot/login.png)`

## Praktikum 14: Token Based Authentication & Axios Interceptors
Untuk mencegah eksploitasi API langsung dari Postman, Server-Side Security diimplementasikan.
1. **API Auth Filter (CodeIgniter)**: Class `ApiAuthFilter` dibuat untuk mencegat *request* masuk yang ditujukan pada endpoint manipulasi artikel (`POST`, `PUT`, `DELETE`). Filter ini akan memverifikasi apakah *header* HTTP `Authorization: Bearer <token>` disertakan dan bernilai valid. Jika tidak, API membalas HTTP 401 Unauthorized.
2. **Axios Interceptors (VueJS)**: Agar tidak perlu menuliskan *header* berulang kali secara manual pada setiap *method* Axios, `axios.interceptors.request` digunakan untuk secara otomatis menyuntikkan token dari `localStorage` ke *header* setiap pengiriman data.

> **Analisis Singkat**: *Vue Router Navigation Guards* (Sisi Klien) berfokus melindungi tampilan UI/Halaman HTML yang dilihat pengguna di browser (UX), namun tidak benar-benar melindungi data (karena peretas masih bisa *bypass* menggunakan *Postman*). Di sinilah *CodeIgniter API Filters* (Sisi Server) berperan mutlak memblokir segala bentuk permintaan manipulasi data pada level sistem/API jika tidak dibuktikan dengan token *otentikasi* (Token-Based Authentication).

*(Tambahkan Bukti Screenshot penolakan akses Error 401 dari Postman dan Tab Network)*
`![Screenshot 401 Postman](screenshot/401_postman.png)`
`![Screenshot Tab Network](screenshot/tab_network.png)`

> **Catatan Uji Coba**: Pastikan Server CodeIgniter 4 Anda sedang berjalan (`php spark serve` di folder `Lab7Web/ci4`) agar *Frontend* VueJS ini bisa terhubung ke *Backend* via port `8080`.
