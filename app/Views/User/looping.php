<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <?php foreach ($hasil as $data) : ?>
                <p> hasil = <?= $data ?> </p>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>