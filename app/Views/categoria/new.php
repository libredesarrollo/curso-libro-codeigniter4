<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('contenido') ?>
<?= view("partials/_form-error"); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Crear Categoría</h2>
            <form action="/dashboard/categoria/create" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <?= view("categoria/_form", ['op' => "Crear"]) ?>
                <!-- <button type="submit" class="btn btn-primary w-100 mt-3">Guardar</button> -->
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
