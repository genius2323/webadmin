<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Web Admin') ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dyZtM4Q1hQ+6Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw1Qw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url('assets/css/modern-admin.css') ?>">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/sidebar-custom.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/card-modern.css') ?>">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('mainSidebar');
            const hamburgerBtn = document.querySelector('.hamburger-btn');
            const overlay = document.querySelector('.sidebar-mobile-overlay');
            const body = document.body;

            function openSidebar() {
                sidebar.classList.add('open');
                body.classList.add('sidebar-open');
                hamburgerBtn.classList.add('active');
            }

            function closeSidebar() {
                sidebar.classList.remove('open');
                body.classList.remove('sidebar-open');
                hamburgerBtn.classList.remove('active');
            }

            hamburgerBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                if (sidebar.classList.contains('open')) {
                    closeSidebar();
                } else {
                    openSidebar();
                }
            });
            overlay.addEventListener('click', closeSidebar);
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('close-sidebar-btn')) {
                    closeSidebar();
                }
            });

            // Toggle submenu and set active for parent
            document.querySelectorAll('.sidebar .has-sub > a').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    var parent = link.parentElement;
                    parent.classList.toggle('open');
                    // Remove active from all .has-sub > a
                    document.querySelectorAll('.sidebar .has-sub > a').forEach(function(l) {
                        l.classList.remove('active');
                    });
                    // Add active to this link if submenu is open
                    if (parent.classList.contains('open')) {
                        link.classList.add('active');
                    }
                });
            });

            // Sidebar tetap bisa di-toggle di desktop dan mobile
        });
    </script>
    </style>
</head>

