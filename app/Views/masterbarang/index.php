<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-cube"></i>
            </div>
            <div>Master Barang
                <div class="page-title-subheading">Daftar seluruh barang beserta detail dan stok.</div>
            </div>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= esc(session()->getFlashdata('success')) ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<div class="main-card mb-3 card">
    <div class="card-body">
        <form method="get" action="" class="mb-3 d-flex" style="gap:10px;">
            <input type="text" name="search" class="form-control" placeholder="Cari nama barang..." value="<?= esc($_GET['search'] ?? '') ?>">
            <button type="submit" class="btn btn-info">Cari</button>
        </form>
        <div class="table-masterbarang-responsive" style="max-width:100%;">
            <table class="table table-hover table-striped table-bordered table-sm" style="font-size:0.95em; margin-bottom:0;">
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
                        <?php $no = 1; foreach ($products as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($row['name']) ?></td>
                            <td><?= esc($row['category_name'] ?? '-') ?></td>
                            <td><?= esc($row['satuan_name'] ?? '-') ?></td>
                            <td><?= esc($row['jenis_name'] ?? '-') ?></td>                            
                            <td class="text-right" style="white-space: nowrap !important;">Rp <?= number_format($row['price'], 0, ',', '.') ?></td>
                            <td class="text-center"><?= esc($row['stock']) ?></td>
                            <td class="text-center align-items-center" style="gap:3px; min-width:90px;">
                                <a href="<?= site_url('masterbarang/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="<?= site_url('masterbarang/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus barang ini?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="9" class="text-center">Belum ada data barang.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
