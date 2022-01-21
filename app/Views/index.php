<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Titulo</h1>
    <p>Cuerpo de la página</p>

    <h3><?php echo date("Y-m-d H:i:s") ?></h3>
    <!-- <h3><?= date("Y-m-d H:i:s") ?></h3> -->

    <h3><?= $nombreVariableVista ?></h3>

    <ul>
        <?php foreach ($miArray as $key => $e) : ?>
            <li>
                <?= $e ?>
            </li>
        <?php endforeach ?>
    </ul>
</body>

</html>