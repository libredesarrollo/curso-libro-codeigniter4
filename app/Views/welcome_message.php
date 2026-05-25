<?= $this->extend('layouts/web') ?>

<?= $this->section('contenido') ?>
<?= view("partials/_form-error"); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h2>Bienvenido a la Aplicación</h2>
            <p>Explora nuestra plataforma y realiza diversas acciones.</p>
            <div class="mt-4">
                <a href="<?= route_to('usuario.login') ?>" class="btn btn-primary me-3">Iniciar Sesión</a>
                <a href="<?= route_to('usuario.registrar') ?>" class="btn btn-secondary">Registrarse</a>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h2>Enlaces adicionales</h2>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="/dashboard/categoria" class="btn btn-info">Dashboard (Categorías)</a>
            </li>
            <li class="list-group-item">
                <a href="/api/peliculas" class="btn btn-danger">API REST Películas</a>
            </li>
        </ul>
    </div>

</div>

<?= $this->endSection() ?>