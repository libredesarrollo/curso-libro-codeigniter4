<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('contenido') ?>
<h1><?= $pelicula['titulo'] ?></h1>

<p><?= $pelicula['descripcion'] ?></p>

<?= $this->endSection() ?>