<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <p>For</p>
            <?php foreach ($hasil as $data) : ?>
                <p> hasil = <?= $data ?> </p>
            <?php endforeach; ?>

            <p>WHILE</p>
            <?php foreach ($angka as $data) : ?>
                <p> angka = <?= $data ?></p>
            <?php endforeach; ?>

            <p>DO WHILE</p>
            <?php foreach ($number as $data) : ?>
                <p> number <?= $data ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>