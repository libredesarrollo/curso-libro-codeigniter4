<?= $this->extend('layouts/web') ?>

<?= $this->section('contenido') ?>
<?= view("partials/_form-error"); ?>
<form action="<?= route_to('usuario.registrar.post') ?>" method="POST">
    <input name="email" type="text">
    <input name="usuario" type="text">
    <input name="contrasena" type="password">
    <button type="submit">Registrar</button>
</form>
<?= $this->endSection() ?>