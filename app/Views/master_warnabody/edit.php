<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <h4 class="mb-4">Edit Warna Body</h4>
    <form action="<?= base_url('masterwarnabody/update/'.$warnabody['id']) ?>" method="post">
        <div class="form-group">
            <label for="name">Nama Warna Body</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= esc($warnabody['name']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?= base_url('masterwarnabody') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
<?= $this->endSection(); ?>
