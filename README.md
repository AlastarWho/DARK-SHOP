Tentu! Berikut adalah versi README yang **dipisahkan dengan jelas** antara bagian yang membutuhkan terminal/command line dan bagian lainnya. Ini akan membantu pengguna awam untuk lebih mudah mengikuti:

---

```markdown
# DARK-SHOP 🛒

**DARK-SHOP** adalah aplikasi toko online sederhana yang bisa Anda jalankan secara lokal. Proyek ini cocok untuk dipelajari, dimodifikasi, atau dikembangkan lebih lanjut.

---

## 📁 Langkah Awal (Tanpa Terminal)

1. **Install XAMPP / Laragon**
   - Download dan install XAMPP (https://www.apachefriends.org/) atau Laragon (https://laragon.org/) di komputer Anda.

2. **Download Proyek**
   - Anda bisa klik tombol `Code > Download ZIP` di halaman GitHub ini, lalu ekstrak ke folder `htdocs` (jika pakai XAMPP) atau `www` (jika pakai Laragon).
   - Atau gunakan cara terminal di bawah.

3. **Buat Database**
   - Buka `phpMyAdmin` melalui `http://localhost/phpmyadmin`
   - Buat database baru dengan nama: `darkshop_db`
   - Import file SQL (jika tersedia, misalnya: `darkshop_db.sql`) dari folder proyek.

4. **Sesuaikan Koneksi Database**
   - Buka file `config.php` atau `.env` (tergantung struktur proyek).
   - Pastikan konfigurasi seperti ini:
     ```php
     $host = 'localhost';
     $dbname = 'darkshop_db';
     $username = 'root';
     $password = '';
     ```

5. **Akses Proyek**
   - Jalankan Apache dan MySQL dari XAMPP atau Laragon.
   - Buka browser dan akses:
     ```
     http://localhost/DARK-SHOP
     ```

---

## 🖥️ Langkah Alternatif (Dengan Terminal)

Jika Anda terbiasa menggunakan terminal/command line, berikut cara cepatnya:

```bash
# Clone repositori ke komputer Anda
git clone https://github.com/AlastarWho/DARK-SHOP.git

# Masuk ke folder proyek
cd DARK-SHOP
```

---

## 🔑 Login Aplikasi

### Sebagai **Admin**
- Username: `admin`
- Password: `admin`

### Sebagai **User**
- Username: `mahasiswa`
- Password: `123`

---

## ✨ Fitur Utama

- Manajemen Produk (Tambah, Edit, Hapus)
- Halaman Admin & User terpisah
- Sistem Login Multi-Role
- Tampilan user-friendly

---

## 🤝 Kontribusi

Ingin bantu kembangkan proyek ini? Ikuti langkah berikut:

```bash
# 1. Fork repositori ini ke akun GitHub Anda
# 2. Clone hasil fork ke lokal
git clone https://github.com/username-anda/DARK-SHOP.git

# 3. Buat branch untuk fitur baru
git checkout -b fitur-baru-anda

# 4. Setelah selesai, commit dan push
git add .
git commit -m "Tambah fitur baru"
git push origin fitur-baru-anda
```

Lalu buat **Pull Request** dari GitHub.

---

## 📄 Lisensi

Proyek ini menggunakan lisensi MIT. Silakan digunakan dan dimodifikasi sesuai kebutuhan pribadi maupun pembelajaran.

---

Terima kasih sudah mampir ke **DARK-SHOP**! 🚀  
Jangan ragu untuk kasih ⭐ dan buka *issue* jika ada kendala atau pertanyaan.
```

---

Kalau kamu ingin README ini langsung dimasukkan ke GitHub, simpan saja file dengan nama `README.md` di root folder proyek kamu. Mau saya bantu buat file-nya juga?
