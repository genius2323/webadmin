<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="page-header-modern">
    <div>
        <h2 class="page-title">Data Sales / Pegawai</h2>
        <div class="page-subtitle">Daftar seluruh sales/pegawai.</div>
    </div>
    <a href="<?= site_url('mastersales/create') ?>" class="btn-modern btn-primary-modern">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24">
            <path d="M12 5v14m7-7H5" stroke="#fff" stroke-width="2" stroke-linecap="round" />
        </svg> Tambah Sales / Pegawai
    </a>
</div>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert-modern alert-success-modern">
        <?= esc(session()->getFlashdata('success')) ?>
        <button type="button" class="close-alert" onclick="this.parentElement.style.display='none'">&times;</button>
    </div>
<?php endif; ?>
<div class="card-modern">
    <form method="get" action="" class="d-flex" style="gap:10px; margin-bottom:1.5rem;">
        <input type="text" name="search" class="form-control-modern" placeholder="Cari nama/kode/alamat..." value="<?= esc($_GET['search'] ?? '') ?>">
        <button type="submit" class="btn-modern btn-info-modern">Cari</button>
    </form>
    <div class="table-responsive-modern">
        <table class="table-modern">
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
                        <td class="text-center"><?= esc($row['kode']) ?></td>
                        <td class="text-center"><?= esc($row['nama']) ?></td>
                        <td class="text-center"><?= esc($row['alamat']) ?></td>
                        <td class="text-center"><?= esc($row['tempat_lahir']) ?></td>
                        <td class="text-center"><?= esc($row['no_hp']) ?></td>
                        <td class="text-center"><?= esc($row['no_ktp']) ?></td>
                        <td class="text-center"><?= esc($row['status']) ?></td>
                        <td style="min-width:70px;display:flex;gap:6px;justify-content:center;align-items:center;">
                            <a href="<?= site_url('mastersales/edit/' . $row['id']) ?>" class="btn-modern btn-warning-modern" title="Edit">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
                                    <path d="M4 21h17" stroke="#fff" stroke-width="2" stroke-linecap="round" />
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L7 20.5 2 22l1.5-5L18.5 2.5Z" stroke="#fff" stroke-width="2" />
                                </svg>
                            </a>
                            <a href="<?= site_url('mastersales/delete/' . $row['id']) ?>" class="btn-modern btn-danger-modern" title="Hapus" onclick="return confirm('Yakin ingin menghapus sales ini?')">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
                                    <path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m2 0v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6h14z" stroke="#fff" stroke-width="2" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($sales)): ?>
                    <tr>
                        <td colspan="8" class="text-center">Belum ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>