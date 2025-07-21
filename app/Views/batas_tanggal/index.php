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
                <label for="mode">Mode</label>
                <div id="modeRadioGroup" class="d-flex" style="gap: 10px;">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="mode" id="modeManual" value="manual" <?= ($batas['mode_batas_tanggal'] ?? '') == 'manual' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="modeManual">Manual</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="mode" id="modeAutomatic" value="automatic" <?= ($batas['mode_batas_tanggal'] ?? '') == 'automatic' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="modeAutomatic">Automatic (H-2)</label>
                    </div>
                </div>
            </div>
            <div class="form-group" id="tanggalBatasGroup" style="display:<?= ($batas['mode_batas_tanggal'] ?? '') == 'manual' ? 'block' : 'none' ?>;">
                <label for="batas_tanggal">Tanggal Batas</label>
                <input type="text" name="batas_tanggal" id="batas_tanggal" class="form-control" style="background:#f8f9fa; cursor:pointer; color:#212529;" value="<?= isset($batas['batas_tanggal']) ? date('d/m/Y', strtotime($batas['batas_tanggal'])) : date('d/m/Y') ?>" required placeholder="<?= isset($batas['batas_tanggal']) ? date('d/m/Y', strtotime($batas['batas_tanggal'])) : date('d/m/Y') ?>">
            </div>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    flatpickr('#batas_tanggal', {
                        dateFormat: 'd/m/Y',
                        disableMobile: true,
                        allowInput: false
                    });
                    const modeManual = document.getElementById('modeManual');
                    const modeAutomatic = document.getElementById('modeAutomatic');
                    const tanggalBatasGroup = document.getElementById('tanggalBatasGroup');
                    modeManual.addEventListener('change', function() {
                        if (this.checked) tanggalBatasGroup.style.display = 'block';
                    });
                    modeAutomatic.addEventListener('change', function() {
                        if (this.checked) tanggalBatasGroup.style.display = 'none';
                    });
                });
            </script>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
