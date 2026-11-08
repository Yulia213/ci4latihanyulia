<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">

            <div class="text-center mb-4">
                <h1>Dashboard</h1>
                <p>Welcome, <?= session()->get('username') ?>!</p>
                <a href="<?= base_url('/logout') ?>" class="btn btn-primary">Log out</a>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>