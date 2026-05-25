<!doctype html>
<html lang="es">
<head>
    <title>Mi módulo de web</title>
</head>
<body>

    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">
    <?= view("partials/_session") ?>
    <section>
        <?= $this->renderSection('contenido') ?>
    </section>
    <footer>
        Footer
    </footer>
</body>
</html>