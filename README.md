# SIMAG-JKB (Sistem Informasi Magang JKB)

Repositori ini adalah tempat kolaborasi Kelompok 2 (TRPL 2B) untuk proyek Praktikum Web (HTML & CSS Murni).
Fokus aplikasi kita: Platform Katalog Magang Terpusat & Transparansi Ulasan Alumni.

## Pembagian Tugas & Halaman (1 Orang = 1 Page)

Agar tidak saling tunggu dan mencegah kode bertubrukan (conflict di Git), tugas dibagi per halaman. Masing-masing bertanggung jawab penuh atas HTML dan CSS di halamannya.

- [on Progress] Adit: index.html & style-index.css (Landing Page + Master Navbar & Footer)
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

## Panduan Darurat Git (Troubleshooting)

Bagian ini berisi solusi untuk masalah Git yang paling sering terjadi selama pengerjaan proyek.

### 1. File di GitHub sudah baru, tapi di terminal tertulis "Already up to date"
Ini terjadi karena kamu melakukan pull saat masih berada di branch milikmu sendiri. Ikuti langkah berurutan ini:

1. Cek posisi branch kamu saat ini:
   `git branch` (Pastikan kamu tahu sedang di branch mana)
2. Pindah ke branch utama:
   `git checkout main`
3. Tarik paksa pembaruan dari server:
   `git pull origin main`
4. Kembali ke branch tugasmu:
   `git checkout nama-branch-kamu`
5. Gabungkan kode terbaru dari main ke branch-mu:
   `git merge main`

### 2. Terminal nyangkut di layar Editor (Vim) saat melakukan Merge
Jika setelah melakukan pull atau merge terminal berubah menjadi layar teks yang kaku dan tidak bisa diketik dengan normal:
1. Tekan tombol `Esc` satu kali.
2. Ketik `:wq` lalu tekan `Enter`. (Ini adalah perintah untuk Write dan Quit).
3. Proses merge selesai.

### 3. Solusi Sapu Jagat (Jika main lokal benar-benar rusak)
Peringatan: Perintah ini akan menghapus semua pekerjaan di branch main lokalmu yang belum di-commit dan menyamakannya persis 100% dengan GitHub. Pastikan pindah ke `main` dulu sebelum mengetik ini.

1. Ambil data terbaru dari server tanpa menggabungkan:
   `git fetch origin`
2. Timpa paksa file lokal dengan file server:
   `git reset --hard origin/main`

Semangat nugasnya! Kalau ada error Git atau CSS Flexbox yang mentok, langsung bahas di grup WA.