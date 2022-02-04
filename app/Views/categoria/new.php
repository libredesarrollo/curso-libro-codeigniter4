<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('contenido') ?>

<form action="/dashboard/categoria/create" method="POST" enctype="multipart/form-data">
    <?= view("categoria/_form", ['op' => "Crear"]) ?>
</form>
<?= $this->endSection() ?>

