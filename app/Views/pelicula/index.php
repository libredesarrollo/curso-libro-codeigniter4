<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
</head>

<body>
    <h1>Películas</h1>
    <a href="/pelicula/new">Crear</a>
    <table>
        <tr>
            <td>
                Titulo
            </td>
            <td>
                Opciones
            </td>
        </tr>
        <?php foreach ($peliculas as $key => $p) : ?>
            <tr>
                <td>
                    <?= $p['titulo'] ?>
                </td>
                <td>
                    <a href="/pelicula/<?= $p['id'] ?>">Ver</a>

                    <form action="/pelicula/delete/<?= $p['id'] ?>" method="POST">
                        <button type="submit">Eliminar</button>
                    </form>

                    <a href="/pelicula/<?= $p['id'] ?>/edit">Editar</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>


</body>

</html>