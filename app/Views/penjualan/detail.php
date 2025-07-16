<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Penjualan: <?= esc($penjualan['nomor_nota']); ?></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Nomor Nota:</strong> <?= esc($penjualan['nomor_nota']); ?></p>
                            <p><strong>Tanggal Nota:</strong> <?= esc(date('d/m/Y', strtotime($penjualan['tanggal_nota']))); ?></p>
                            <p><strong>Customer:</strong> <?= esc($penjualan['customer']); ?></p>
                            <p><strong>Sales:</strong> <?= esc($penjualan['sales']); ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Status:</strong> <span class="badge badge-secondary"><?= esc(ucfirst($penjualan['status'])); ?></span></p>
                            <p><strong>Total Harga:</strong> Rp <?= number_format($penjualan['grand_total'], 0, ',', '.'); ?></p>
                        </div>
                    </div>

                    <hr>

                    <h4>Tambah Item</h4>
                    <form action="/penjualan/addItem/<?= $penjualan['id']; ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="harga_satuan">Harga Satuan</label>
                                <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" min="0" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                            </div>
                        </div>
                    </form>

                    <hr>

                    <h4>Daftar Item</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($items) && !empty($items)) : ?>
                                <?php $no = 1; ?>
                                <?php foreach ($items as $item) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= esc($item['nama_barang']); ?></td>
                                        <td><?= esc($item['jumlah']); ?></td>
                                        <td>Rp <?= number_format($item['harga_satuan'], 0, ',', '.'); ?></td>
                                        <td>Rp <?= number_format($item['jumlah'] * $item['harga_satuan'], 0, ',', '.'); ?></td>
                                        <td>
                                            <a href="/penjualan/deleteItem/<?= esc($item['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada item yang ditambahkan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    
                    <div class="mt-3">
                        <a href="/penjualan" class="btn btn-secondary">Kembali ke Daftar Penjualan</a>
                        <a href="/penjualan/finalize/<?= $penjualan['id']; ?>" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin menyelesaikan penjualan ini?')">Selesaikan Penjualan</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
