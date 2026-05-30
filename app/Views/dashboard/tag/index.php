<a href="/dashboard/tag/new" class="btn btn-primary"> Crear</a>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($tags as $key =>$t) : ?>
            <tr>
                <td><?=$t->id ?></td>
                <td><?=$t->name ?></td>
                <td>

                    <form action="/dashboard/tag/delete/<?=$t->id ?>" method="POST">
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>

                    <a class="btn btn-sm btn-flat"  href="/dashboard/tag/<?=$t->id ?>/edit">Editar</a>

                </td>
            </tr>
        <?php endforeach ?>



    </tbody>
</table>

<?= $pager->links() ?>