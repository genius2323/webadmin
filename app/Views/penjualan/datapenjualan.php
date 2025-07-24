<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="page-header-modern">
    <div>
        <h2 class="page-title">Data Penjualan</h2>
        <div class="page-subtitle">Daftar seluruh transaksi penjualan.</div>
    </div>
    <a href="<?= site_url('penjualan') ?>" class="btn-modern btn-primary-modern">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24">
            <path d="M12 5v14m7-7H5" stroke="#fff" stroke-width="2" stroke-linecap="round" />
        </svg> Buat Nota Baru
    </a>
</div>
<div class="card-modern">
    <form method="get" action="" class="form-search-modern">
        <input type="text" name="search" class="input-modern" placeholder="Cari nomor nota/customer/sales..." value="<?= esc($_GET['search'] ?? '') ?>">
        <button type="submit" class="btn-modern btn-info-modern">Cari</button>
    </form>
    <div class="table-responsive-modern">
        <table class="table-modern">
            <thead>
                <tr>
                    <th>Nomor Nota</th>
                    <th>Tanggal</th>
                    <th>Customer</th>
                    <th>Sales</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penjualan as $row): ?>
                    <?php
                    $search = $_GET['search'] ?? '';
                    if ($search && stripos($row['nomor_nota'] . $row['customer'] . $row['sales'], $search) === false) continue;
                    ?>
                    <tr>
                        <td style="white-space: nowrap !important;"><?= esc($row['nomor_nota']) ?></td>
                        <td style="white-space: nowrap !important;"><?= esc(date('d/m/Y', strtotime($row['tanggal_nota']))) ?></td>
                        <td style="white-space: nowrap !important;"><?= esc($row['customer']) ?></td>
                        <td style="white-space: nowrap !important;"><?= esc($row['sales']) ?></td>
                        <td style="white-space: nowrap !important;">Rp <?= number_format($row['grand_total'], 0, ',', '.') ?></td>
                        <td><span class="badge-modern <?= $row['status'] == 'completed' ? 'badge-success-modern' : 'badge-secondary-modern' ?>"><?= esc(ucfirst($row['status'])) ?></span></td>
                        <td style="min-width:120px;display:flex;gap:6px;justify-content:center;align-items:center;">
                            <a href="<?= site_url('penjualan/detail/' . $row['id']) ?>" class="btn-modern btn-info-modern" title="Detail">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" stroke="#fff" stroke-width="2" />
                                    <circle cx="12" cy="12" r="3" fill="#fff" />
                                </svg>
                            </a>
                            <a href="<?= site_url('penjualan/edit/' . $row['id']) ?>" class="btn-modern btn-warning-modern" title="Edit">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
                                    <path d="M4 21h17" stroke="#fff" stroke-width="2" stroke-linecap="round" />
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L7 20.5 2 22l1.5-5L18.5 2.5Z" stroke="#fff" stroke-width="2" />
                                </svg>
                            </a>
                            <a href="<?= site_url('penjualan/delete/' . $row['id']) ?>" class="btn-modern btn-danger-modern" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini? Data akan dihapus (soft delete) di dua database.')">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
                                    <path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m2 0v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6h14z" stroke="#fff" stroke-width="2" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<style>
    .form-search-modern {
        display: flex;
        gap: 1em;
        margin-bottom: 1.5em;
        flex-wrap: wrap;
    }

    .btn-info-modern {
        background: #4fc3f7;
        color: #fff;
    }

    .btn-info-modern:hover {
        background: #232946;
        color: #4fc3f7;
    }

    @media (max-width: 768px) {
        .table-modern {
            min-width: 500px;
        }

        .card-modern {
            padding: 1.2rem 0.7rem 1rem 0.7rem;
        }

        .main-content {
            padding: 1rem 0.2rem 1rem 0.2rem;
        }
    }
</style>
<?= $this->endSection(); ?>