<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-calendar"></i>
            </div>
            <div>Batas Tanggal Sistem
                <div class="page-title-subheading">Atur batas tanggal transaksi penjualan.</div>
            </div>
        </div>
    </div>
</div>
<?php if (session('success')): ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?= session('success') ?>
    </div>
<?php endif; ?>
<div class="main-card mb-3 card">
    <div class="card-body">
        <form action="<?= site_url('batas-tanggal/update') ?>" method="post">
            <input type="hidden" name="id" value="<?= esc($batas['id'] ?? '') ?>">
            <div class="form-group">
                <label for="menu">Menu</label>
                <select name="menu" id="menu" class="form-control" required>
                    <option value="">-- Pilih Menu --</option>
                    <option value="penjualan" <?= ($batas['menu'] ?? '') == 'penjualan' ? 'selected' : '' ?>>Penjualan</option>
                    <option value="pembelian" <?= ($batas['menu'] ?? '') == 'pembelian' ? 'selected' : '' ?>>Pembelian</option>
                    <option value="jurnal" <?= ($batas['menu'] ?? '') == 'jurnal' ? 'selected' : '' ?>>Jurnal</option>
                    <!-- Tambahkan menu lain sesuai kebutuhan -->
                </select>
            </div>
            <div class="form-group">
                <label for="batas_tanggal">Tanggal Batas</label>
                <input type="date" name="batas_tanggal" id="batas_tanggal" class="form-control" value="<?= esc($batas['batas_tanggal'] ?? date('Y-m-d')) ?>" required>
            </div>
            <div class="form-group">
                <label for="mode">Mode</label>
                <select name="mode" id="mode" class="form-control">
                    <option value="manual" <?= ($batas['mode'] ?? '') == 'manual' ? 'selected' : '' ?>>Manual</option>
                    <option value="automatic" <?= ($batas['mode'] ?? '') == 'automatic' ? 'selected' : '' ?>>Automatic (H-2)</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
