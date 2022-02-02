<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear categoría</title>
</head>

<body>
    <?= view("partials/_session") ?>
    
    <form action="/dashboard/categoria/update/<?= $categoria['id'] ?>" method="POST">
        <?= view("categoria/_form", ['op' => "Actualizar"]) ?>
    </form>
</body>

</html>