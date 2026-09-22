# SIMAG-JKB (Sistem Informasi Magang JKB)

Repositori ini adalah tempat kolaborasi Kelompok 2 (TRPL 2B) untuk proyek Praktikum Web (HTML & CSS Murni).
Fokus aplikasi kita: Platform Katalog Magang Terpusat & Transparansi Ulasan Alumni.

## Pembagian Tugas & Halaman (1 Orang = 1 Page)

Agar tidak saling tunggu dan mencegah kode bertubrukan (conflict di Git), tugas dibagi per halaman. Masing-masing bertanggung jawab penuh atas HTML dan CSS di halamannya.

- [ ] Adit: index.html & style-index.css (Landing Page + Master Navbar & Footer)
- [ ] Rizqi: katalog.html & style-katalog.css (Halaman Katalog Lowongan Magang & Filter)
- [ ] Nirvana: detail-magang.html & style-detail.css (Halaman Detail Lowongan & List Ulasan)
- [ ] Fadhel: tulis-ulasan.html & style-ulasan.css (Halaman Form Input Tulis Ulasan)
- [ ] Galang: login.html & style-login.css (Halaman Login & Register)

---

## Alur Kerja / Workflow (PENTING!)

Karena Adit sedang mendesain Navbar dan Footer, kalian TIDAK PERLU MENUNGGU Adit selesai untuk mulai ngoding. Ikuti langkah ini agar bisa kerja barengan:

1. Pull Dulu: Lakukan `git pull origin main` di laptop masing-masing.
2. Bikin Branch Sendiri: Jangan ngoding di `main`. (Contoh: `git checkout -b login-galang`).
3. Copy Template: Buka file `template.html` buatan Adit, lalu Copy-Paste isinya ke file HTML jatah kalian (misal: bikin file baru `login.html`, paste kodenya di situ).
4. Bikin CSS Sendiri: Bikin file CSS untuk halamanmu sendiri (misal: `style-login.css`). Jangan lupa hubungkan link CSS-nya di dalam tag `<head>` HTML kamu.
5. Fokus ke `<main>`: Mulailah mendesain area konten bagian tengah di dalam tag `<main>`. Abaikan bagian Header dan Footer untuk sementara waktu. Nanti kalau Navbar/Footer buatan Adit sudah jadi, kita tinggal copy-paste kodenya ke HTML masing-masing.

---

## Aturan Dasar Tim Kelompok 2

* NO INLINE CSS!
  Dilarang keras menulis style langsung di dalam HTML (contoh: `style="color: red;"`).
* Pakai Variabel Warna dari Global CSS
  Warna wajib aplikasi kita adalah Kuning JKB dan Biru TRPL. Panggil warnanya dari file `global.css` menggunakan variabel.
  Contoh cara pakai di CSS kalian: `background-color: var(--kuning-jkb);`
* Jangan Sentuh File Orang Lain
  Fokus saja edit HTML dan CSS milikmu sendiri.

Semangat nugasnya! Kalau ada error Git atau CSS Flexbox yang mentok, langsung bahas di grup WA.