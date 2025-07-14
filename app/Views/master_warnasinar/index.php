<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <h4 class="mb-4">Master Warna Sinar</h4>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <form class="form-inline" method="get" action="">
            <input type="text" name="keyword" class="form-control mr-2" placeholder="Cari nama atau user" value="<?= esc($keyword) ?>">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
        <a href="<?= base_url('masterwarnasinar/create') ?>" class="btn btn-success">Tambah Warna Sinar</a>
    </div>
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
