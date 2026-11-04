<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
    <div class="text-center mb-4">
        <h1>DATA USERS</h1>
        <a href="<?= base_url('dashboard') ?>" class="btn btn-primary">Kembali</a>
        <a href="<?= base_url('tambah') ?>" class="btn btn-primary">Tambah User</a>
    </div>

    <table class="table table-striped">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php

            foreach ($users as $row) : ?>
                <tr>
                    <td><?= esc($row['id']) ?></td>
                    <td><?= esc($row['username']) ?></td>
                    <td><?= esc($row['password']) ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id'] ?>">Update</button>
                        <a href="<?= base_url('user/edit/' . $row['id']) ?>" class="btn btn-primary">Edit</a>
                        <form action="<?= base_url('user/delete/' . $row['id']) ?>" method="post" onsubmit="return confirm('Yakin akan menghapus data ini?')">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>

                <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('user/update/' . $row['id']) ?>" method="post">
                                <div class="modal-body">
                                    <label for="username">Username :</label>
                                    <input type="text" name="username" id="username<?= $row['id'] ?>"
                                        value="<?= esc($row['username']) ?>"><br><br>
                                    <label for="password">Password :</label>
                                    <input type="password" name="password" id="password<?= $row['id'] ?>"
                                        value="<?= esc($row['password']) ?>"><br><br>
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



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>

</body>

</html>