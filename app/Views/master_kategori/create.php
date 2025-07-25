<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<style>
    .kategori-modern-header {
        display: flex;
        align-items: center;
        gap: 18px;
        margin-bottom: 18px;
    }

    .kategori-modern-icon {
        background: #fff;
        width: 54px;
        height: 54px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        box-shadow: 0 2px 8px 0 rgba(30, 41, 59, 0.10);
    }

    .kategori-modern-title {
        font-size: 1.5rem;
        font-weight: 700;
        letter-spacing: 0.2px;
        color: #1e293b;
    }

    .kategori-modern-subtitle {
        font-size: 1.05rem;
        color: #64748b;
        margin-top: 2px;
    }

    .kategori-modern-form {
        background: #fff;
        border-radius: 22px;
        box-shadow: 0 4px 32px 0 rgba(30, 41, 59, 0.10);
        padding: 36px 32px 28px 32px;
        max-width: 430px;
        margin: 0 auto;
    }

    .kategori-modern-form label {
        font-weight: 600;
        margin-bottom: 6px;
        color: #1e293b;
        display: block;
        text-align: left;
    }

    .kategori-modern-form .form-control {
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

    .kategori-modern-form .form-control:focus {
        border-color: #1976d2;
        background: #fff;
    }

    .kategori-modern-form .btn-modern {
        min-width: 140px;
        font-weight: 600;
        font-size: 1.08rem;
        border-radius: 10px;
        padding: 10px 0;
        margin-top: 10px;
        box-shadow: 0 2px 8px 0 rgba(30, 41, 59, 0.08);
        transition: background 0.2s, box-shadow 0.2s;
        display: inline-block;
        text-align: center;
    }

    .kategori-modern-form .btn-modern.btn-primary-modern {
        background: linear-gradient(90deg, #4fc3f7 0%, #1976d2 100%);
        color: #fff;
    }

    .kategori-modern-form .btn-modern.btn-primary-modern:hover {
        background: linear-gradient(90deg, #1976d2 0%, #4fc3f7 100%);
        color: #fff;
    }

    .kategori-modern-form .btn-modern.btn-secondary {
        background: #e3e8f0;
        color: #1976d2;
        margin-left: 10px;
    }

    .kategori-modern-form .btn-modern.btn-secondary:hover {
        background: #b3e5fc;
        color: #1976d2;
    }
</style>

<div class="container py-5">
    <div class="kategori-modern-form">
        <div class="kategori-modern-header">
            <div class="kategori-modern-icon">
                <img src="<?= base_url('assets/icon/svgs/solid/plus.svg') ?>" alt="Tambah" style="width:2.2rem;height:2.2rem;display:block;filter:drop-shadow(0 1px 2px #1976d233);color:#fff;">
            </div>
            <div>
                <div class="kategori-modern-title">Tambah Kategori</div>
                <div class="kategori-modern-subtitle">Form untuk menambah data kategori baru.</div>
            </div>
        </div>
        <?php if (session('success')): ?>
            <div class="modern-success-notif animate__animated animate__fadeInDown" style="background:linear-gradient(90deg,#22c55e 0%,#16a34a 100%);color:#fff;padding:18px 28px 18px 56px;border-radius:16px;box-shadow:0 4px 24px 0 rgba(30,41,59,0.13);position:relative;display:flex;align-items:center;gap:16px;font-size:1.08rem;margin-bottom:28px;">
                <span style="position:absolute;left:22px;font-size:1.4rem;top:18px;"><img src='<?= base_url('assets/icon/svgs/solid/check.svg') ?>' alt='Sukses' style='width:1.4rem;'></span>
                <span style="font-weight:600;letter-spacing:0.1px;flex:1;line-height:1.4;"><?= session('success') ?></span>
                <button type="button" onclick="this.parentElement.style.display='none'" style="background:none;border:none;color:#fff;font-size:1.3rem;cursor:pointer;line-height:1;">&times;</button>
            </div>
        <?php endif; ?>
        <form action="<?= site_url('masterkategori/store') ?>" method="post" autocomplete="off">
            <div class="mb-3">
                <label for="kode_cat">Kode Kategori</label>
                <input type="text" name="kode_cat" id="kode_cat" class="form-control" required maxlength="4" pattern="[A-Za-z0-9]{1,4}" title="Maksimal 4 karakter huruf/angka">
            </div>
            <div class="mb-3">
                <label for="name">Nama Kategori</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description">Deskripsi</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>
            <div class="text-center w-100 mt-3">
                <button type="submit" class="btn-modern btn-primary-modern px-5 py-2" style="font-size:1.08rem;min-width:140px;">Simpan</button>
                <a href="<?= site_url('masterkategori') ?>" class="btn-modern btn-secondary px-5 py-2" style="font-size:1.08rem;min-width:140px;">Batal</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>