<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="page-header-modern">
    <div>
        <h2 class="page-title">Master Gondola</h2>
        <div class="page-subtitle">Daftar seluruh data gondola.</div>
    </div>
    <a href="<?= site_url('mastergondola/create') ?>" class="btn-modern btn-primary-modern">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24">
            <path d="M12 5v14m7-7H5" stroke="#fff" stroke-width="2" stroke-linecap="round" />
        </svg> Tambah Gondola
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
        <input type="text" name="search" class="form-control-modern" placeholder="Cari nama..." value="<?= esc($_GET['search'] ?? '') ?>">
        <button type="submit" class="btn-modern btn-info-modern">Cari</button>
    </form>
    <div class="table-responsive-modern">
        <table class="table-modern">
            <thead>
                <tr>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Otoritas</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gondola as $row): ?>
                    <?php
                    $search = $_GET['search'] ?? '';
                    if ($search && stripos($row['name'], $search) === false) continue;
                    ?>
                    <tr>
                        <td class="text-center"><?= esc($row['name']) ?></td>
                        <td class="text-center"><?= esc($row['description']) ?></td>
                        <td class="text-center">
                            <?php if ($row['otoritas'] === 'T'): ?>
                                <span class="badge-modern badge-success-modern">Sudah Otorisasi</span>
                            <?php else: ?>
                                <span class="badge-modern badge-secondary-modern">Belum Otorisasi</span>
                            <?php endif; ?>
                        </td>
                        <td style="min-width:70px;display:flex;gap:6px;justify-content:center;align-items:center;">
                            <a href="<?= site_url('mastergondola/edit/' . $row['id']) ?>" class="btn-modern btn-warning-modern" title="Edit"
                                <?php if (empty($row['otoritas']) || $row['otoritas'] !== 'T'): ?>disabled style="pointer-events:none;opacity:0.6;" <?php endif; ?>>
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
                                    <path d="M4 21h17" stroke="#fff" stroke-width="2" stroke-linecap="round" />
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L7 20.5 2 22l1.5-5L18.5 2.5Z" stroke="#fff" stroke-width="2" />
                                </svg>
                            </a>
                            <a href="<?= site_url('mastergondola/delete/' . $row['id']) ?>" class="btn-modern btn-danger-modern" title="Hapus"
                                <?php if (empty($row['otoritas']) || $row['otoritas'] !== 'T'): ?>disabled style="pointer-events:none;opacity:0.6;" <?php endif; ?>
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
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
<?= $this->endSection(); ?>