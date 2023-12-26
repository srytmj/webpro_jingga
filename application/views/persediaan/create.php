<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang Persediaan</title>
</head>
<body>

<h2>Tambah Barang Persediaan</h2>

<form action="<?php echo base_url('persediaan/store'); ?>" method="post">
    <label for="nama_barang">Nama Barang:</label>
    <input type="text" name="nama_barang" required><br>

    <label for="jumlah_barang">Jumlah Barang:</label>
    <input type="number" name="jumlah_barang" required><br>

    <label for="harga_satuan">Harga Satuan:</label>
    <input type="text" name="harga_satuan" required><br>

    <label for="tgl_masuk">Tanggal Masuk:</label>
    <input type="date" name="tgl_masuk" required><br>

    <label for="keterangan">Keterangan:</label>
    <select name="keterangan">
        <option value="Stok Awal">Stok Awal</option>
        <option value="Pembelian Baru">Pembelian Baru</option>
        <option value="Restok">Restok</option>
    </select><br>

    <input type="submit" value="Simpan">
</form>

</body>
</html>
