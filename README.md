# 🌍 GeoPort - Web GIS Portfolio

GeoPort adalah sebuah aplikasi web sederhana berbasis **Laravel** dan **Tailwind CSS** yang dirancang sebagai portofolio profesional dan demonstrasi Sistem Informasi Geografis (Web GIS). Aplikasi ini menampilkan antarmuka yang sangat responsif, optimal untuk SEO, dan terintegrasi dengan peta interaktif modern.

## ✨ Fitur Utama

- **Desain Developer-Centric**: Antarmuka modern dengan tema gelap (Dark Mode), efek *glassmorphism*, dan pola grid yang rapi, dibangun seutuhnya menggunakan Tailwind CSS.
- **Peta Interaktif Berkinerja Tinggi**: Memanfaatkan **MapLibre GL JS** untuk me-render data vektor secara cepat dan mulus di sisi *client*.
- **Visualisasi Data Spasial**: Menampilkan manipulasi layer peta menggunakan data dummy GeoJSON berupa Titik (*Marker/Point*), Garis Rute (*LineString*), dan Zona Area Berbayang (*Polygon*).
- **Basemap Open-Source**: Menggunakan gaya peta *CartoDB Dark Matter* berbasis OpenStreetMap (OSM) tanpa bergantung pada API key berbayar.
- **Responsif & Mobile-Friendly**: Tampilan disesuaikan sempurna untuk seluruh ukuran layar (mencegah *overscroll* pada halaman peta).

## 🛠️ Tech Stack

- **Framework**: Laravel 
- **Styling**: Tailwind CSS (melalui Laravel Vite)
- **Mapping Library**: MapLibre GL JS (Vanilla JS)

---

## 🚀 Cara Menjalankan di Local (Menggunakan Laravel Valet)

Proyek ini telah dikonfigurasi untuk berjalan dengan mudah di macOS menggunakan **Laravel Valet**.

### Prasyarat
- PHP 8.2+
- Composer
- Node.js & NPM
- Laravel Valet terinstal dan menyala.

### Langkah-langkah Instalasi

1. **Buka Terminal di Direktori Proyek**
   Masuk ke dalam direktori aplikasi ini:
   ```bash
   cd geospatial-app
   ```

2. **Install Dependensi Back-end (Composer)**
   ```bash
   composer install
   ```

3. **Konfigurasi Environment**
   Salin *file* environment dan *generate app key*:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Install Dependensi Front-end & Build (NPM)**
   Install semua modul Node dan kompilasi *asset* Tailwind CSS:
   ```bash
   npm install
   npm run build
   ```
   *(Catatan: Anda juga bisa menjalankan `npm run dev` pada tab terminal terpisah jika ingin melihat perubahan desain UI secara langsung / Hot Module Replacement).*

5. **Tautkan Proyek dengan Laravel Valet**
   Daftarkan direktori proyek ini ke Valet dengan perintah:
   ```bash
   valet link geospatial-app
   ```
   *(Catatan: Jika folder di luar proyek ini sudah menggunakan perintah `valet park`, Anda dapat melewati langkah ini).*

6. **Akses Aplikasi di Browser**
   Setelah Valet berhasil dihubungkan, Anda dapat mengakses proyek secara lokal tanpa perlu mengetikkan port:
   
   👉 **http://geospatial-app.test**

---
