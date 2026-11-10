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
            <?php foreach ($angka as $properti => $nilai) { ?>
                <?= $properti ?> : <?= $nilai ?><br>
            <?php } ?> <br>

            <p>DO WHILE</p>
            <?php foreach ($number as $data) { ?>
                <?= $data ?><br>
            <?php } ?> <br>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>