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
    <div class="main-card mb-3 card">
        <div class="card-body">
            <table style="width: 100%;" id="userTable" class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Kode KY</th>
                        <th>Username</th>
                        <th>Alamat</th>
                        <th>No KTP</th>
                        <th>Otoritas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= esc($user['kode_ky']) ?></td>
                            <td><?= esc($user['username']) ?></td>
                            <td><?= esc($user['alamat']) ?></td>
                            <td><?= esc($user['noktp']) ?></td>
                            <td>
                                <?php if ($user['otoritas'] === 'T'): ?>
                                    <span class="badge badge-success">Sudah Otorisasi</span>
                                <?php else: ?>
                                    <span class="badge badge-secondary">Belum Otorisasi</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= site_url('user/edit/' . $user['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?= site_url('user/delete/' . $user['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection() ?>
