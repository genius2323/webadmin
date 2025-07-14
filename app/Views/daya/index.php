<!-- List Daya -->
<h1>Data Daya</h1>
<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Daya</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($daya)) : ?>
            <?php foreach ($daya as $row) : ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama_daya'] ?></td>
                    <td>
                        <a href="<?= base_url('masterdaya/edit/' . $row['id']) ?>">Edit</a> |
                        <a href="<?= base_url('masterdaya/delete/' . $row['id']) ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr><td colspan="3">Data tidak ditemukan.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
<a href="<?= base_url('masterdaya/create') ?>">Tambah Daya</a>
