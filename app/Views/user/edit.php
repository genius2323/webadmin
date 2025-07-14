<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-id icon-gradient bg-tempting-azure"></i>
            </div>
            <div>Edit User
                <div class="page-title-subheading">Form untuk mengedit data user dan departemen.</div>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <form action="<?= site_url('user/update/' . $user['id']) ?>" method="post">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= esc($user['nama']) ?>" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?= esc($user['username']) ?>" required>
            </div>
            <div class="form-group">
                <label>Password (isi jika ingin ganti)</label>
                <input type="password" name="password" class="form-control">
            </div>           
            <div class="form-group">
                <label>No KTP</label>
                <input type="text" name="noktp" class="form-control" value="<?= esc($user['noktp']) ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?= esc($user['alamat']) ?>" required>
            </div>
            <div class="form-group">
                <label>Pilih Departemen</label>
                <div class="d-flex flex-wrap">
                    <?php foreach ($departments as $dept): ?>
                        <div class="custom-control custom-switch mr-3 mb-2">
                            <input type="checkbox" class="custom-control-input" id="dept<?= $dept['id'] ?>" name="departments[]" value="<?= $dept['id'] ?>" <?= in_array($dept['id'], $userDepartments) ? 'checked' : '' ?>>
                            <label class="custom-control-label" for="dept<?= $dept['id'] ?>"><?= esc(isset($dept['nama']) ? $dept['nama'] : $dept['name']) ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <small class="form-text text-muted">Pilih satu atau lebih departemen dengan tombol on/off.</small>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                <a href="<?= site_url('user') ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
