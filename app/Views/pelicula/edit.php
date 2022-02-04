<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('contenido') ?>

    <form action="/dashboard/pelicula/update/<?= $pelicula['id'] ?>" method="POST">
        <?= view("pelicula/_form", ['op' => "Actualizar"]) ?>
    </form>
<?= $this->endSection() ?>


