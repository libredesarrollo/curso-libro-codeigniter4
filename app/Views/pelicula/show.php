<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('contenido') ?>
<h1><?= $pelicula->titulo ?></h1>

<p><?= $pelicula->descripcion ?></p>

<ul>
    <?php foreach ($imagenes as $i) : ?>
        <li><?= $i->nombre ?></li>
    <?php endforeach ?>
</ul>
<?= $this->endSection() ?>