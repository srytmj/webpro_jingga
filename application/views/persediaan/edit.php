<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang Persediaan</title>
</head>
<body>

<h2>Edit Barang Persediaan</h2>

<form action="<?= site_url('persediaan/update/' . $barang->id); ?>" method="post">
    <label for="nama_barang">Nama Barang:</label>
    <input type="text" name="nama_barang" value="<?php echo $barang->nama_barang; ?>" required><br>

    <label for="jumlah_barang">Jumlah Barang:</label>
    <input type="number" name="jumlah_barang" value="<?php echo $barang->jumlah_barang; ?>" required><br>

    <label for="harga_satuan">Harga Satuan:</label>
    <input type="text" name="harga_satuan" value="<?php echo $barang->harga_satuan; ?>" required><br>

    <label for="tgl_masuk">Tanggal Masuk:</label>
    <input type="date" name="tgl_masuk" value="<?php echo $barang->tgl_masuk; ?>" required><br>

    <label for="keterangan">Keterangan:</label>
    <select name="keterangan">
        <option value="Stok Awal" <?php echo ($barang->keterangan == 'Stok Awal') ? 'selected' : ''; ?>>Stok Awal</option>
        <option value="Pembelian Baru" <?php echo ($barang->keterangan == 'Pembelian Baru') ? 'selected' : ''; ?>>Pembelian Baru</option>
        <option value="Restok" <?php echo ($barang->keterangan == 'Restok') ? 'selected' : ''; ?>>Restok</option>
    </select><br>

    <input type="submit" value="Simpan">
</form>

</body>
</html>
