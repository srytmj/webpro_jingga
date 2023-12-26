<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penggajian</title>
</head>
<body>
    <h2>Edit Penggajian - <?= $this->Penggajian_model->get_pegawai_name($penggajian->id_pegawai); ?></h2>

    <form action="<?= site_url('penggajian/edit/' . $penggajian->id); ?>" method="post">
        <input type="hidden" name="id_pegawai" value="<?= $penggajian->id_pegawai; ?>">

        <label for="tanggal_gaji">Tanggal Gaji:</label>
        <input type="date" name="tanggal_gaji" value="<?= $penggajian->tanggal_gaji; ?>" required><br>

        <label for="tunjangan">Tunjangan:</label>
        <input type="text" name="tunjangan" value="<?= $penggajian->tunjangan; ?>" required><br>
        
        <input type="hidden" name="status_penggajian" value="<?= $penggajian->status_penggajian; ?>">

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="<?= site_url('penggajian'); ?>">Kembali ke Daftar Penggajian</a>
</body>
</html>
