<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penggajian</title>
</head>
<body>
    <h2>Tambah Penggajian</h2>

    <form action="<?= site_url('penggajian/tambah'); ?>" method="post">
        <label for="id_pegawai">Pegawai:</label>
        <select name="id_pegawai" required>
            <?php foreach ($pegawai as $row): ?>
                <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="tanggal_gaji">Tanggal Gaji:</label>
        <input type="date" name="tanggal_gaji" required><br>

        <label for="tunjangan">Tunjangan:</label>
        <input type="text" name="tunjangan" required><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="<?= site_url('penggajian'); ?>">Kembali ke Daftar Penggajian</a>
</body>
</html>
