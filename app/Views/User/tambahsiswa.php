<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        .col
        <div class="text-center mb-4">
            <h1>Tambah Data Siswa</h1>
            <a href="<?= base_url('siswa') ?>" class="btn btn-primary">Kembali</a>
        </div>

        <form action="<?= base_url('simpanSiswa') ?>" method="post">

            <label for="nisn" class="form-label">NISN :</label>
            <input type="text" id="nisn" name="nisn" class="form-control" required>

            <label for="nama" class="form-label">Nama Siswa :</label>
            <input type="text" name="nama" id="nama" class="form-control" required>

            <label for="jenis_kelamin" class="form-label">Jenis Kelamin :</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <label for="tanggal_lahir" class="form-label">Tanggal Lahir :</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>

            <label for="alamat" class="form-label">Alamat :</label>
            <textarea name="alamat" id="alamat" class="form-control" required></textarea>

            <label for="id_kelas" class="form-label">Kelas :</label>
            <select name="id_kelas" id="id_kelas" class="form-select" required>
                <option value="">Pilih Kelas</option>
                <?php foreach ($kelas as $row) : ?>
                    <option value="<?= esc($row['id_kelas']) ?>"><?= esc($row['tingkat'] . ' ' . $row['jurusan'] . ' ' . $row['rombel']) ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>