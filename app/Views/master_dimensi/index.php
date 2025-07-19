<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-bolt"></i>
            </div>
            <div>Master Dimensi
                <div class="page-title-subheading">Daftar seluruh data dimensi.</div>
            </div>
        </div>
        <div class="page-title-actions">
            <a href="<?= site_url('masterdimensi/create') ?>" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Dimensi
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
            <input type="text" name="search" class="form-control" placeholder="Cari nama..." value="<?= esc($_GET['search'] ?? '') ?>">
            <button type="submit" class="btn btn-info">Cari</button>
        </form>
        <link rel="stylesheet" href="/assets/css/table-responsive-custom.css">
        <div class="table-responsive-custom">
        <table class="table table-hover table-striped table-bordered table-sm" style="font-size:0.95em;">
            <thead>
                <tr>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Otoritas</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dimensi as $row): ?>
                <?php
                    $search = $_GET['search'] ?? '';
                    if ($search && stripos($row['name'], $search) === false) continue;
                ?>
                <tr>
                    <td><?= esc($row['name']) ?></td>
                    <td><?= esc($row['description']) ?></td>
                    <td class="text-center">
                        <?php if ($row['otoritas'] === 'T'): ?>
                            <span class="badge badge-success">Sudah Otorisasi</span>
                        <?php else: ?>
                            <span class="badge badge-secondary">Belum Otorisasi</span>
                        <?php endif; ?>
                    </td>
                    <td class="d-flex justify-content-center align-items-center" style="gap:3px; min-width:70px;">
                        <a href="<?= site_url('masterdimensi/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning" title="Edit"
                           <?php if (empty($row['otoritas']) || $row['otoritas'] !== 'T'): ?>disabled style="pointer-events:none;opacity:0.6;"<?php endif; ?>>
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="<?= site_url('masterdimensi/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger" title="Hapus"
                           <?php if (empty($row['otoritas']) || $row['otoritas'] !== 'T'): ?>disabled style="pointer-events:none;opacity:0.6;"<?php endif; ?>
                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
