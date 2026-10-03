<?php
include 'database/koneksi.php';

// Ambil input filter pencarian jika ada
$keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($koneksi, trim($_GET['keyword'])) : '';
$divisi  = isset($_GET['divisi']) ? mysqli_real_escape_string($koneksi, trim($_GET['divisi'])) : '';
$sistem  = isset($_GET['sistem']) ? mysqli_real_escape_string($koneksi, trim($_GET['sistem'])) : '';

// Query SQL Dinamis
$sql = "SELECT * FROM lowongan WHERE 1=1";

if (!empty($keyword)) {
    $sql .= " AND (posisi LIKE '%$keyword%' OR perusahaan LIKE '%$keyword%' OR lokasi LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%')";
}
if (!empty($divisi)) {
    $sql .= " AND kategori = '$divisi'";
}
if (!empty($sistem)) {
    $sql .= " AND sistem_kerja = '$sistem'";
}

$sql .= " ORDER BY id ASC";
$result = mysqli_query($koneksi, $sql);

// Simpan ke array
$jobs = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $jobs[] = $row;
    }
}
$firstJob = !empty($jobs) ? $jobs[0] : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Magang - SIMAG JKB</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-katalog.css">
</head>
<body>

<header id="header-utama">
    <div class="container">
        <h2 class="logo">SIMAG-JKB</h2>
        <nav class="navbar">
            <ul>
                <li><a href="index.html">Beranda</a></li>
                <li><a href="katalog.php" class="active">Katalog Magang</a></li>
                <li><a href="ulasan.html">Form Ulasan</a></li>
                <li><a href="login.html">Login</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="main-katalog">
    <div class="container">
        
        <!-- PENCARIAN & FILTER -->
        <div class="katalog-top">
            <form class="box-filter" action="katalog.php" method="GET">
                <input type="search" name="keyword" value="<?php echo htmlspecialchars($keyword); ?>" placeholder="Cari posisi atau nama kantor..." class="form-input search-input">
                
                <select name="divisi" class="form-input">
                    <option value="">Semua Bidang</option>
                    <option value="software" <?php echo ($divisi == 'software') ? 'selected' : ''; ?>>Software Engineering</option>
                    <option value="jaringan" <?php echo ($divisi == 'jaringan') ? 'selected' : ''; ?>>Jaringan & Server</option>
                    <option value="desain" <?php echo ($divisi == 'desain') ? 'selected' : ''; ?>>UI/UX & Desain</option>
                    <option value="database" <?php echo ($divisi == 'database') ? 'selected' : ''; ?>>Data & Basis Data</option>
                </select>

                <select name="sistem" class="form-input">
                    <option value="">Semua Sistem Kerja</option>
                    <option value="wfo" <?php echo ($sistem == 'wfo') ? 'selected' : ''; ?>>WFO (On-site)</option>
                    <option value="hybrid" <?php echo ($sistem == 'hybrid') ? 'selected' : ''; ?>>Hybrid</option>
                    <option value="wfh" <?php echo ($sistem == 'wfh') ? 'selected' : ''; ?>>Remote (WFH)</option>
                </select>

                <button type="submit" class="btn-utama btn-sm">Cari</button>
                <a href="katalog.php" class="btn-sekunder btn-sm">Reset</a>
            </form>
        </div>

        <!-- SPLIT LAYOUT -->
        <div class="split-layout">
            
            <!-- SISI KIRI: DAFTAR KARTU DARI DATABASE -->
            <div class="jobs-sidebar">
                <?php if (!empty($jobs)): ?>
                    <?php foreach ($jobs as $index => $job): 
                        $statusClass = ($job['status'] == 'Buka') ? 'open' : (($job['status'] == 'Segera Tutup') ? 'warning' : 'closed');
                        $statusText  = ($job['status'] == 'Buka') ? 'Pendaftaran Buka' : $job['status'];
                    ?>
                        <div class="job-card-item <?php echo ($index === 0) ? 'active' : ''; ?>" 
                             data-id="<?php echo $job['id']; ?>"
                             data-title="<?php echo htmlspecialchars($job['posisi']); ?>"
                             data-company="<?php echo htmlspecialchars($job['perusahaan']); ?>"
                             data-location="<?php echo htmlspecialchars($job['lokasi']); ?>"
                             data-worktype="(<?php echo strtoupper($job['sistem_kerja']); ?>)"
                             data-duration="<?php echo htmlspecialchars($job['durasi']); ?>"
                             data-deadline="<?php echo htmlspecialchars($job['batas_daftar']); ?>"
                             data-status="<?php echo $statusText; ?>"
                             data-status-class="<?php echo $statusClass; ?>"
                             data-logo="<?php echo htmlspecialchars($job['kode_logo']); ?>"
                             data-desc="<?php echo htmlspecialchars($job['deskripsi']); ?>">
                            
                            <div class="card-logo"><?php echo htmlspecialchars($job['kode_logo']); ?></div>
                            <div class="card-info">
                                <h4 class="job-title-link"><?php echo htmlspecialchars($job['posisi']); ?></h4>
                                <p class="company-text"><?php echo htmlspecialchars($job['perusahaan']); ?></p>
                                <span class="location-text"><?php echo htmlspecialchars($job['lokasi']); ?></span>
                                <span class="work-type">(<?php echo strtoupper($job['sistem_kerja']); ?>)</span>
                                <div class="tags-row">
                                    <span class="badge-tag"><?php echo ucfirst($job['kategori']); ?></span>
                                    <span class="badge-status <?php echo $statusClass; ?>">
                                        <?php echo $statusText; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="padding: 20px; color: var(--teks-pudar);">Tidak ada lowongan yang sesuai kriteria.</p>
                <?php endif; ?>
            </div>

            <!-- SISI KANAN: PREVIEW DETAIL STICKY -->
            <div class="job-preview-panel">
                <?php if ($firstJob): 
                    $fStatusClass = ($firstJob['status'] == 'Buka') ? 'open' : (($firstJob['status'] == 'Segera Tutup') ? 'warning' : 'closed');
                    $fStatusText  = ($firstJob['status'] == 'Buka') ? 'Pendaftaran Buka' : $firstJob['status'];
                ?>
                    <div class="preview-box">
                        <div class="preview-header">
                            <div class="preview-logo-title">
                                <div class="large-logo" id="view-logo"><?php echo htmlspecialchars($firstJob['kode_logo']); ?></div>
                                <div>
                                    <h3 id="view-title"><?php echo htmlspecialchars($firstJob['posisi']); ?></h3>
                                    <p class="preview-company" id="view-company"><?php echo htmlspecialchars($firstJob['perusahaan']); ?></p>
                                    <span class="preview-meta" id="view-location"><?php echo htmlspecialchars($firstJob['lokasi']); ?> (<?php echo strtoupper($firstJob['sistem_kerja']); ?>)</span>
                                </div>
                            </div>
                            <div class="preview-actions">
                                <a href="detail.html?id=<?php echo $firstJob['id']; ?>" id="view-btn-detail" class="btn-utama">Lihat Detail &rarr;</a>
                                <span class="badge-status <?php echo $fStatusClass; ?>" id="view-status"><?php echo $fStatusText; ?></span>
                            </div>
                        </div>

                        <hr class="preview-divider">

                        <div class="preview-body">
                            <h4>Rincian Lowongan</h4>
                            <div class="quick-info-grid">
                                <div><strong>Durasi Magang:</strong> <span id="view-duration"><?php echo htmlspecialchars($firstJob['durasi']); ?></span></div>
                                <div><strong>Batas Pendaftaran:</strong> <span id="view-deadline"><?php echo htmlspecialchars($firstJob['batas_daftar']); ?></span></div>
                            </div>

                            <h4>Deskripsi Pekerjaan</h4>
                            <p id="view-desc"><?php echo nl2br(htmlspecialchars($firstJob['deskripsi'])); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>

    </div>
