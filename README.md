# Tailor Web


![Tailor Webpage](https://github.com/reddishowo/tailor-web/blob/main/website-page)


## 

Website untuk Listing atau Order produk-produk baju. 

## Requirements

Pastikan Anda telah menginstal:
- [Node.js](https://nodejs.org/) (versi terbaru direkomendasikan)
- [Composer](https://getcomposer.org/) untuk manajemen dependensi PHP
- [Laravel](https://laravel.com/) dan [Vue.js](https://vuejs.org/)

## Langkah-langkah Clone

### 1. Clone Repository

Frontend (branch `main`):
```bash
git clone -b main <repository-url>
```

Backend (branch `main-backend`):
```bash
git clone -b main-backend <repository-url>
```

### 2. Instal Dependensi

#### Frontend
```bash
cd frontend(/atau folder frontend vue)
npm install
```

#### Backend
```bash
cd backend(/atau folder backend laravel)
composer install
```

### 3. Konfigurasi Proyek

#### Frontend
Pastikan file konfigurasi frontend sudah sesuai, seperti `env` atau pengaturan URL API.

#### Backend
Buat file `.env` di folder backend, lalu konfigurasikan database dan pengaturan lainnya:
```bash
cp .env.example .env
php artisan key:generate
```

Migrasi database jika diperlukan (Jangan lupa untuk start xampp/laragon mysql):
```bash
php artisan migrate
```

### 4. Menjalankan Proyek

#### Frontend
```bash
npm run dev
```
Aplikasi frontend akan berjalan di `localhost:5173` secara default.

#### Backend
```bash
php artisan serve
```
Aplikasi backend akan berjalan di `localhost:8000` secara default.

## Cara Akses

1. Buka browser.
2. Akses frontend melalui: `http://localhost:5173`

