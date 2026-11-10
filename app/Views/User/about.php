<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">

            <!-- pakai innerHTML -->
            <div id="container"></div>
            <script>
                const container = document.getElementById("container");

                container.innerHTML = "<h3>judul baru dari javascript</h3><p>ini paragraf html yang dibuat oleh js</p>"
            </script>

            <!-- pakai document.createElement() dan appendChild -->
            <div id="wrapper"></div>
            <script>
                const paragrafBaru = document.createElement('p');
                paragrafBaru.innerHTML = 'ini dibuat menggunakan createElement';
                document.getElementById('wrapper').appendChild(paragrafBaru);
            </script>


            <!-- pakai template literals backtick `` -->
            <div id="card-area"></div>
            <script>
                const nama = "yulia";
                const htmlCard = `
                <div class="card">
                <h3>Profil Pengguna</h3>
                <p>nama: ${nama}</p>
                </div>
                `;

                document.getElementById('card-area').innerHTML = htmlCard;
            </script>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>