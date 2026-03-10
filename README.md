# <img src="https://raw.githubusercontent.com/Tarikul-Islam-Anik/Animated-Fluent-Emojis/master/Emojis/Objects/Camera%20with%20Flash.png" alt="Camera" width="40" /> Galeri Foto Produk - UKK 2026

<p align="left">
  <img width="1344" height="620" alt="Screenshot 2026-03-10 101935" src="https://github.com/user-attachments/assets/3df37f9e-fe0b-4b87-8319-d4d49e86c847" />
<img width="1345" height="626" alt="Screenshot 2026-03-10 101947" src="https://github.com/user-attachments/assets/5ef16dcf-5f0b-4e8b-a5fc-7b88dcf89bc3" />
<img width="1062" height="574" alt="Screenshot 2026-03-10 102008" src="https://github.com/user-attachments/assets/f8720ad4-ece6-458e-91dd-19afb77ab70b" />
<img width="973" height="541" alt="Screenshot 2026-03-10 102023" src="https://github.com/user-attachments/assets/f5283210-8898-404d-b3f1-614b59033c34" />

</p>

> **Platform Katalog Digital Minimalis** yang dirancang untuk kecepatan dan kemudahan manajemen aset visual. Dikembangkan oleh **Roni** untuk Uji Kompetensi Keahlian (UKK) SMKN 11 Malang.

---

## 🚀 Fitur Utama
Aplikasi ini menerapkan arsitektur **MVC (Model-View-Controller)** dengan fitur:
- [x] **Secure Auth**: Sistem Login & Register dengan enkripsi password Bcrypt.
- [x] **Role Management**: Pembedaan hak akses antara Admin (Full Control) dan User (Viewer/Commenter).
- [x] **Image Handling**: Unggah foto otomatis ke sistem Storage Laravel.
- [x] **Social Interaction**: Fitur diskusi/komentar real-time pada setiap produk.

---

## 🏛️ Arsitektur Database

### Relasi Tabel (ERD)
Database dirancang agar efisien dan memiliki integritas data yang kuat antar entitas.

<p align="center">
  <img src="https://github.com/user-attachments/assets/0ca55280-6aed-45f2-a99c-a64be3b8081a" width="600" style="border-radius: 8px; border: 1px solid #ddd;" />
</p>

### 📊 Struktur Data
| Nama Tabel | Deskripsi |
| :--- | :--- |
| `users` | Menyimpan data user (nama, email, password, role). |
| `photos` | Menyimpan metadata foto produk dan jalur file (path). |
| `comments` | Menyimpan interaksi diskusi antar pengguna. |

---


---

## ⚙️ Panduan Instalasi Lokal

Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi di laptop kamu:

```bash
# 1. Clone Repositori
git clone [https://github.com/roni-dev/galeri-foto.git](https://github.com/roni-dev/galeri-foto.git)

# 2. Masuk ke Folder Proyek
cd galeri-foto

# 3. Install Dependency
composer install
npm install

# 4. Setup Environment
cp .env.example .env
php artisan key:generate

# 5. Link Storage (PENTING AGAR GAMBAR MUNCUL)
php artisan storage:link

# 6. Jalankan Migrasi & Seeder
php artisan migrate --seed

# 7. Jalankan Server
php artisan serve
