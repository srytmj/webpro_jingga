<!DOCTYPE html>
<html>
<head>
    <title>Buat Pesanan</title>
</head>
<body>
    <h1>Buat Pesanan</h1>
    <form method="post" action="<?= site_url('pemesanan/process_create'); ?>">
        <label for="id_pelanggan">Pelanggan:</label>
        <select name="id_pelanggan" required>
            <?php foreach ($customers as $customer): ?>
                <option value="<?= $customer['id']; ?>"><?= $customer['nama']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="jenis_layanan_id">Jenis Layanan:</label>
        <select name="jenis_layanan_id" required>
            <?php foreach ($services as $service): ?>
                <option value="<?= $service['id']; ?>"><?= $service['jenis_layanan'] . ' - ' . $service['harga']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="tanggal_pengambilan">Tanggal Pengambilan:</label>
        <input type="date" name="tanggal_pengambilan" required>
        <br>

        <label for="berat_barang">Berat Barang (kg):</label>
        <input type="number" name="berat_barang" step="0.01" required>
        <br>

        <br>
        <input type="submit" value="Buat Pesanan">
    </form>
</body>
</html>
