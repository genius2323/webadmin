<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-id icon-gradient bg-tempting-azure"></i>
                </div>
                <div>Data User
                    <div class="page-title-subheading">Daftar seluruh user aplikasi.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= site_url('user/create') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah User
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
            <table style="width: 100%;" id="userTable" class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">No KTP</th>
                        <th class="text-center">Otoritas</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= esc($user['nama']) ?></td>
                            <td><?= esc($user['username']) ?></td>
                            <td><?= esc($user['alamat']) ?></td>
                            <td><?= esc($user['noktp']) ?></td>
                            <td class="text-center">
                                <?php if ($user['otoritas'] === 'T'): ?>
                                    <span class="badge badge-success">Sudah Otorisasi</span>
                                <?php else: ?>
                                    <span class="badge badge-secondary">Belum Otorisasi</span>
                                <?php endif; ?>
                            </td>
                            <td class="d-flex justify-content-center align-items-center" style="gap:3px; min-width:70px;">
                                <a href="<?= site_url('user/edit/' . $user['id']) ?>" class="btn btn-sm btn-warning" title="Edit"
                                   <?php if (empty($user['otoritas']) || $user['otoritas'] !== 'T'): ?>disabled style="pointer-events:none;opacity:0.6;"<?php endif; ?>>
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="<?= site_url('user/delete/' . $user['id']) ?>" class="btn btn-sm btn-danger" title="Hapus"
                                   <?php if (empty($user['otoritas']) || $user['otoritas'] !== 'T'): ?>disabled style="pointer-events:none;opacity:0.6;"<?php endif; ?>
                                   onclick="return confirm('Yakin ingin menghapus user ini?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection() ?>
