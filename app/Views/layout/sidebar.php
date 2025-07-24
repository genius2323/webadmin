<div class="app-sidebar sidebar-shadow scrollbar-sidebar">
    <!-- Close button for sidebar overlay, always visible on overlay -->
    <button class="close-sidebar-btn" aria-label="Close sidebar" style="position:absolute;top:10px;right:10px;z-index:1301;background:transparent;border:none;font-size:2rem;line-height:1;color:#333;cursor:pointer;">&times;</button>
    <!-- Struktur sidebar sesuai desain, isi menu tetap milik user -->

    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <?php $departmentId = session()->get('department_id'); ?>
            <?php if ($departmentId == 1): // POS 
            ?>
                <?php $uri = service('uri'); ?>
                <li class="app-sidebar__heading">POS Menu</li>
                <li>
                    <a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard POS
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('pos/transaksi') ?>" class="<?= $uri->getSegment(1) == 'pos' && $uri->getSegment(2) == 'transaksi' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon pe-7s-cash"></i>
                        Transaksi
                    </a>
                </li>
                <li>
                    <a href="#" class="<?= in_array($uri->getSegment(1), ['penjualan', 'datapenjualan']) ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon fa fa-shopping-cart"></i>
                        Penjualan
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="<?= site_url('penjualan') ?>" class="<?= $uri->getSegment(1) == 'penjualan' ? 'mm-active' : '' ?>">
                                <i class="metismenu-icon pe-7s-plus"></i>
                                Input Penjualan
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('datapenjualan') ?>" class="<?= $uri->getSegment(1) == 'datapenjualan' ? 'mm-active' : '' ?>">
                                <i class="metismenu-icon pe-7s-note2"></i>
                                Data Penjualan
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= site_url('batas-tanggal') ?>" class="<?= $uri->getSegment(1) == 'batas-tanggal' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon fa fa-calendar"></i>
                        Batas Tanggal Sistem
                    </a>
                </li>
            <?php elseif ($departmentId == 2): // Backoffice 
            ?>
                <?php $uri = service('uri'); ?>
                <li class="app-sidebar__heading">Backoffice Menu</li>
                <li>
                    <a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard Backoffice
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('backoffice/laporan') ?>" class="<?= $uri->getSegment(1) == 'backoffice' && $uri->getSegment(2) == 'laporan' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon pe-7s-graph"></i>
                        Laporan
                    </a>
                </li>
            <?php elseif ($departmentId == 3): // General 
            ?>
                <?php $uri = service('uri'); ?>
                <li class="app-sidebar__heading">General Menu</li>
                <li>
                    <a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard General
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('datapenjualan') ?>" class="<?= $uri->getSegment(1) == 'datapenjualan' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon pe-7s-note2"></i>
                        Data Penjualan
                    </a>
                </li>

                <li class="app-sidebar__heading">Master</li>
                <li>
                    <a href="<?= base_url('mastersales') ?>" class="<?= $uri->getSegment(1) == 'mastersales' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon pe-7s-id"></i>
                        Sales / Pegawai
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('mastercustomer') ?>" class="<?= $uri->getSegment(1) == 'mastercustomer' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Customer
                    </a>
                </li>
                <li>
                    <a href="#" class="<?= $uri->getSegment(1) == 'user' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Manajemen User
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>

                    <ul>
                        <li>
                            <a href="<?= site_url('user') ?>" class="<?= $uri->getSegment(1) == 'user' ? 'mm-active' : '' ?>">
                                <i class="metismenu-icon pe-7s-id"></i>
                                Data User
                            </a>
                        </li>
                    </ul>
                <li>
                    <a href="<?= site_url('masterbarang') ?>">
                        <i class="metismenu-icon fa fa-cube"></i>
                        Master Barang
                    </a>
                </li>
                <li>
                    <a href="#" class="<?= in_array($uri->getSegment(1), ['masterkategori', 'masterdaya']) ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon fa fa-list-alt"></i>
                        Master Klasifikasi
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="<?= site_url('masterkategori') ?>" class="<?= $uri->getSegment(1) == 'masterkategori' ? 'mm-active' : '' ?>">
                                <i class="metismenu-icon pe-7s-id"></i>
                                Master Kategori
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('masterdaya') ?>" class="<?= $uri->getSegment(1) == 'masterdaya' ? 'mm-active' : '' ?>">
                                <i class="metismenu-icon fa fa-bolt"></i>
                                Master Daya
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('masterdimensi') ?>">Dimensi</a>
                        </li>
                        <li>
                            <a href="<?= base_url('masterfiting') ?>">Fiting</a>
                        </li>
                        <li>
                            <a href="<?= base_url('mastergondola') ?>">Gondola</a>
                        </li>
                        <li>
                            <a href="<?= base_url('masterjenis') ?>">Jenis</a>
                        </li>
                        <li>
                            <a href="<?= base_url('masterjumlahmata') ?>">Jumlah Mata</a>
                        </li>
                        <li>
                            <a href="<?= base_url('masterkaki') ?>">Kaki</a>
                        </li>
                        <li>
                            <a href="<?= base_url('mastermerk') ?>">Merk</a>
                        </li>
                        <li>
                            <a href="<?= base_url('mastermodel') ?>">Model</a>
                        </li>
                        <li>
                            <a href="<?= base_url('masterpelengkap') ?>">Pelengkap</a>
                        </li>
                        <li>
                            <a href="<?= base_url('mastersatuan') ?>">Satuan</a>
                        </li>
                        <li>
                            <a href="<?= base_url('masterukuranbarang') ?>">Ukuran Barang</a>
                        </li>
                        <li>
                            <a href="<?= base_url('mastervoltase') ?>">Voltase</a>
                        </li>
                        <li>
                            <a href="<?= base_url('masterwarnabibir') ?>">Warna Bibir</a>
                        </li>
                        <li>
                            <a href="<?= base_url('masterwarnabody') ?>">Warna Body</a>
                        </li>
                        <li>
                            <a href="<?= base_url('masterwarnasinar') ?>">Warna Sinar</a>
                        </li>
                    </ul>
                </li>

                <li class="app-sidebar__heading">Fasilitas</li>
                <li>
                    <a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Otoritas
                    </a>
                    <a href="<?= site_url('batas-tanggal') ?>" class="<?= $uri->getSegment(1) == 'batas-tanggal' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon fa fa-calendar"></i>
                        Batas Tanggal Sistem
                    </a>
                </li>

            <?php else: // Default 
            ?>
                <?php $uri = service('uri'); ?>
                <li class="app-sidebar__heading">Menu</li>
                <li>
                    <a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>

</div>