<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Looping</title>
</head>

<body>
    <?php foreach ($hasil as $data) : ?>
        <p> hasil = <?= $data ?> </p>
    <?php endforeach; ?>
</body>

</html>