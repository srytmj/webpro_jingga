<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pesanan</title>
</head>
<body>
    <h1>Daftar Pesanan</h1>
    <table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Pemesanan</th>
                <th>Tanggal Pengambilan</th>
                <th>Total Biaya</th>
                <th>Status Pesanan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $key => $order): ?>
                <tr>
                    <td><?= $key + 1; ?></td>
                    <td><?= $this->pemesanan_model->get_customer_name($order['id_pelanggan']); ?></td>
                    <td><?= $order['tanggal_pemesanan']; ?></td>
                    <td><?= $order['tanggal_pengambilan']; ?></td>
                    <td><?= $order['total_biaya']; ?></td>
                    <td><?= $order['status_pesanan']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>

    <a href="<?= site_url('pemesanan/create'); ?>">
        <button>Tambah Data Pemesanan</button>
    </a>
</body>
</html>
