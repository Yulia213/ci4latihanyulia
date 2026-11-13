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
                            <td><?= esc($row['kelas']) ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['nisn'] ?>">Edit</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal<?= $row['nisn'] ?>">Detail</button>
                                <form action="<?= base_url('siswa/hapusSiswa/' . $row['nisn']) ?>" method="post" onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>

                        <div class="modal fade" id="editModal<?= $row['nisn'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Siswa</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?= base_url('siswa/updateSiswa') ?>" method="post">
                                        <div class="modal-body">
                                            <label for="nisn" class="form-label">NISN :</label>
                                            <input type="text" id="nisn" name="nisn" class="form-control" value="<?= esc($row['nisn']) ?>" required>

                                            <label for="nama" class="form-label">Nama Siswa :</label>
                                            <input type="text" name="nama" id="nama" class="form-control" value="<?= esc($row['nama']) ?>" required>

                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin :</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="LAKI-LAKI" <?= ($row['jenis_kelamin'] == 'LAKI-LAKI') ? 'selected' : '' ?>>Laki-Laki</option>
                                                <option value="PEREMPUAN" <?= ($row['jenis_kelamin'] == 'PEREMPUAN') ? 'selected' : '' ?>>Perempuan</option>
                                            </select>

                                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir :</label>
                                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= esc($row['tanggal_lahir']) ?>" required>

                                            <label for="alamat" class="form-label">Alamat :</label>
                                            <textarea name="alamat" id="alamat" class="form-control" required><?= esc($row['alamat']) ?></textarea>

                                            <label for="id_kelas" class="form-label">Kelas :</label>
                                            <select name="kelas" id="id_kelas" class="form-select" value="<?= esc($row['kelas']) ?>" required>
                                                <option value="">Pilih Kelas</option>
                                                <?php foreach ($kelas as $kls) : ?>
                                                    <option value="<?= esc($kls['id_kelas']) ?>"
                                                        <?= ($kls['id_kelas'] == $row['id_kelas']) ? 'selected' : '' ?>><?= esc($kls['kelas']) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </tbody>
            </table>

            <?php
            foreach ($siswa as $row) :
                // dd($nilai);

            ?>
                <div class="modal fade" id="detailModal<?= $row['nisn'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Nilai : <?= $row['nama'] ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <table class="table table-stripped">
                                <thead class="table-primary">
                                    <tr>
                                        <th>NILAI</th>
                                        <th>MATA PELAJARAN</th>
                                        <th>PENGAJAR</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $totalNilai = 0;
                                    $jumlahData = 0;
                                    ?>
                                    <?php foreach ($nilai as $n) : ?>

                                        <?php if ($n['nisn'] == $row['nisn']) :
                                        ?>
                                            <tr>
                                                <td><?= esc($n['nilai_siswa']) ?></td>
                                                <td><?= esc($n['nama_mapel']) ?></td>
                                                <td><?= esc($n['nama_guru']) ?></td>
                                            </tr>
                                            <?php
                                            $totalNilai = $totalNilai + $n['nilai_siswa'];
                                            $jumlahData++;
                                            ?>

                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                            <p class="text-end">
                                <strong>
                                    Rata-rata: <?= $jumlahData > 0 ? round($totalNilai / $jumlahData, 2) : 0 ?>
                                </strong>
                            </p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</div>

<?php endforeach; ?>

<?= $this->endSection(); ?>