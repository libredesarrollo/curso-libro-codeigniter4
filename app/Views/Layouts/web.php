<!doctype html>
<html lang="es">
<head>
    <title>Mi módulo de web</title>
</head>
<body>
    <header>
        <h1>Módulo web</h1>
    </header>
    <?= view("partials/_session") ?>
    <section>
        <?= $this->renderSection('contenido') ?>
    </section>
    <footer>
        Footer
    </footer>
</body>
</html>