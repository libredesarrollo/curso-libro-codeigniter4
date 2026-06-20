<?= $this->extend('layouts/web') ?>

<?= $this->section('contenido') ?>
<?= view("partials/_form-error"); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h2>Bienvenido a la Aplicación</h2>
            <p>Explora nuestra plataforma y realiza diversas acciones.</p>
            <div class="mt-4 d-md-flex justify-content-md-center">
                <a href="<?= route_to('usuario.login') ?>" class="btn btn-primary me-3">Iniciar Sesión (Login Manual)</a>
                <a href="<?= route_to('usuario.registrar') ?>" class="btn btn-secondary">Registrarse (Registrarse Manual)</a>
            </div>
            <p class="mt-4">Spark:</p>
            <div class="mt-4 d-md-flex justify-content-md-center">
                <a href="/login" class="btn btn-primary me-3">Iniciar Sesión</a>
                <a href="/register" class="btn btn-secondary">Registrarse</a>
            </div>
            <ul>
                <li>User: <strong>admin@admin.com</strong></li>
                <li>Password: <strong>YPH4Rzt8MwKq95z</strong>
                
            </ul>
        </div>
    </div>

    <div class="container mt-5">
        <h2>Enlaces adicionales</h2>
        <ul class="list-group">
            <li class="d-grid gap-3">
                <a href="/dashboard/categoria" class="btn btn-info">Dashboard (Categorías)</a>
                <a href="/dashboard/pelicula" class="btn btn-info">Dashboard (Películas)</a>
                <a href="/dashboard/tag" class="btn btn-info">Proyecto Inventario</a>
                <a href="/categoryautocrud" class="btn btn-info">AutoCRUD</a>
                <a href="/vue" class="btn btn-info">App Vue CRUD demo consumo API Rest</a>
                <a href="<?= route_to('usuario.index') ?>" class="btn btn-info">Dashboard (Usuarios, Roles y Permisos)</a>
            </li>
            <li class="list-group-item mt-2">
                <a href="/api/pelicula" class="btn btn-danger">API REST CRUD Películas</a>
            </li>
        </ul>
    </div>

</div>

<?= $this->endSection() ?>