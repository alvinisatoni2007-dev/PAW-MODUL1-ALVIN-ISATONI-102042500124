# PAW-MODUL1-ALVIN-ISATONI-102042500124

Jurnal Modul 1 Praktikum Pemrograman Web (PAW): **Sistem Pendaftaran Calon Asisten Praktikum Laboratorium Enterprise Application Development (EAD)**.

## Identitas

| | |
|---|---|
| Nama | Alvin Isatoni |
| NIM | 102042500124 |
| Kelas | S1-SI-KJ-2502 |
| Mata Kuliah | Pemrograman Web |

## Deskripsi

Aplikasi web berbasis PHP untuk pendaftaran calon asisten praktikum. Pendaftar mengisi formulir, data divalidasi di sisi server (backend), dan jika semua valid sistem menampilkan **Kartu Registrasi** resmi. Data pendaftar disimpan di session sehingga dapat dilihat kembali lewat tombol **Lihat Data Pendaftar**.

## Fitur

- Formulir dengan 5 kolom: nama lengkap, nomor WhatsApp, email institusi, pilihan mata kuliah praktikum, dan motivasi.
- Validasi server-side dengan pesan error pada setiap kolom.
- *Retaining input*: data yang sudah diisi tetap tampil saat terjadi error.
- Penyimpanan data pendaftar menggunakan `$_SESSION`.
- Tampilan Kartu Registrasi beserta nomor registrasi otomatis.
- Output diamankan dengan `htmlspecialchars()`.

## Aturan Validasi

| Kolom | Aturan | Fungsi PHP |
|---|---|---|
| Nama Lengkap | Tidak boleh kosong, hanya huruf dan spasi | `trim()`, `preg_match()` |
| No. WhatsApp | Tidak boleh kosong, diawali `0` atau `62` | `substr()` |
| Email Institusi | Tidak boleh kosong, format email valid | `filter_var()` |
| Mata Kuliah | Wajib dipilih | `trim()` |
| Motivasi | Tidak boleh kosong | `trim()` |

## Teknologi

- PHP (session, validasi form)
- HTML5 dan CSS3
- Laragon (Apache) sebagai web server lokal
- Font DM Sans (Google Fonts)

## Struktur Folder

```
PAW_JURNAL1_ALVIN_ISATONI_102042500124/
├── soal.php        # Logika PHP, validasi, dan tampilan form / kartu registrasi
├── styles.css      # Styling halaman
├── logo.png        # Logo
└── bg-campus.png   # Background
```

## Cara Menjalankan

1. Install dan buka **Laragon**, lalu klik **Start All**.
2. Clone repository ini atau salin foldernya ke `C:\laragon\www\`:
   ```bash
   git clone https://github.com/alvinisatoni2007-dev/PAW-MODUL1-ALVIN-ISATONI-102042500124.git
   ```
3. Buka browser dan akses:
   ```
   http://localhost/PAW_JURNAL1_ALVIN_ISATONI_102042500124/soal.php
   ```

> PHP tidak bisa dijalankan lewat `file://` atau Live Server. Harus melalui web server seperti Laragon, XAMPP, atau `php -S localhost:8000`.

## Alur Aplikasi

1. Pengguna membuka form pendaftaran.
2. Pengguna menekan **Daftar Sekarang**.
3. Server memvalidasi seluruh kolom.
   - Jika ada kesalahan, form ditampilkan kembali dengan pesan error dan data tetap terisi.
   - Jika valid, data disimpan ke session dan Kartu Registrasi ditampilkan.
4. Tombol **Lihat Data Pendaftar** menampilkan kembali Kartu Registrasi dari session.

## Screenshot

Tambahkan screenshot hasil (form awal, pesan error, Kartu Registrasi) di bagian ini, misalnya dengan menaruh gambar di folder `screenshots/`:

```md
![Form Pendaftaran](screenshots/form.png)
![Kartu Registrasi](screenshots/kartu.png)
```

---

Dibuat untuk memenuhi tugas Jurnal Modul 1 Praktikum Pemrograman Web.
