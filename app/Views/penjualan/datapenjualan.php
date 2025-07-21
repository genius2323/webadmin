<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div>Data Penjualan
                <div class="page-title-subheading">Daftar seluruh transaksi penjualan.</div>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <div class="mb-3">
            <a href="<?= site_url('penjualan') ?>" class="btn btn-success">
                <i class="fa fa-plus"></i> Buat Nota Baru
            </a>
        </div>
        <form method="get" action="" class="mb-3 d-flex" style="gap:10px;">
            <input type="text" name="search" class="form-control" placeholder="Cari nomor nota/customer/sales..." value="<?= esc($_GET['search'] ?? '') ?>">
            <button type="submit" class="btn btn-info">Cari</button>
        </form>
        <div class="table-responsive-custom">
            <table class="table table-hover table-striped table-bordered table-sm" style="font-size:0.95em;">
            <thead>
                <tr>
                    <th class="text-center">Nomor Nota</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Customer</th>
                    <th class="text-center">Sales</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penjualan as $row): ?>
                <?php
                    $search = $_GET['search'] ?? '';
                    if ($search && stripos($row['nomor_nota'] . $row['customer'] . $row['sales'], $search) === false) continue;
                ?>
                <tr>
                    <td><?= esc($row['nomor_nota']) ?></td>
                    <td><?= esc(date('d/m/Y', strtotime($row['tanggal_nota']))) ?></td>
                    <td><?= esc($row['customer']) ?></td>
                    <td><?= esc($row['sales']) ?></td>
                    <td class="text-right" style="white-space: nowrap !important;">Rp <?= number_format($row['grand_total'],0,',','.') ?></td>
                    <td class="text-center"><span class="badge badge-<?= $row['status']=='completed'?'success':'secondary' ?>"><?= esc(ucfirst($row['status'])) ?></span></td>
                    <td class="align-items-center text-center" style="gap:3px; min-width:120px;">
                        <a href="<?= site_url('penjualan/detail/' . $row['id']) ?>" class="btn btn-sm btn-info" title="Detail">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="<?= site_url('penjualan/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="<?= site_url('penjualan/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini? Data akan dihapus (soft delete) di dua database.')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <link rel="stylesheet" href="<?= base_url('assets/css/table-responsive-custom.css') ?>">
    </div>
</div>
<?= $this->endSection(); ?>
