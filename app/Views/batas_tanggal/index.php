<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<style>
    body {
        background: #f6f8fa;
    }

    .batas-tanggal-modern-header {
        display: flex;
        align-items: center;
        gap: 18px;
        margin-bottom: 18px;
    }

    .batas-tanggal-modern-icon {

        color: #fff;
        width: 54px;
        height: 54px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        font-size: 2.2rem;
        box-shadow: 0 2px 8px 0 rgba(30, 41, 59, 0.10);
    }

    .batas-tanggal-modern-title {
        font-size: 1.5rem;
        font-weight: 700;
        letter-spacing: 0.2px;
        color: #1e293b;
    }

    .batas-tanggal-modern-subtitle {
        font-size: 1.05rem;
        color: #64748b;
        margin-top: 2px;
    }

    .batas-tanggal-modern-form {
        background: #fff;
        border-radius: 22px;
        box-shadow: 0 4px 32px 0 rgba(30, 41, 59, 0.10);
        padding: 36px 32px 28px 32px;
        max-width: 430px;
        margin: 0 auto;
    }

    .batas-tanggal-modern-form label {
        font-weight: 600;
        margin-bottom: 6px;
        color: #1e293b;
        display: block;
        text-align: left;
    }

    .batas-tanggal-modern-form .form-control,
    .batas-tanggal-modern-form .form-select {
        border-radius: 12px;
        font-size: 1.08rem;
        padding: 10px 14px;
        border: 1.5px solid #e2e8f0;
        background: #f8fafc;
        box-shadow: none;
        margin-bottom: 22px;
        transition: border-color 0.2s;
        width: 100%;
        display: block;
        box-sizing: border-box;
    }

    .batas-tanggal-modern-form input[type="text"]#batas_tanggal {
        padding: 10px 14px !important;
        box-sizing: border-box;
    }

    .batas-tanggal-modern-form .form-control:focus,
    .batas-tanggal-modern-form .form-select:focus {
        border-color: #1976d2;
        background: #fff;
    }

    .batas-tanggal-modern-form .form-check-input[type="radio"] {
        accent-color: #1976d2;
        width: 18px;
        height: 18px;
        margin-right: 7px;
        margin-top: 0;
        vertical-align: middle;
    }

    .batas-tanggal-modern-form .radio-group {
        display: flex;
        gap: 32px;
        margin-bottom: 22px;
        align-items: center;
    }

    .batas-tanggal-modern-form .btn-primary {
        min-width: 140px;
        font-weight: 600;
        font-size: 1.08rem;
        border-radius: 10px;
        padding: 10px 0;
        margin-top: 10px;
        box-shadow: 0 2px 8px 0 rgba(30, 41, 59, 0.08);
        transition: background 0.2s, box-shadow 0.2s;
    }

    .batas-tanggal-modern-form .btn-primary:hover {
        background: #155fa0;
        box-shadow: 0 4px 16px 0 rgba(30, 41, 59, 0.13);
    }
</style>

<div class="container py-5">
    <div class="batas-tanggal-modern-form">
        <div class="batas-tanggal-modern-header">
            <div class="batas-tanggal-modern-icon" style="box-shadow:0 2px 8px 0 rgba(30,41,59,0.10);">
                <img src="<?= base_url('assets/icon/svgs/solid/calendar-check.svg') ?>" alt="Calendar" style="width:2.2rem;height:2.2rem;display:block;filter:drop-shadow(0 1px 2px #1976d233);color:#1976d2;">
            </div>
            <div>
                <div class="batas-tanggal-modern-title">Batas Tanggal Sistem</div>
                <div class="batas-tanggal-modern-subtitle">Atur batas tanggal transaksi penjualan.</div>
            </div>
        </div>
        <?php if (session('success')): ?>
            <div class="modern-success-notif animate__animated animate__fadeInDown" style="background:linear-gradient(90deg,#22c55e 0%,#16a34a 100%);color:#fff;padding:18px 28px 18px 56px;border-radius:16px;box-shadow:0 4px 24px 0 rgba(30,41,59,0.13);position:relative;display:flex;align-items:center;gap:16px;font-size:1.08rem;margin-bottom:28px;">
                <span style="position:absolute;left:22px;font-size:1.4rem;top:18px;"><i class="fa fa-check-circle"></i></span>
                <span style="font-weight:600;letter-spacing:0.1px;flex:1;line-height:1.4;"><?= session('success') ?></span>
                <button type="button" onclick="this.parentElement.style.display='none'" style="background:none;border:none;color:#fff;font-size:1.3rem;cursor:pointer;line-height:1;">&times;</button>
            </div>
        <?php endif; ?>
        <form action="<?= site_url('batas-tanggal/update') ?>" method="post" autocomplete="off">
            <input type="hidden" name="id" value="<?= esc($batas['id'] ?? '') ?>">
            <div class="mb-3">
                <label for="menu">Menu</label>
                <select name="menu" id="menu" class="form-select" required>
                    <option value="">-- Pilih Menu --</option>
                    <option value="penjualan" <?= ($batas['menu'] ?? '') == 'penjualan' ? 'selected' : '' ?>>Penjualan</option>
                    <option value="pembelian" <?= ($batas['menu'] ?? '') == 'pembelian' ? 'selected' : '' ?>>Pembelian</option>
                    <option value="jurnal" <?= ($batas['menu'] ?? '') == 'jurnal' ? 'selected' : '' ?>>Jurnal</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Mode</label>
                <div id="modeRadioGroup" class="radio-group">
                    <label class="form-check-label d-flex align-items-center gap-2 mb-0">
                        <input class="form-check-input" type="radio" name="mode" id="modeManual" value="manual" <?= ($batas['mode_batas_tanggal'] ?? '') == 'manual' ? 'checked' : '' ?>> Manual
                    </label>
                    <label class="form-check-label d-flex align-items-center gap-2 mb-0">
                        <input class="form-check-input" type="radio" name="mode" id="modeAutomatic" value="automatic" <?= ($batas['mode_batas_tanggal'] ?? '') == 'automatic' ? 'checked' : '' ?>> Automatic (H-2)
                    </label>
                </div>
            </div>
            <div class="mb-3" id="tanggalBatasGroup" style="display:<?= ($batas['mode_batas_tanggal'] ?? '') == 'manual' ? 'block' : 'none' ?>;">
                <label for="batas_tanggal">Tanggal Batas</label>
                <input type="text" name="batas_tanggal" id="batas_tanggal" class="form-control" value="<?= isset($batas['batas_tanggal']) ? date('d/m/Y', strtotime($batas['batas_tanggal'])) : date('d/m/Y') ?>" required placeholder="Pilih tanggal">
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
            <div class="text-center w-100 mt-3">
                <button type="submit" class="btn-modern btn-primary-modern px-5 py-2" style="font-size:1.08rem;min-width:140px;display:inline-block;text-align:center;">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>