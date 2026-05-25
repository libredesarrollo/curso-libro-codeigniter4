

<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('contenido') ?>
<?= view("partials/_form-error"); ?>


    <h1>Categorías</h1>
    <a href="/dashboard/categoria/new" class="btn btn-primary mb-3">Crear</a>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($categorias as $key => $c) : ?>
            <tr>


                    <a href="/dashboard/categoria/<?= $c->id ?>" class="btn btn-info btn-sm">Ver</a>
                    <form action="/dashboard/categoria/delete/<?= $c->id ?>" method="POST" style="display: inline-block;">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</button>
                    </form>


                    <a href="/dashboard/categoria/edit/<?= $c->id ?>" class="btn btn-warning btn-sm">Editar</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

</div>

<?= $this->endSection() ?>

