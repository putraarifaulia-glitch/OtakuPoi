# Rencana Fitur

> Dokumentasikan minimal **5 fitur utama** proyek Anda.
> Salin dan ulangi blok di bawah untuk setiap fitur tambahan.

---

## Fitur 1 — [Nama Fitur]

**Role Penanggung Jawab:** `Frontend | Backend`

**Sumber Data:** `Third-Party API – Jikan API (MyAnimeList)`

**Deskripsi & Ekspektasi:**
`Fitur ini memungkinkan pengguna mencari anime berdasarkan judul atau genre. Frontend mengirim keyword ke Backend, lalu Backend memanggil API Jikan untuk mengambil data. Hasilnya dikirim ke Frontend untuk ditampilkan. Diharapkan sistem dapat merender daftar anime dengan cepat dan responsif.`

---

## Fitur 2 — [Nama Fitur]

**Role Penanggung Jawab:** `Frontend | Backend`

**Sumber Data:** `Internal System – MySQL Database`

**Deskripsi & Ekspektasi:**
`Fitur bagi pengguna yang terdaftar untuk menyimpan anime ke dalam daftar pribadi (Watching, Completed, Plan to Watch). Frontend mengelola interaksi tombol, sementara Backend memvalidasi sesi pengguna (JWT) dan menyimpan perubahan ke tabel MySQL. Diharapkan data tersinkronisasi dengan profil pengguna.`

---

## Fitur 3 — [Nama Fitur]

**Role Penanggung Jawab:** `Backend`

**Sumber Data:** `Internal System – MySQL Database`

**Deskripsi & Ekspektasi:**
`Sistem registrasi dan login untuk membedakan akses data antar pengguna. Backend menggunakan *hashing* (seperti Bcrypt) untuk menyimpan password di database dan mengeluarkan token (JWT) sebagai kunci akses. Diharapkan setiap akses ke fitur pribadi hanya dapat dilakukan oleh pemilik akun yang sah.`

---

## Fitur 4 — [Nama Fitur]

**Role Penanggung Jawab:** `Frontend`

**Sumber Data:** `Internal System`

**Deskripsi & Ekspektasi:**
`Mengimplementasikan desain antarmuka yang adaptif (mobile-friendly) menggunakan Tailwind CSS dan memastikan performa loading aset (gambar/poster anime) optimal. Diharapkan pengguna mendapatkan pengalaman menjelajah yang mulus di berbagai ukuran layar perangkat.`

---

## Fitur 5 — [Nama Fitur]

**Role Penanggung Jawab:** `DevOps`

**Sumber Data:** `Internal System`

**Deskripsi & Ekspektasi:**
`Membangun alur kerja otomatisasi di GitHub (GitHub Actions) untuk melakukan testing dan deployment aplikasi ke lingkungan server setiap kali ada pembaruan kode. Diharapkan proses rilis fitur menjadi lebih cepat, aman, dan meminimalisir kesalahan manual saat proses pembaruan.`

---

_(Salin blok di atas untuk fitur selanjutnya)_
