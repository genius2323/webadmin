<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-edit"></i>
            </div>
            <div>Edit Merk
                <div class="page-title-subheading">Form untuk mengedit data merk.</div>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <form action="<?= site_url('mastermerk/update/' . $merk['id']) ?>" method="post">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="<?= esc($merk['name']) ?>" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="description" class="form-control" value="<?= esc($merk['description'] ?? '') ?>">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
            <a href="<?= site_url('mastermerk') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
