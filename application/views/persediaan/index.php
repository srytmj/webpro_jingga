<!DOCTYPE html>
<html>
<head>
    <title>Data Persediaan Laundry</title>
</head>
<body>

<h2>Data Persediaan Laundry</h2>

<a href="<?= site_url('persediaan/create'); ?>">Tambah Persediaan</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Jumlah Barang</th>
        <th>Harga Satuan</th>
        <th>Tanggal Masuk</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($persediaan as $barang): ?>
        <tr>
            <td><?= $barang->id ?></td>
            <td><?= $barang->nama_barang ?></td>
            <td><?= $barang->jumlah_barang ?></td>
            <td><?= $barang->harga_satuan ?></td>
            <td><?= $barang->tgl_masuk ?></td>
            <td><?= $barang->keterangan ?></td>
            <td>
                <a href="<?= site_url('persediaan/edit/' . $barang->id); ?>">Edit</a>
                <a href="<?= site_url('persediaan/delete/' . $barang->id); ?>" onclick="return confirm('Menghapus data?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
