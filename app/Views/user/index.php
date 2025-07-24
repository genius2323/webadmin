<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="page-header-modern">
    <div>
        <h2 class="page-title">Data User</h2>
        <div class="page-subtitle">Daftar seluruh user aplikasi.</div>
    </div>
    <a href="<?= site_url('user/create') ?>" class="btn-modern btn-primary-modern">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24">
            <path d="M12 5v14m7-7H5" stroke="#fff" stroke-width="2" stroke-linecap="round" />
        </svg> Tambah User
    </a>
</div>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert-modern alert-success-modern">
        <?= esc(session()->getFlashdata('success')) ?>
        <button type="button" class="close-alert" onclick="this.parentElement.style.display='none'">&times;</button>
    </div>
<?php endif; ?>
<div class="card-modern">
    <div class="table-responsive-modern">
        <table class="table-modern">
            <thead>
                <tr>
                    <th>Nama</th>
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
                        <td><?= esc($user['nama']) ?></td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['alamat']) ?></td>
                        <td><?= esc($user['noktp']) ?></td>
                        <td>
                            <?php if ($user['otoritas'] === 'T'): ?>
                                <span class="badge-modern badge-success-modern">Sudah Otorisasi</span>
                            <?php else: ?>
                                <span class="badge-modern badge-secondary-modern">Belum Otorisasi</span>
                            <?php endif; ?>
                        </td>
                        <td style="min-width:70px;display:flex;gap:6px;justify-content:center;align-items:center;">
                            <a href="<?= site_url('user/edit/' . $user['id']) ?>" class="btn-modern btn-warning-modern" title="Edit"
                                <?php if (empty($user['otoritas']) || $user['otoritas'] !== 'T'): ?>disabled style="pointer-events:none;opacity:0.6;" <?php endif; ?>>
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
                                    <path d="M4 21h17" stroke="#fff" stroke-width="2" stroke-linecap="round" />
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L7 20.5 2 22l1.5-5L18.5 2.5Z" stroke="#fff" stroke-width="2" />
                                </svg>
                            </a>
                            <a href="<?= site_url('user/delete/' . $user['id']) ?>" class="btn-modern btn-danger-modern" title="Hapus"
                                <?php if (empty($user['otoritas']) || $user['otoritas'] !== 'T'): ?>disabled style="pointer-events:none;opacity:0.6;" <?php endif; ?>
                                onclick="return confirm('Yakin ingin menghapus user ini?')">
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
    .page-header-modern {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
        gap: 1.5rem;
    }

    .page-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0;
        color: #232946;
    }

    .page-subtitle {
        font-size: 1.02rem;
        color: #6c7a89;
        margin-top: 0.2rem;
    }

    .btn-modern {
        display: inline-flex;
        align-items: center;
        gap: 0.5em;
        font-size: 1em;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        padding: 0.55em 1.2em;
        cursor: pointer;
        transition: background 0.18s, color 0.18s;
        text-decoration: none;
    }

    .btn-primary-modern {
        background: linear-gradient(90deg, #4fc3f7 0%, #232946 100%);
        color: #fff;
    }

    .btn-primary-modern:hover {
        background: #232946;
        color: #4fc3f7;
    }

    .btn-warning-modern {
        background: #f7b731;
        color: #fff;
    }

    .btn-warning-modern:hover {
        background: #f5a623;
        color: #fff;
    }

    .btn-danger-modern {
        background: #e74c3c;
        color: #fff;
    }

    .btn-danger-modern:hover {
        background: #c0392b;
        color: #fff;
    }

    .alert-modern {
        padding: 1em 1.5em;
        border-radius: 8px;
        margin-bottom: 1.5em;
        font-size: 1em;
        position: relative;
        box-shadow: 0 2px 8px 0 rgba(44, 62, 80, 0.07);
    }

    .alert-success-modern {
        background: #eafaf1;
        color: #27ae60;
    }

    .close-alert {
        position: absolute;
        top: 0.7em;
        right: 1em;
        background: none;
        border: none;
        font-size: 1.3em;
        color: #aaa;
        cursor: pointer;
    }

    .card-modern {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 2px 16px 0 rgba(44, 62, 80, 0.08);
        padding: 2rem 2rem 1.5rem 2rem;
        margin-bottom: 2rem;
        min-height: 60vh;
        transition: box-shadow 0.2s;
    }

    .table-responsive-modern {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .table-modern {
        width: 100%;
        min-width: 600px;
        border-collapse: collapse;
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        font-size: 1em;
    }

    .table-modern th,
    .table-modern td {
        padding: 0.85em 1em;
        text-align: left;
        border-bottom: 1px solid #e9edf5;
    }

    .table-modern th {
        background: #f4f7fa;
        color: #232946;
        font-weight: 700;
    }

    .table-modern tr:last-child td {
        border-bottom: none;
    }

    .badge-modern {
        display: inline-block;
        padding: 0.35em 0.8em;
        border-radius: 8px;
        font-size: 0.97em;
        font-weight: 600;
    }

    .badge-success-modern {
        background: #eafaf1;
        color: #27ae60;
    }

    .badge-secondary-modern {
        background: #e9edf5;
        color: #232946;
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
<?= $this->endSection() ?>