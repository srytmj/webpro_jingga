<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penggajian</title>
</head>
<body>
    <h2>Daftar Penggajian</h2>

    <!-- Formulir Filter -->
    <form action="<?= site_url('penggajian'); ?>" method="get">
        <label for="filter_status">Filter Status:</label>
        <select name="filter_status">
            <option value="semua" <?= ($filter_status == 'semua') ? 'selected' : ''; ?>>Semua</option>
            <option value="Sudah Cair" <?= ($filter_status == 'Sudah Cair') ? 'selected' : ''; ?>>Sudah Cair</option>
            <option value="Belum Cair" <?= ($filter_status == 'Belum Cair') ? 'selected' : ''; ?>>Belum Cair</option>
        </select>

        <label for="filter_tanggal">Filter Tanggal:</label>
        <input type="date" name="filter_tanggal" value="<?= $filter_tanggal; ?>">

        <button type="submit">Filter</button>
    </form>

    <a href="<?= site_url('penggajian/tambah'); ?>">Tambah Penggajian</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pegawai</th>
                <th>Tanggal Gaji</th>
                <th>Tunjangan</th>
                <th>Total Gaji</th>
                <th>Status Penggajian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($penggajian as $row): ?>
                <tr>
                    <td><?= $row->id; ?></td>
                    <td><?= $this->Penggajian_model->get_pegawai_name($row->id_pegawai); ?></td>
                    <td><?= $row->tanggal_gaji; ?></td>
                    <td><?= $row->tunjangan; ?></td>
                    <td><?= $row->total_gaji; ?></td>
                    <td><?= $row->status_penggajian; ?></td>
                    <td>
                        <a href="<?= site_url('penggajian/edit/' . $row->id); ?>">Edit</a>
                        <a href="<?= site_url('penggajian/hapus/' . $row->id); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>

                        <!-- Tombol untuk mengubah status menjadi "Sudah Cair" -->
                        <?php if ($row->status_penggajian == 'Belum Cair'): ?>
                            <a href="<?= site_url('penggajian/set_sudah_cair/' . $row->id); ?>">Set Sudah Cair</a>
                        <?php endif; ?>

                        <!-- Tombol untuk mengubah status menjadi "Belum Cair" -->
                        <?php if ($row->status_penggajian == 'Sudah Cair'): ?>
                            <a href="<?= site_url('penggajian/set_belum_cair/' . $row->id); ?>">Set Belum Cair</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
