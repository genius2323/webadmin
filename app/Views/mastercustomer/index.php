<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-users"></i>
            </div>
            <div>Master Customer
                <div class="page-title-subheading">Daftar seluruh data customer.</div>
            </div>
        </div>
        <div class="page-title-actions">
            <a href="<?= site_url('mastercustomer/create') ?>" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Customer
            </a>
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
            <input type="text" name="search" class="form-control" placeholder="Cari nama customer..." value="<?= esc($_GET['search'] ?? '') ?>">
            <button type="submit" class="btn btn-info">Cari</button>
        </form>
        <link rel="stylesheet" href="/assets/css/table-responsive-custom.css">
        <div class="table-responsive-custom" style="overflow-x:auto;max-width:100vw;">
        <table class="table table-hover table-striped table-bordered table-sm" style="font-size:0.95em;">
            <thead>
                <tr>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Contact Person</th>
                    <th class="text-center">Kota</th>
                    <th class="text-center">Provinsi</th>
                    <th class="text-center">Sales</th>
                    <th class="text-center">No HP</th>
                    <th class="text-center">Batas Piutang</th>
                    <th class="text-center">NPWP</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $row): ?>
                <?php
                    $search = $_GET['search'] ?? '';
                    if ($search && stripos($row['nama_customer'], $search) === false) continue;
                ?>
                <tr>
                    <td><?= esc($row['kode_customer']) ?></td>
                    <td><?= esc($row['nama_customer']) ?></td>
                    <td><?= esc($row['alamat']) ?></td>
                    <td><?= esc($row['contact_person']) ?></td>
                    <td><?= esc($row['kota']) ?></td>
                    <td><?= esc($row['provinsi']) ?></td>
                    <td><?= esc($row['sales']) ?></td>
                    <td><?= esc($row['no_hp']) ?></td>
                    <td class="text-right">Rp <?= number_format($row['batas_piutang'],0,',','.') ?></td>
                    <td><?= esc($row['npwp_nomor']) ?></td>
                    <td class="text-center align-items-center" style="gap:3px; min-width:100px;">
                        
                            <a href="<?= site_url('mastercustomer/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="<?= site_url('mastercustomer/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="fa fa-trash"></i>
                            </a>
                        
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <!-- CSS sudah di-link di atas -->
    </div>
</div>
<?= $this->endSection(); ?>
