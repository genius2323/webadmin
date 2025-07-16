<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-users"></i>
            </div>
            <div>Edit Customer
                <div class="page-title-subheading">Form untuk mengedit data customer.</div>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <form action="<?= site_url('mastercustomer/update/' . $customer['id']) ?>" method="post">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Kode Customer</label>
                    <input type="text" name="kode_customer" class="form-control" value="<?= esc($customer['kode_customer']) ?>" required>
                </div>
                <div class="form-group col-md-8">
                    <label>Nama Customer</label>
                    <input type="text" name="nama_customer" class="form-control" value="<?= esc($customer['nama_customer']) ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?= esc($customer['alamat']) ?>">
                </div>
                <div class="form-group col-md-4">
                    <label>Contact Person</label>
                    <input type="text" name="contact_person" class="form-control" value="<?= esc($customer['contact_person']) ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Kota</label>
                    <input type="text" name="kota" class="form-control" value="<?= esc($customer['kota']) ?>">
                </div>
                <div class="form-group col-md-4">
                    <label>Provinsi</label>
                    <input type="text" name="provinsi" class="form-control" value="<?= esc($customer['provinsi']) ?>">
                </div>
                <div class="form-group col-md-4">
                    <label>Sales</label>
                    <input type="text" name="sales" class="form-control" value="<?= esc($customer['sales']) ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="<?= esc($customer['no_hp']) ?>">
                </div>
                <div class="form-group col-md-4">
                    <label>Batas Piutang</label>
                    <input type="number" name="batas_piutang" class="form-control" min="0" value="<?= esc($customer['batas_piutang']) ?>">
                </div>
            </div>
            <div class="card mt-4 mb-3">
                <div class="card-header bg-light font-weight-bold">Data NPWP</div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>NPWP (Nomor)</label>
                            <div style="display:flex;gap:2px;max-width:420px;align-items:center;">
                                <?php
                                    $npwpNomor = str_pad(preg_replace('/[^0-9]/', '', $customer['npwp_nomor'] ?? ''), 15, ' ', STR_PAD_RIGHT);
                                    for($i=0;$i<15;$i++):
                                        if($i>0) {
                                            if($i==2||$i==5||$i==8) echo '<span style=\'font-weight:bold;\'>.</span>';
                                            if($i==9) echo '<span style=\'font-weight:bold;\'>-</span>';
                                            if($i==12) echo '<span style=\'font-weight:bold;\'>.</span>';
                                        }
                                ?>
                                    <input type="text" name="npwp_nomor[]" maxlength="1" pattern="[0-9]" class="form-control text-center" style="width:2.2em;display:inline-block;padding:2px 4px;" autocomplete="off" value="<?= esc($npwpNomor[$i]) ?>">
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                            <label>NPWP (Atas Nama)</label>
                            <input type="text" name="npwp_atas_nama" class="form-control" value="<?= esc($customer['npwp_atas_nama']) ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>NPWP (Alamat)</label>
                            <input type="text" name="npwp_alamat" class="form-control" value="<?= esc($customer['npwp_alamat']) ?>">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="<?= site_url('mastercustomer') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const npwpInputs = document.querySelectorAll('input[name="npwp_nomor[]"]');
  npwpInputs.forEach((input, idx) => {
    input.addEventListener('input', function(e) {
      // Hanya izinkan 1 digit
      let val = this.value.replace(/[^0-9]/g, '');
      if (val.length > 1) val = val.slice(-1); // ambil digit terakhir jika paste
      this.value = val;
      if (val.length === 1 && idx < npwpInputs.length - 1) {
        setTimeout(() => {
          npwpInputs[idx + 1].focus();
          npwpInputs[idx + 1].select();
        }, 0);
      }
    });
    input.addEventListener('keydown', function(e) {
      if ((e.key === 'Backspace' || e.key === 'ArrowLeft') && this.value === '' && idx > 0) {
        setTimeout(() => {
          npwpInputs[idx - 1].focus();
          npwpInputs[idx - 1].select();
        }, 0);
        e.preventDefault();
      }
      if (e.key === 'ArrowRight' && idx < npwpInputs.length - 1) {
        setTimeout(() => {
          npwpInputs[idx + 1].focus();
          npwpInputs[idx + 1].select();
        }, 0);
        e.preventDefault();
      }
    });
    input.addEventListener('paste', function(e) {
      const paste = (e.clipboardData || window.clipboardData).getData('text').replace(/[^0-9]/g, '');
      if (paste.length > 0) {
        e.preventDefault();
        for (let i = 0; i < paste.length && (idx + i) < npwpInputs.length; i++) {
          npwpInputs[idx + i].value = paste[i];
        }
        const nextIdx = Math.min(idx + paste.length, npwpInputs.length - 1);
        setTimeout(() => {
          npwpInputs[nextIdx].focus();
          npwpInputs[nextIdx].select();
        }, 0);
      }
    });
  });
});
</script>
<?= $this->endSection(); ?>