</main>

<script>
const cards = document.querySelectorAll('.job-card-item');
const viewTitle = document.getElementById('view-title');
const viewCompany = document.getElementById('view-company');
const viewLocation = document.getElementById('view-location');
const viewDuration = document.getElementById('view-duration');
const viewDeadline = document.getElementById('view-deadline');
const viewDesc = document.getElementById('view-desc');
const viewStatus = document.getElementById('view-status');
const viewLogo = document.getElementById('view-logo');
const viewBtnDetail = document.getElementById('view-btn-detail');

cards.forEach(card => {
    card.addEventListener('click', function() {
        cards.forEach(c => c.classList.remove('active'));
        this.classList.add('active');

        viewTitle.textContent = this.dataset.title;
        viewCompany.textContent = this.dataset.company;
        viewLocation.textContent = this.dataset.location + ' ' + this.dataset.worktype;
        viewDuration.textContent = this.dataset.duration;
        viewDeadline.textContent = this.dataset.deadline;
        viewDesc.textContent = this.dataset.desc;
        viewLogo.textContent = this.dataset.logo;
        
        viewStatus.textContent = this.dataset.status;
        viewStatus.className = 'badge-status ' + this.dataset.statusClass;
        
        viewBtnDetail.href = 'detail.html?id=' + this.dataset.id;
    });
});
</script>

</body>
</html>