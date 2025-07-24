<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="page-header-modern">
    <div>
        <h2 class="page-title">Master Barang</h2>
        <div class="page-subtitle">Daftar seluruh barang beserta detail dan stok.</div>
    </div>
    <a href="<?= site_url('masterbarang/create') ?>" class="btn-modern btn-primary-modern">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24">
            <path d="M12 5v14m7-7H5" stroke="#fff" stroke-width="2" stroke-linecap="round" />
        </svg> Tambah Barang
    </a>
</div>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert-modern alert-success-modern">
        <?= esc(session()->getFlashdata('success')) ?>
        <button type="button" class="close-alert" onclick="this.parentElement.style.display='none'">&times;</button>
    </div>
<?php endif; ?>
<div class="card-modern">
    <form method="get" action="" class="d-flex" style="gap:10px; margin-bottom:1.5rem; max-width:400px;">
        <input type="text" name="search" class="form-control-modern" placeholder="Cari nama barang..." value="<?= esc($_GET['search'] ?? '') ?>">
        <button type="submit" class="btn-modern btn-info-modern d-flex align-items-center"><svg width="16" height="16" fill="none" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" stroke="#fff" stroke-width="2" />
                <path d="M21 21l-4.35-4.35" stroke="#fff" stroke-width="2" stroke-linecap="round" />
            </svg> Cari</button>
    </form>
    <div class="table-responsive-modern">
        <table class="table-modern">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Satuan</th>
                    <th class="text-center">Jenis</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Stok</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php $no = 1;
                    foreach ($products as $row): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center" style="white-space: nowrap !important;"><?= esc($row['name']) ?></td>
                            <td class="text-center"><?= esc($row['category_name'] ?? '-') ?></td>
                            <td class="text-center"><?= esc($row['satuan_name'] ?? '-') ?></td>
                            <td class="text-center" style="white-space: nowrap !important;"><?= esc($row['jenis_name'] ?? '-') ?></td>
                            <td class="text-center" style="white-space: nowrap !important;">Rp <?= number_format($row['price'], 0, ',', '.') ?></td>
                            <td class="text-center"><?= esc($row['stock']) ?></td>
                            <td style="min-width:90px;display:flex;gap:6px;justify-content:center;align-items:center;">
                                <a href="<?= site_url('masterbarang/edit/' . $row['id']) ?>" class="btn-modern btn-warning-modern" title="Edit">
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
                                        <path d="M4 21h17" stroke="#fff" stroke-width="2" stroke-linecap="round" />
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L7 20.5 2 22l1.5-5L18.5 2.5Z" stroke="#fff" stroke-width="2" />
                                    </svg>
                                </a>
                                <a href="<?= site_url('masterbarang/delete/' . $row['id']) ?>" class="btn-modern btn-danger-modern" title="Hapus" onclick="return confirm('Yakin ingin menghapus barang ini?')">
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
                                        <path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m2 0v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6h14z" stroke="#fff" stroke-width="2" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">Belum ada data barang.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>