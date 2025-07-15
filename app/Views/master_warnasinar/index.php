<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-bolt"></i>
            </div>
            <div>Master Warna Sinar
                <div class="page-title-subheading">Daftar seluruh data warna sinar.</div>
            </div>
        </div>
        <div class="page-title-actions">
            <a href="<?= base_url('masterwarnasinar/create') ?>" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Warna Sinar
            </a>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>
<div class="main-card mb-3 card">
    <div class="card-body">
        <form class="form-inline mb-3 d-flex" method="get" action="" style="gap:10px;">
            <input type="text" name="keyword" class="form-control" placeholder="Cari nama atau user" value="<?= esc($keyword) ?>">
            <button type="submit" class="btn btn-info">Cari</button>
        </form>
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th style="width:5%">No</th>
                    <th>Nama Warna Sinar</th>
                    <th>Otoritas</th>
                    <th>Deskripsi</th>
                    <th style="width:15%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($warnasinar as $w) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= esc($w['name']) ?></td>
                        <td class="text-center">
                            <?php if ($w['otoritas'] === null): ?>
                                <span class="badge badge-secondary">Belum Diotorisasi</span>
                            <?php elseif ($w['otoritas'] === 'T'): ?>
                                <span class="badge badge-success">Terverifikasi</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Ditolak</span>
                            <?php endif; ?>
                        </td>
                        <td><?= esc($w['description'] ?? '-') ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('masterwarnasinar/edit/'.$w['id']) ?>" class="btn btn-warning btn-sm<?= $w['otoritas'] === null ? ' disabled' : '' ?>">Edit</a>
                            <form action="<?= base_url('masterwarnasinar/delete/'.$w['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                <button type="submit" class="btn btn-danger btn-sm<?= $w['otoritas'] === null ? ' disabled' : '' ?>">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>
