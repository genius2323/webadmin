<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-bolt"></i>
            </div>
            <div>Master Warna Body
                <div class="page-title-subheading">Daftar seluruh data warna body.</div>
            </div>
        </div>
        <div class="page-title-actions">
            <a href="<?= base_url('masterwarnabody/create') ?>" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Warna Body
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
            <input type="text" name="keyword" class="form-control" placeholder="Cari nama warna body" value="<?= esc($keyword) ?>">
            <button type="submit" class="btn btn-info">Cari</button>
        </form>
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th style="width:5%">No</th>
                    <th>Nama Warna Body</th>
                    <th>Deskripsi</th>
                    <th>Otoritas</th>
                    <th style="width:15%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($warnabody as $w) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= esc($w['name']) ?></td>
                        <td><?= esc($w['description'] ?? '-') ?></td>
                        <td class="text-center">
                            <?php if ($w['otoritas'] === null): ?>
                                <span class="badge badge-secondary">Belum Diotorisasi</span>
                            <?php elseif ($w['otoritas'] === 'T'): ?>
                                <span class="badge badge-success">Terverifikasi</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Ditolak</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <a href="<?= base_url('masterwarnabody/edit/'.$w['id']) ?>" class="btn btn-warning btn-sm<?= $w['otoritas'] === null ? ' disabled' : '' ?>">Edit</a>
                            <form action="<?= base_url('masterwarnabody/delete/'.$w['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
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
