<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-id icon-gradient bg-tempting-azure"></i>
                </div>
                <div>Data Sales / Pegawai
                    <div class="page-title-subheading">Daftar seluruh sales/pegawai.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= site_url('mastersales/create') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Sales / Pegawai
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
    <div class="main-card mb-3 card shadow-sm border-0">
        <div class="card-body p-4">
            <form method="get" action="" class="mb-3 d-flex" style="gap:10px;">
                <input type="text" name="search" class="form-control" placeholder="Cari nama/kode/alamat..." value="<?= esc($_GET['search'] ?? '') ?>">
                <button type="submit" class="btn btn-info">Cari</button>
            </form>
            <div class="table-responsive table-masterbarang-responsive" style="max-width:100vw;overflow-x:auto;">
            <table class="table table-hover table-striped table-bordered table-sm align-middle" style="font-size:0.95em; margin-bottom:0;">
                <thead>
                    <tr>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Tempat Lahir</th>
                        <th class="text-center">No HP</th>
                        <th class="text-center">No KTP</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sales as $row): ?>
                        <tr>
                            <td><?= esc($row['kode']) ?></td>
                            <td><?= esc($row['nama']) ?></td>
                            <td><?= esc($row['alamat']) ?></td>
                            <td><?= esc($row['tempat_lahir']) ?></td>
                            <td><?= esc($row['no_hp']) ?></td>
                            <td><?= esc($row['no_ktp']) ?></td>
                            <td><?= esc($row['status']) ?></td>
                            <td class="d-flex justify-content-center align-items-center" style="gap:3px; min-width:70px;">
                                <a href="<?= site_url('mastersales/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="<?= site_url('mastersales/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus sales ini?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($sales)): ?>
                        <tr><td colspan="8" class="text-center">Belum ada data</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            </div>
            <link rel="stylesheet" href="<?= base_url('assets/css/table-masterbarang-responsive.css') ?>">
        </div>
    </div>
<?= $this->endSection() ?>
