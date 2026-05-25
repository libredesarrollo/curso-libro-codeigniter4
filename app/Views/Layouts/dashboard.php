<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi módulo de admin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Módulo Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <?php if (session('usuario')) : ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= session("email") ?>
              </a>
              <ul class="dropdown-menu">
                <?php if (session('tipo') == 'admin') : ?>
                  <li><a class="dropdown-item" href="<?= route_to('dashboard.index') ?>">Dashboard</a></li>
                  <li><a class="dropdown-item" href="<?= route_to('categoria.index') ?>">Categorías</a></li>
                  <li><a class="dropdown-item" href="<?= route_to('pelicula.index') ?>">Películas</a></li>
                <?php endif; ?>
                <li><a class="dropdown-item" href="<?= route_to('usuario.logout') ?>">Logout</a></li>
              </ul>
            </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= route_to('usuario.login') ?>">Iniciar Sesión</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= route_to('usuario.registrar') ?>">Registrarse</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<?= view("partials/_session") ?>

<section class="container mt-4">
<?php if (session('usuario')) : ?>
<div class="alert alert-success p-2 my-2">
Usuario <?= session("email") ?> con el rol de: <?= session("tipo") ?>
</div>
<?php endif; ?>
<?= $this->renderSection('contenido') ?>
</section>

<footer class="footer mt-auto py-3 bg-light">
<div class="container text-center">
Footer
</div>
</footer>

<!-- Bootstrap JS and dependencies -->
<script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>