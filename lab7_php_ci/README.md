# Lab 7: PHP CodeIgniter 4 & Vue.js

![PHP](https://img.shields.io/badge/PHP-8.2-blue)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4-red)
![Vue.js](https://img.shields.io/badge/Vue.js-3-green)
![License](https://img.shields.io/badge/License-MIT-yellow)

Proyek ini menghubungkan backend CodeIgniter 4 dengan frontend Vue.js untuk membuat aplikasi CRUD artikel. Ini adalah laporan praktikum Pemrograman Web 2 yang mendemonstrasikan integrasi antara framework PHP modern dengan framework JavaScript progresif.

## 🚀 Fitur

- **CRUD Artikel Lengkap**: Create, Read, Update, Delete artikel
- **Backend CodeIgniter 4**: Framework PHP modern dan powerful
- **Frontend Vue.js**: Framework JavaScript reaktif dan komponen-based
- **RESTful API**: API endpoints yang terstruktur dengan baik
- **Desain Responsif**: Tampilan yang menyesuaikan dengan berbagai ukuran layar

## 📋 Prasyarat

Sebelum menjalankan proyek ini, pastikan Anda telah menginstal:

- **XAMPP** atau server lokal lainnya (Apache + MySQL)
- **PHP** versi 8.2 atau lebih tinggi
- **Composer** (untuk dependency management PHP)
- **Node.js** dan **npm** (untuk Vue.js development, jika diperlukan)

## 📁 Struktur Proyek

```
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
│   └── frontend VueJS/       # Frontend Vue.js
├── composer.json             # PHP dependencies
├── env                       # Environment configuration
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

## 📝 Kontribusi

Kontribusi sangat diterima! Jika Anda ingin berkontribusi:

1. Fork repository ini
2. Buat branch fitur baru (`git checkout -b fitur/fitur-baru`)
3. Commit perubahan Anda (`git commit -m 'Tambah fitur baru'`)
4. Push ke branch (`git push origin fitur/fitur-baru`)
5. Buat Pull Request

## 📄 Lisensi

Proyek ini dilisensikan under the MIT License - lihat file [LICENSE](LICENSE) untuk detail.

## 👨‍💻 Author

Dibuat untuk Praktikum Pemrograman Web 2

## 🙏 Terima Kasih

- Tim CodeIgniter untuk framework yang amazing
- Tim Vue.js untuk framework JavaScript yang powerful
- Komunitas open source
