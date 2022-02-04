<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('contenido') ?>

    <form action="/dashboard/pelicula/create" method="POST" enctype="multipart/form-data">
        <?= view("pelicula/_form", ['op' => "Crear"]) ?>
    </form>
<?= $this->endSection() ?>