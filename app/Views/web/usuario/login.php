<?= $this->extend('layouts/web') ?>

<?= $this->section('contenido') ?>
<?= view("partials/_form-error"); ?>
<form action="<?= route_to('usuario.login.post') ?>" method="POST">
    <input name="email" type="text">
    <input name="contrasena" type="password">
    <button type="submit">Iniciar sesión</button>
</form>
<?= $this->endSection() ?>