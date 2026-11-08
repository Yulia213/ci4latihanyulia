<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <p> <?= $nama_teman ?> adalah <?= $status_teman; ?></p>
            <p> nilai = <?= $nilai ?>, predikat <?= $predikat ?></p>
            <p> nama = <?= $nama_teman ?>, level = <?= $level ?>, status = <?= $jabatan ?></p>
            <p> <?= $keterangan ?></p>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>