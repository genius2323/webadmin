
<form action="<?= base_url('penjualan/create') ?>" method="post" autocomplete="off">
    <div class="mb-3">
        <label for="nomor_nota" class="form-label">Nomor Nota</label>
        <input type="text" name="nomor_nota" id="nomor_nota" class="form-control" value="<?= isset($nomor_nota) ? $nomor_nota : '-' ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="tanggal_nota" class="form-label">Tanggal Nota</label>
        <input type="text" name="tanggal_nota" id="tanggal_nota" class="form-control" value="<?= isset($tanggal_nota) ? $tanggal_nota : date('d/m/Y') ?>" required readonly>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
