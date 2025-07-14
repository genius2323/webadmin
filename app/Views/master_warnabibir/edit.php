<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <h4 class="mb-4">Edit Warna Bibir</h4>
    <form action="<?= base_url('masterwarnabibir/update/'.$warnabibir['id']) ?>" method="post">
        <div class="form-group">
            <label for="name">Nama Warna Bibir</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= esc($warnabibir['name']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?= base_url('masterwarnabibir') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
<?= $this->endSection(); ?>
