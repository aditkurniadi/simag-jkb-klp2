<?php
include 'koneksi.php';
/** @var mysqli $koneksi */
$pesan = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $posisi       = mysqli_real_escape_string($koneksi, $_POST['posisi']);
    $perusahaan   = mysqli_real_escape_string($koneksi, $_POST['perusahaan']);
    $lokasi       = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
    $sistem_kerja = mysqli_real_escape_string($koneksi, $_POST['sistem_kerja']);
    $kategori     = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $durasi       = mysqli_real_escape_string($koneksi, $_POST['durasi']);
    $batas_daftar = mysqli_real_escape_string($koneksi, $_POST['batas_daftar']);
    $status       = mysqli_real_escape_string($koneksi, $_POST['status']);
    $deskripsi    = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $kode_logo    = mysqli_real_escape_string($koneksi, $_POST['kode_logo']);

    $sql = "INSERT INTO lowongan (posisi, perusahaan, lokasi, sistem_kerja, kategori, durasi, batas_daftar, status, deskripsi, kode_logo) 
            VALUES ('$posisi', '$perusahaan', '$lokasi', '$sistem_kerja', '$kategori', '$durasi', '$batas_daftar', '$status', '$deskripsi', '$kode_logo')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: ../katalog.php");
        exit();
    } else {
        $pesan = "Gagal simpan: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lowongan - Admin</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../style-katalog.css">
    <style>
        .form-box { max-width: 600px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #dce5ef; }
        .form-group { margin-bottom: 14px; display: flex; flex-direction: column; gap: 5px; }
        .form-group label { font-weight: 600; font-size: 0.88rem; color: #1e293b; }
        .form-group input, .form-group select, .form-group textarea { padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-family: inherit; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
    </style>
</head>
<body>
<header id="header-utama">
    <div class="container">
        <h2 class="logo">SIMAG-JKB (Admin)</h2>
        <nav class="navbar">
            <ul><li><a href="../katalog.php">Lihat Katalog</a></li></ul>
        </nav>
    </div>
</header>
<main class="main-katalog">
    <div class="container">
        <div class="form-box">
            <h2 style="color: var(--biru-trpl); margin-bottom: 18px;">Tambah Lowongan Magang</h2>
            <?php if (!empty($pesan)): ?><p style="color: red;"><?php echo $pesan; ?></p><?php endif; ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Posisi Magang</label>
                    <input type="text" name="posisi" placeholder="Frontend Developer" required>
                </div>
                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" name="perusahaan" placeholder="PT Contoh Digital" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Lokasi (Kota, Provinsi)</label>
                        <input type="text" name="lokasi" placeholder="Cilacap, Jawa Tengah" required>
                    </div>
                    <div class="form-group">
                        <label>Sistem Kerja</label>
                        <select name="sistem_kerja">
                            <option value="wfo">WFO (On-site)</option>
                            <option value="hybrid">Hybrid</option>
                            <option value="wfh">Remote (WFH)</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori">
                            <option value="software">Software Engineering</option>
                            <option value="jaringan">Jaringan & Server</option>
                            <option value="desain">UI/UX & Desain</option>
                            <option value="database">Data & Basis Data</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kode Logo Keyboard</label>
                        <input type="text" name="kode_logo" placeholder="</>, >_, UX, QL" maxlength="5" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Durasi Magang</label>
                        <input type="text" name="durasi" placeholder="6 Bulan" required>
                    </div>
                    <div class="form-group">
                        <label>Batas Pendaftaran</label>
                        <input type="text" name="batas_daftar" placeholder="20 Oktober 2026" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status">
                        <option value="Buka">Buka</option>
                        <option value="Segera Tutup">Segera Tutup</option>
                        <option value="Tutup">Tutup</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Deskripsi & Syarat</label>
                    <textarea name="deskripsi" rows="4" placeholder="Ketik rincian tugas..." required></textarea>
                </div>
                <div style="display: flex; gap: 10px; margin-top: 15px;">
                    <button type="submit" class="btn-utama" style="flex: 1; padding: 10px;">Simpan Lowongan</button>
                    <a href="../katalog.php" class="btn-sekunder" style="text-align: center; padding: 10px;">Batal</a>
                </div>
            </form>
        </div>
    </div>
</main>
</body>
</html>