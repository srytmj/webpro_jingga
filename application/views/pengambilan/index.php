<!DOCTYPE html>
<html>
<head>
    <title>Pengambilan Laundry</title>
</head>
<body>
    <h1>Daftar Pesanan Pengambilan Laundry</h1>
    
    <!-- Filter buttons -->
    <div>
        <a href="<?= site_url('pengambilan/index/All'); ?>">Semua</a>
        <a href="<?= site_url('pengambilan/index/Proses'); ?>">Proses</a>
        <a href="<?= site_url('pengambilan/index/Selesai'); ?>">Selesai</a>
    </div>

    <!-- Date filter form -->
    <form action="<?= site_url('pengambilan/index'); ?>" method="get">
        <label for="date">Filter tanggal:</label>
        <input type="date" id="date" name="date" value="<?= $selected_date; ?>">
        <button type="submit">Filter</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Pemesanan</th>
                <th>Tanggal Pengambilan</th>
                <th>Total Biaya</th>
                <th>Status Pesanan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $key => $order): ?>
                <tr>
                    <td><?= $key + 1; ?></td>
                    <td><?= $this->Pengambilan_model->get_customer_name($order['id_pelanggan']); ?></td>
                    <td><?= $order['tanggal_pemesanan']; ?></td>
                    <td><?= $order['tanggal_pengambilan']; ?></td>
                    <td><?= $order['total_biaya']; ?></td>
                    <td><?= $order['status_pesanan']; ?></td>
                    <td>
                        <?php if ($order['status_pesanan'] === 'Proses'): ?>
                            <a href="<?= site_url('pengambilan/terima_laundry/' . $order['id']); ?>">Terima Laundry</a>
                        <?php else: ?>
                            <a href="<?= site_url('pengambilan/kembalikan_status/' . $order['id']); ?>">Kembali ke Proses</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
