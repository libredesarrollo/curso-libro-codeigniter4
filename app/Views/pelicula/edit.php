<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('contenido') ?>
<?= view("partials/_form-error"); ?>
    <form action="/dashboard/pelicula/update/<?= $pelicula->id ?>" method="POST" enctype="multipart/form-data">
        <?= view("pelicula/_form", ['op' => "Actualizar"]) ?>
    </form>
<?= $this->endSection() ?>


