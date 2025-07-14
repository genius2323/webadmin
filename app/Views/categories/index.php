<!-- List Kategori -->
<h1>Data Kategori</h1>
<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($kategori)) : ?>
            <?php foreach ($kategori as $row) : ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama_kategori'] ?></td>
                    <td>
                        <a href="<?= base_url('masterkategori/edit/' . $row['id']) ?>">Edit</a> |
                        <a href="<?= base_url('masterkategori/delete/' . $row['id']) ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr><td colspan="3">Data tidak ditemukan.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
<a href="<?= base_url('masterkategori/create') ?>">Tambah Kategori</a>
