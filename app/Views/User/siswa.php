<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="text-center mb-4">
                <h1>Data Siswa</h1>
                <a href="<?= base_url('tambahsiswa') ?>" class="btn btn-primary">Tambah Siswa</a>
            </div>

            <table class="table table-stripped">
                <thead class="table-primary">
                    <tr>
                        <th>NISN</th>
                        <th>NAMA SISWA</th>
                        <th>JENIS KELAMIN</th>
                        <th>TANGGAL LAHIR</th>
                        <th>ALAMAT</th>
                        <th>KELAS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($siswa as $row) :
                    ?>
                        <tr>
                            <td><?= esc($row['nisn']) ?></td>
                            <td><?= esc($row['nama']) ?></td>
                            <td><?= esc($row['jenis_kelamin']) ?></td>
                            <td><?= esc($row['tanggal_lahir']) ?></td>
                            <td><?= esc($row['alamat']) ?></td>
                            <td><?= esc($row['id_kelas']) ?></td>
                            <td>
                                <a href="#" class="btn btn-primary">Edit</a>
                                <a href="#" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>


<?= $this->endSection(); ?>