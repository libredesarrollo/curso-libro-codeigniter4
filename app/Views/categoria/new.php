<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('contenido') ?>
<?= view("partials/_form-error"); ?>
<form action="/dashboard/categoria/create" method="POST" enctype="multipart/form-data">
    <?= view("categoria/_form", ['op' => "Crear"]) ?>
</form>
<?= $this->endSection() ?>

