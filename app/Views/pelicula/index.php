<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('contenido') ?>
<?= view("partials/_form-error"); ?>
<h1>Películas</h1>
    <a href="/dashboard/pelicula/new">Crear</a>
    <table>
        <tr>
            <td>
                Título
            </td>
            <td>
                Categoría
            </td>
            <td>
                Opciones
            </td>
        </tr>
        <?php foreach ($peliculas as $key => $p) : ?>
            <tr>
                <td>
                    <?= $p->titulo ?>
                </td>
                <td>
                    <?= $p->categoria ?>
                </td>
                <td>
                    <a href="/dashboard/pelicula/<?= $p->id ?>">Ver</a>

                    <form action="/dashboard/pelicula/delete/<?= $p->id ?>" method="POST">
                        <button type="submit">Eliminar</button>
                    </form>

                    <a href="/dashboard/pelicula/edit/<?= $p->id ?>">Editar</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>

    <?= $pager->links() ?>

<?= $this->endSection() ?>