<body>
    <!-- Sidebar -->
    <nav id="mainSidebar" class="sidebar">
        <div class="sidebar-header">
            <span class="sidebar-title">Menu</span>
            <button class="close-sidebar-btn" aria-label="Close sidebar">&times;</button>
        </div>
        <ul class="sidebar-menu">
            <?php $departmentId = session()->get('department_id');
            $uri = service('uri'); ?>
            <?php if ($departmentId == 1): // POS 
            ?>
                <li class="sidebar-heading">POS Menu</li>
                <li><a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'active' : '' ?>">Dashboard POS</a></li>
                <li><a href="<?= site_url('pos/transaksi') ?>" class="<?= $uri->getSegment(1) == 'pos' && $uri->getSegment(2) == 'transaksi' ? 'active' : '' ?>">Transaksi</a></li>
                <li class="has-sub">
                    <a href="#" class="<?= in_array($uri->getSegment(1), ['penjualan', 'datapenjualan']) ? 'active' : '' ?>">Penjualan</a>
                    <ul class="submenu">
                        <li><a href="<?= site_url('penjualan') ?>" class="<?= $uri->getSegment(1) == 'penjualan' ? 'active' : '' ?>">Input Penjualan</a></li>
                        <li><a href="<?= site_url('datapenjualan') ?>" class="<?= $uri->getSegment(1) == 'datapenjualan' ? 'active' : '' ?>">Data Penjualan</a></li>
                    </ul>
                </li>
                <li><a href="<?= site_url('batas-tanggal') ?>" class="<?= $uri->getSegment(1) == 'batas-tanggal' ? 'active' : '' ?>">Batas Tanggal Sistem</a></li>
            <?php elseif ($departmentId == 2): // Backoffice 
            ?>
                <li class="sidebar-heading">Backoffice Menu</li>
                <li><a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'active' : '' ?>">Dashboard Backoffice</a></li>
                <li><a href="<?= site_url('backoffice/laporan') ?>" class="<?= $uri->getSegment(1) == 'backoffice' && $uri->getSegment(2) == 'laporan' ? 'active' : '' ?>">Laporan</a></li>
            <?php elseif ($departmentId == 3): // General 
            ?>
                <li class="sidebar-heading">General Menu</li>
                <li><a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'active' : '' ?>">Dashboard General</a></li>
                <li><a href="<?= site_url('datapenjualan') ?>" class="<?= $uri->getSegment(1) == 'datapenjualan' ? 'active' : '' ?>">Data Penjualan</a></li>
                <li class="sidebar-heading">Master</li>
                <li><a href="<?= base_url('mastersales') ?>" class="<?= $uri->getSegment(1) == 'mastersales' ? 'active' : '' ?>">Sales / Pegawai</a></li>
                <li><a href="<?= base_url('mastercustomer') ?>" class="<?= $uri->getSegment(1) == 'mastercustomer' ? 'active' : '' ?>">Customer</a></li>
                <li class="has-sub">
                    <a href="#" class="<?= $uri->getSegment(1) == 'user' ? 'active' : '' ?>">Manajemen User</a>
                    <ul class="submenu">
                        <li><a href="<?= site_url('user') ?>" class="<?= $uri->getSegment(1) == 'user' ? 'active' : '' ?>">Data User</a></li>
                    </ul>
                </li>
                <li><a href="<?= site_url('masterbarang') ?>">Master Barang</a></li>
                <?php
                // Cek jika salah satu submenu aktif
                $klasifikasiActive = in_array($uri->getSegment(1), [
                    'masterkategori',
                    'masterdaya',
                    'masterdimensi',
                    'masterfiting',
                    'mastergondola',
                    'masterjenis',
                    'masterjumlahmata',
                    'masterkaki',
                    'mastermerk',
                    'mastermodel',
                    'masterpelengkap',
                    'mastersatuan',
                    'masterukuranbarang',
                    'mastervoltase',
                    'masterwarnabibir',
                    'masterwarnabody',
                    'masterwarnasinar'
                ]);
                ?>
                <li class="has-sub<?= $klasifikasiActive ? ' open' : '' ?>">
                    <a href="#" class="<?= $klasifikasiActive ? 'active' : '' ?>">Master Klasifikasi</a>
                    <ul class="submenu">
                        <li><a href="<?= site_url('masterkategori') ?>" class="<?= $uri->getSegment(1) == 'masterkategori' ? 'active' : '' ?>">Master Kategori</a></li>
                        <li><a href="<?= site_url('masterdaya') ?>" class="<?= $uri->getSegment(1) == 'masterdaya' ? 'active' : '' ?>">Master Daya</a></li>
                        <li><a href="<?= base_url('masterdimensi') ?>" class="<?= $uri->getSegment(1) == 'masterdimensi' ? 'active' : '' ?>">Dimensi</a></li>
                        <li><a href="<?= base_url('masterfiting') ?>" class="<?= $uri->getSegment(1) == 'masterfiting' ? 'active' : '' ?>">Fiting</a></li>
                        <li><a href="<?= base_url('mastergondola') ?>" class="<?= $uri->getSegment(1) == 'mastergondola' ? 'active' : '' ?>">Gondola</a></li>
                        <li><a href="<?= base_url('masterjenis') ?>" class="<?= $uri->getSegment(1) == 'masterjenis' ? 'active' : '' ?>">Jenis</a></li>
                        <li><a href="<?= base_url('masterjumlahmata') ?>" class="<?= $uri->getSegment(1) == 'masterjumlahmata' ? 'active' : '' ?>">Jumlah Mata</a></li>
                        <li><a href="<?= base_url('masterkaki') ?>" class="<?= $uri->getSegment(1) == 'masterkaki' ? 'active' : '' ?>">Kaki</a></li>
                        <li><a href="<?= base_url('mastermerk') ?>" class="<?= $uri->getSegment(1) == 'mastermerk' ? 'active' : '' ?>">Merk</a></li>
                        <li><a href="<?= base_url('mastermodel') ?>" class="<?= $uri->getSegment(1) == 'mastermodel' ? 'active' : '' ?>">Model</a></li>
                        <li><a href="<?= base_url('masterpelengkap') ?>" class="<?= $uri->getSegment(1) == 'masterpelengkap' ? 'active' : '' ?>">Pelengkap</a></li>
                        <li><a href="<?= base_url('mastersatuan') ?>" class="<?= $uri->getSegment(1) == 'mastersatuan' ? 'active' : '' ?>">Satuan</a></li>
                        <li><a href="<?= base_url('masterukuranbarang') ?>" class="<?= $uri->getSegment(1) == 'masterukuranbarang' ? 'active' : '' ?>">Ukuran Barang</a></li>
                        <li><a href="<?= base_url('mastervoltase') ?>" class="<?= $uri->getSegment(1) == 'mastervoltase' ? 'active' : '' ?>">Voltase</a></li>
                        <li><a href="<?= base_url('masterwarnabibir') ?>" class="<?= $uri->getSegment(1) == 'masterwarnabibir' ? 'active' : '' ?>">Warna Bibir</a></li>
                        <li><a href="<?= base_url('masterwarnabody') ?>" class="<?= $uri->getSegment(1) == 'masterwarnabody' ? 'active' : '' ?>">Warna Body</a></li>
                        <li><a href="<?= base_url('masterwarnasinar') ?>" class="<?= $uri->getSegment(1) == 'masterwarnasinar' ? 'active' : '' ?>">Warna Sinar</a></li>
                    </ul>
                </li>
                <li class="sidebar-heading">Fasilitas</li>
                <li><a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'active' : '' ?>">Otoritas</a></li>
                <li><a href="<?= site_url('batas-tanggal') ?>" class="<?= $uri->getSegment(1) == 'batas-tanggal' ? 'active' : '' ?>">Batas Tanggal Sistem</a></li>
            <?php else: ?>
                <li class="sidebar-heading">Menu</li>
                <li><a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'active' : '' ?>">Dashboard</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <div class="sidebar-mobile-overlay"></div>


    <header class="main-header">
        <div style="display:flex;align-items:center;gap:15px;">
            <button class="hamburger-btn" aria-label="Open sidebar">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="header-title text-center">Web Admin</div>
        </div>
        <div class="header-user-info">
            <span class="widget-heading mb-0">
                <?= esc(session()->get('user_nama')) ?>
            </span>
            <a href="<?= site_url('logout') ?>" class="btn-logout-modern">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" style="margin-right:4px;">
                    <path d="M16 17l5-5m0 0l-5-5m5 5H9" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M13 5v-2a2 2 0 0 0-2-2h-6a2 2 0 0 0-2 2v18a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-2" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Logout
            </a>
        </div>
    </header>

    <main class="main-content">
        <div class="content-card">
            <?= $this->renderSection('content') ?>
        </div>
        <footer class="footer">
            &copy; <?= date('Y') ?> Web Admin. All rights reserved.
        </footer>
    </main>

    <!-- Bootstrap 5 JS Bundle (Popper included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoA6DQD1KQ9Q8cbh6wr6LrZ8p1ztB1zBOsv6yFmQbze+3Kk" crossorigin="anonymous"></script>
</body>

</html>