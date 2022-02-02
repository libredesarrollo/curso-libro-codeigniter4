<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear película</title>
</head>

<body>

    <?= view("partials/_session") ?>

    <form action="/dashboard/pelicula/create" method="POST" enctype="multipart/form-data">
        <?= view("pelicula/_form", ['op' => "Crear"]) ?>
    </form>
</body>

</html>