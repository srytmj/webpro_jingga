<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi Penjualan</title>
</head>

<body>
    <div class="container">
        <h3>Form Transaksi Penjualan</h3>

        <?php echo form_open('c_penjualan'); ?>

        <table class="table">
            <!-- <tr>
                <td>ID Penjualan</td>
                <td><input type="text" name="id_penjualan" required></td>
            </tr> -->
            <tr>
                <td>Karyawan</td>
                <td>
                    <select name="id_karyawan" id="id_karyawan" required>
                        <?php foreach ($data_karyawan as $karyawan) : ?>
                            <option value="<?= $karyawan->id_karyawan; ?>"><?= $karyawan->nama_karyawan; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Pelanggan</td>
                <td>
                    <select name="id_pelanggan" id="id_pelanggan" required>
                        <?php foreach ($data_pelanggan as $pelanggan) : ?>
                            <option value="<?= $pelanggan->id_pelanggan; ?>"><?= $pelanggan->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Penjualan</td>
                <td><input type="date" name="tgl_penjualan" required></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>
                    <input type="number" name="jumlah" id="jumlah" onchange="hitungTotal()" required>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga" id="harga" onchange="hitungTotal()" required></td>
            </tr>
            <tr>
                <td>Akun</td>
                <td>
                    <select name="kode_akun" required>
                        <?php foreach ($data_akun as $akun) : ?>
                            <option value="<?= $akun->kode_akun; ?>"><?= $akun->nama_akun; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="submit" class="btn btn-primary">Simpan</button></td>
            </tr>
        </table>

        <?php echo form_close(); ?>

        <table class="table table-bordered" border="2">
            <thead>
                <tr>
                    <th>ID Penjualan</th>
                    <th>Tanggal Penjualan</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Akun</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_penjualan as $penjualan) : ?>
                    <tr>
                        <td><?= $penjualan->id_penjualan; ?></td>
                        <td><?= $penjualan->tgl_penjualan; ?></td>
                        <td><?= $penjualan->jumlah; ?></td>
                        <td><?= $penjualan->harga; ?></td>
                        <td><?= $penjualan->kode_akun; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        function hitungTotal() {
            var jumlah = parseInt(document.getElementById('jumlah').value);
            var harga = parseInt(document.getElementById('harga').value);
            var total = jumlah * harga;
            document.getElementById('total_penjualan').value = total;
        }
    </script>
</body>

</html>
