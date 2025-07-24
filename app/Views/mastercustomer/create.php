<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-users"></i>
            </div>
            <div>Tambah Customer
                <div class="page-title-subheading">Form untuk menambah data customer baru.</div>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card shadow-sm border-0">
    <div class="card-body p-4">
        <form action="<?= site_url('mastercustomer/save') ?>" method="post">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Kode Customer</label>
                    <input type="text" name="kode_customer" class="form-control" required>
                </div>
                <div class="form-group col-md-8">
                    <label>Nama Customer</label>
                    <input type="text" name="nama_customer" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Contact Person</label>
                    <input type="text" name="contact_person" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Kota</label>
                    <input type="text" name="kota" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Provinsi</label>
                    <input type="text" name="provinsi" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Sales</label>
                    <div class="input-group">
                        <input type="text" name="sales" id="salesInput" class="form-control" readonly>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalSales">Pilih Sales</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Batas Piutang</label>
                    <input type="number" name="batas_piutang" class="form-control" min="0" value="0">
                </div>
            </div>
            <div class="card mt-4 mb-3">
                <div class="card-header bg-light font-weight-bold">Data NPWP</div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Nomor</label>
                            <div class="npwp-nomor-group">
                                <?php
                                // Format: 12.345.678.9-003.000 (15 digit, 4 titik, 1 strip)
                                for($i=0;$i<15;$i++):
                                    if($i>0) {
                                        if($i==2||$i==5||$i==8) echo '<span>.</span>';
                                        if($i==9) echo '<span>-</span>';
                                        if($i==12) echo '<span>.</span>';
                                    }
                                ?>
                                    <input type="text" name="npwp_nomor[]" maxlength="1" pattern="[0-9]" class="form-control text-center" autocomplete="off">
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
</form>
<link rel="stylesheet" href="<?= base_url('assets/css/npwp-responsive.css') ?>">
                    <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                            <label>Atas Nama</label>
                            <input type="text" name="npwp_atas_nama" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Alamat</label>
                            <input type="text" name="npwp_alamat" class="form-control">
                        </div>                        
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
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

  // Modal Pilih Sales
  function loadSalesModal(keyword = '') {
    fetch('/salesapi?search=' + encodeURIComponent(keyword))
      .then(res => res.json())
      .then(data => {
        const tbody = document.querySelector('#tableSalesModal tbody');
        tbody.innerHTML = '';
        if (data.length === 0) {
          tbody.innerHTML = '<tr><td colspan="3" class="text-center">Tidak ada data</td></tr>';
        } else {
          data.forEach(row => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
              <td>${row.kode}</td>
              <td>${row.nama}</td>
              <td><button type="button" class="btn btn-success btn-sm pilih-sales-btn" data-kode="${row.kode}" data-nama="${row.nama}">Pilih</button></td>
            `;
            tbody.appendChild(tr);
          });
        }
      });
  }

  // Tampilkan data sales saat modal dibuka (Bootstrap 5 native)
  var modalSales = document.getElementById('modalSales');
  if (modalSales) {
    modalSales.addEventListener('show.bs.modal', function () {
      loadSalesModal();
      document.getElementById('searchSales').value = '';
    });
  }

  // Search sales di modal
  var searchSales = document.getElementById('searchSales');
  if (searchSales) {
    searchSales.addEventListener('input', function() {
      loadSalesModal(this.value);
    });
  }

  // Pilih sales dari modal
  document.body.addEventListener('click', function(e) {
    if (e.target.classList.contains('pilih-sales-btn')) {
      const kode = e.target.getAttribute('data-kode');
      const nama = e.target.getAttribute('data-nama');
      document.getElementById('salesInput').value = kode + ' - ' + nama;
      // Tutup modal dengan Bootstrap 5 API
      var modal = bootstrap.Modal.getInstance(document.getElementById('modalSales'));
      if (modal) {
        modal.hide();
      }
    }
  });
});
</script>



<!-- Modal Pilih Sales Bootstrap 5 -->
<style>
  /* Modal turun sedikit agar judul tidak tertutup header */
  .modal-dialog {
    margin-top: 70px;
  }
  @media (max-width: 576px) {
    .modal-dialog {
      margin-top: 30px;
    }
  }
</style>
<div class="modal fade" id="modalSales" tabindex="-1" aria-labelledby="modalSalesLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSalesLabel">Pilih Sales</h5>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="text" id="searchSales" class="form-control" placeholder="Cari Sales...">
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="tableSalesModal">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $salesModel = new \App\Models\MasterSalesModel();
                $sales = $salesModel->where('deleted_at', null)->findAll();
              ?>
              <?php foreach ($sales as $row): ?>
                <tr>
                  <td><?= esc($row['kode']) ?></td>
                  <td><?= esc($row['nama']) ?></td>
                  <td><button type="button" class="btn btn-success btn-sm pilih-sales-btn" data-kode="<?= esc($row['kode']) ?>" data-nama="<?= esc($row['nama']) ?>">Pilih</button></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
