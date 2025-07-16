
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
  <div class="col-md-7">
    <div class="card shadow-sm border-0 mt-4">
      <div class="card-header bg-primary text-white">
        <h4 class="mb-0"><i class="fa fa-shopping-cart me-2"></i>  Tambah Penjualan</h4>
      </div>
      <div class="card-body">
        <?php if (session()->getFlashdata('success')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors')): ?>
          <div class="alert alert-danger">
            <ul class="mb-0">
              <?php foreach (session('errors') as $err): ?>
                <li><?= esc($err) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
        <form action="<?= base_url('penjualan/create') ?>" method="post" autocomplete="off">
          <div class="mb-3">
            <?php
                            $minDate = '';
                            $maxDate = '';
                            if (($mode_batas_tanggal ?? 'manual') === 'automatic') {
                                $maxDate = date('Y-m-d');
                                $minDate = date('Y-m-d', strtotime('-2 days'));
                            } elseif (!empty($batas_tanggal_sistem)) {
                                $minDate = $batas_tanggal_sistem;
                                $maxDate = date('Y-m-d');
                            }
                            ?>
                            <input type="text" name="tanggal_nota" id="tanggal_nota" class="form-control"
                                style="background:#f8f9fa; cursor:pointer; color:#212529;"
                                value="<?= (isset($penjualan) && isset($penjualan['tanggal_nota'])) ? date('d/m/Y', strtotime($penjualan['tanggal_nota'])) : date('d/m/Y') ?>"
                                required readonly>
                            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    flatpickr('#tanggal_nota', {
                                        dateFormat: 'd/m/Y',
                                        disableMobile: true,
                                        minDate: <?= $minDate ? "'" . date('d/m/Y', strtotime($minDate)) . "'" : 'null' ?>,
                                        maxDate: <?= $maxDate ? "'" . date('d/m/Y', strtotime($maxDate)) . "'" : 'null' ?>,
                                        allowInput: false
                                    });
                                });
                            </script>
                            <input type="hidden" id="mode_batas_tanggal" name="mode_batas_tanggal" value="<?= esc($mode_batas_tanggal ?? 'manual') ?>">
                            <input type="hidden" id="batas_tanggal_sistem" name="batas_tanggal_sistem" value="<?= esc($batas_tanggal_sistem ?? '') ?>">
                        </div>
          <div class="mb-3">
            <label for="nomor_nota" class="form-label">Nomor Nota</label>
            <input type="text" class="form-control" id="nomor_nota"
              placeholder="<?= esc($nomor_nota ?? '-') ?>"
              readonly style="background:#f8f9fa; cursor:not-allowed;">
            <input type="hidden" name="nomor_nota" value="<?= esc($nomor_nota ?? '') ?>">
          </div>
          <div class="mb-3">
            <label for="customer" class="form-label">Customer</label>
            <input type="text" class="form-control" id="customer" name="customer" >
          </div>
          <div class="mb-3">
            <label for="sales" class="form-label">Sales</label>
            <input type="text" class="form-control" id="sales" name="sales" >
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-plus me-2"></i>  Tambah Penjualan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
