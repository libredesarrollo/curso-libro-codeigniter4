<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('contenido') ?>

    <form action="/dashboard/categoria/update/<?= $categoria['id'] ?>" method="POST">
        <?= view("categoria/_form", ['op' => "Actualizar"]) ?>
    </form>
<?= $this->endSection() ?>

