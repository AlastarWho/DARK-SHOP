# DARK-SHOP

**DARK-SHOP** adalah aplikasi toko online sederhana yang dapat digunakan sebagai template atau bahan belajar. Aplikasi ini memiliki dua role, yaitu admin dan user, dengan sistem login yang berbeda.

---

## 📌 Cara Pasang Aplikasi

**1. Download / Clone Proyek**
- Anda bisa klik tombol **Code > Download ZIP**, lalu ekstrak ke dalam folder **htdocs** (untuk XAMPP) atau **www** (untuk Laragon).
- Alternatif lain, Anda bisa melakukan *clone* menggunakan Git (jika Anda familiar).

**2. Buat Database**
- Buka _phpMyAdmin_ melalui browser, biasanya di _http://localhost/phpmyadmin_
- Buat database baru dengan nama: **darkshop_db**
- Import file SQL (jika tersedia, misalnya `darkshop_db.sql`) yang ada di dalam folder proyek ini.

**3. Atur Koneksi ke Database**
- Buka file konfigurasi seperti _config.php_ atau _.env_
- Ubah pengaturannya menjadi seperti ini:

  - _host_: **localhost**
  - _database name_: **darkshop_db**
  - _username_: **root**
  - _password_: _(kosongkan)_

**4. Jalankan Proyek**
- Aktifkan Apache dan MySQL melalui XAMPP atau Laragon.
- Buka browser, lalu akses: **http://localhost/DARK-SHOP**

---

## 🔐 Info Login

**Sebagai Admin**
- **Username**: admin  
- **Password**: admin

**Sebagai User**
- **Username**: mahasiswa  
- **Password**: 123

---

## ✨ Fitur

- _Login multi-role (Admin & User)_
- _Manajemen produk_
- _Dashboard admin_
- _Tampilan user-friendly_
- _Data disimpan dalam database_

---

## 🤝 Ingin Berkontribusi?

Silakan gunakan proyek ini untuk keperluan belajar atau dikembangkan lebih lanjut. Anda bisa melakukan:

- _Fork_ proyek ini ke akun GitHub Anda
- Tambahkan fitur atau perbaikan
- Buat _Pull Request_ agar bisa digabungkan ke repositori utama

---

## 📄 Lisensi

Proyek ini menggunakan lisensi **MIT**. Anda bebas menggunakan, mengubah, dan mendistribusikannya.

---

Terima kasih telah menggunakan **DARK-SHOP**!  
Jangan lupa beri bintang ⭐ di GitHub jika proyek ini bermanfaat.
