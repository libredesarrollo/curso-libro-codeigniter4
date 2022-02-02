<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoría</title>
</head>

<body>

    <?= view("partials/_session") ?>

    <h1>Categoría</h1>
    <a href="/dashboard/categoria/new">Crear</a>
    <table>
        <tr>
            <td>
                Titulo
            </td>
            <td>
                Opciones
            </td>
        </tr>
        <?php foreach ($categorias as $key => $c) : ?>
            <tr>
                <td>
                    <?= $c['titulo'] ?>
                </td>
                <td>
                    <a href="/dashboard/categoria/<?= $c['id'] ?>">Ver</a>

                    <form action="/dashboard/categoria/delete/<?= $c['id'] ?>" method="POST">
                        <button type="submit">Eliminar</button>
                    </form>

                    <a href="/dashboard/categoria/edit/<?= $c['id'] ?>">Editar</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>


</body>

</html>