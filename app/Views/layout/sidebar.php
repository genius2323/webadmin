<?php
$departmentId = session()->get('department_id');
$uri = service('uri');
// Cek jika salah satu submenu Master Klasifikasi aktif
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
<nav id="mainSidebar" class="sidebar">
    <div class="sidebar-header">
        <span class="sidebar-title">Menu</span>
        <button class="close-sidebar-btn" aria-label="Close sidebar">&times;</button>
    </div>
    <ul class="sidebar-menu">
        <?php if ($departmentId == 1): // POS 
        ?>
            <li class="sidebar-heading">POS Menu</li>
            <li><a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'active' : '' ?>"><span class="material-symbols-rounded">dashboard</span> Dashboard POS</a></li>
            <li><a href="<?= site_url('pos/transaksi') ?>" class="<?= $uri->getSegment(1) == 'pos' && $uri->getSegment(2) == 'transaksi' ? 'active' : '' ?>"><span class="material-symbols-rounded">point_of_sale</span> Transaksi</a></li>
            <li class="has-sub">
                <a href="#" class="<?= in_array($uri->getSegment(1), ['penjualan', 'datapenjualan']) ? 'active' : '' ?>"><span class="material-symbols-rounded">receipt_long</span> Penjualan</a>
                <ul class="submenu">
                    <li><a href="<?= site_url('penjualan') ?>" class="<?= $uri->getSegment(1) == 'penjualan' ? 'active' : '' ?>">Input Penjualan</a></li>
                    <li><a href="<?= site_url('datapenjualan') ?>" class="<?= $uri->getSegment(1) == 'datapenjualan' ? 'active' : '' ?>">Data Penjualan</a></li>
                </ul>
            </li>
            <li><a href="<?= site_url('batas-tanggal') ?>" class="<?= $uri->getSegment(1) == 'batas-tanggal' ? 'active' : '' ?>"><span class="material-symbols-rounded">event_busy</span> Batas Tanggal Sistem</a></li>
        <?php elseif ($departmentId == 2): // Backoffice 
        ?>
            <li class="sidebar-heading">Backoffice Menu</li>
            <li><a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'active' : '' ?>"><span class="material-symbols-rounded">dashboard</span> Dashboard Backoffice</a></li>
            <li><a href="<?= site_url('backoffice/laporan') ?>" class="<?= $uri->getSegment(1) == 'backoffice' && $uri->getSegment(2) == 'laporan' ? 'active' : '' ?>"><span class="material-symbols-rounded">bar_chart</span> Laporan</a></li>
        <?php elseif ($departmentId == 3): // General 
        ?>
            <li class="sidebar-heading">General Menu</li>
            <li><a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'active' : '' ?>"><span class="material-symbols-rounded">dashboard</span> Dashboard General</a></li>
            <li><a href="<?= site_url('datapenjualan') ?>" class="<?= $uri->getSegment(1) == 'datapenjualan' ? 'active' : '' ?>"><span class="material-symbols-rounded">table_view</span> Data Penjualan</a></li>
            <li class="sidebar-heading">Master</li>
            <li><a href="<?= base_url('mastersales') ?>" class="<?= $uri->getSegment(1) == 'mastersales' ? 'active' : '' ?>"><span class="material-symbols-rounded">badge</span> Sales / Pegawai</a></li>
            <li><a href="<?= base_url('mastercustomer') ?>" class="<?= $uri->getSegment(1) == 'mastercustomer' ? 'active' : '' ?>"><span class="material-symbols-rounded">person</span> Customer</a></li>
            <li class="has-sub">
                <a href="#" class="<?= $uri->getSegment(1) == 'user' ? 'active' : '' ?>"><span class="material-symbols-rounded">manage_accounts</span> Manajemen User</a>
                <ul class="submenu">
                    <li><a href="<?= site_url('user') ?>" class="<?= $uri->getSegment(1) == 'user' ? 'active' : '' ?>">Data User</a></li>
                </ul>
            </li>
            <li><a href="<?= site_url('masterbarang') ?>"><span class="material-symbols-rounded">inventory_2</span> Master Barang</a></li>
            <li class="has-sub<?= $klasifikasiActive ? ' open' : '' ?>">
                <a href="#" class="<?= $klasifikasiActive ? 'active' : '' ?>"><span class="material-symbols-rounded">category</span> Master Klasifikasi</a>
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
            <li><a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'active' : '' ?>"><span class="material-symbols-rounded">verified_user</span> Otoritas</a></li>
            <li><a href="<?= site_url('batas-tanggal') ?>" class="<?= $uri->getSegment(1) == 'batas-tanggal' ? 'active' : '' ?>"><span class="material-symbols-rounded">event_busy</span> Batas Tanggal Sistem</a></li>
        <?php else: ?>
            <li class="sidebar-heading">Menu</li>
            <li><a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'active' : '' ?>"><span class="material-symbols-rounded">dashboard</span> Dashboard</a></li>
        <?php endif; ?>
    </ul>
</nav>
<div class="sidebar-mobile-overlay"></div>