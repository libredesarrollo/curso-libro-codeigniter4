

<?= $this->extend('layouts/web') ?>

<?= $this->section('contenido') ?>
<?= view("partials/_form-error"); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Registrar Usuario - (Manual Sin Shield)</h2>
            <form action="<?= route_to('usuario.registrar.post') ?>" method="POST" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div class="invalid-feedback">
                        Por favor, ingresa un correo electrónico válido.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                    <div class="invalid-feedback">
                        Por favor, ingresa un nombre de usuario.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                    <div class="invalid-feedback">
                        Por favor, ingresa una contraseña.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Registrar</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>