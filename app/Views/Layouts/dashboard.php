<!doctype html>
<html lang="es">
<head>
    <title>Mi modulo de admin</title>
</head>
<body>
    <header>
        <h1>Módulo admin</h1>
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