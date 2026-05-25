<?= $this->extend('Layouts/web') ?>
<?= $this->section('contenido') ?>

<div class="card bg-light mt-4">
    <div class="card-header">
        <?= $usuario->username ?>
    </div>
    <div class="card-body">
        <h4>Grupos</h4>
        <?php foreach ($usuario->getGroups() as $g) : ?>
            <?= $g ?>
        <?php endforeach; ?>
    </div>
    <div class="card-body">
        <h4>Permisos</h4>
        <?php foreach ($usuario->getPermissions() as $g) : ?>
            <?= $g ?>
        <?php endforeach; ?>
    </div>
    <div class="card-header">
        Grupos y permisos disponibles
    </div>
    <div class="card-body">
        <h4>Grupos</h4>
        <?php foreach ($groups as $key => $g) : ?>
            <button data-grupo='<?= $key ?>' class="btn-grupo btn btn-primary btn-sm mr-2 <?php if ($usuario->inGroup($key)) : ?>
                            border-5 border-danger
                        <?php endif; ?>"><?= $key ?></button>
        <?php endforeach; ?>
    </div>
    <div class="card-body">
        <h4>Permisos</h4>
        <?php $oldGroup = ''; ?>
        <?php foreach ($permissions as $key => $p) : ?>
            <?php if ($oldGroup != explode('.', $key)[0]) : ?>
                <?php $oldGroup = explode('.', $key)[0] ?>
                <h5><?= $oldGroup ?></h5>
            <?php endif; ?>
            <div class="d-flex mb-2 ms-4">
                <button data-permiso='<?= $key ?>' class="btn-permiso btn btn-success btn-sm mr-2 
            <?php if ($usuario->can($key)) : ?>
                border-5 border-danger
                <?php endif; ?> "><?= $key ?>
                    <span>
                        <?php if ($usuario->can($key)) : ?>
                            Habilitado
                        <?php endif; ?>
                    </span>
                </button>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="card-body">
        <h4>Matrix: Grupos y permisos</h4>
        <?php foreach ($groups as $key => $g) : ?>
            <h5><?= $key ?></h5>
            <?php foreach ($matrix[$key] as $key2 => $m) : ?>
                <span data-grupo='<?= $key ?>' class="btn-grupo btn btn-secondary btn-sm mr-2 "><?= $m ?></span>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</div>

<?php if (auth()->user()->can('users.edit')) : ?>
    <script>
        document.querySelectorAll('.btn-permiso').forEach((b) => {
            b.addEventListener('click', () => {
                var formData = new FormData();
                formData.append('permiso', b.getAttribute('data-permiso'))

                fetch('/dashboard/usuario/permisos_manejar/<?= $usuario->id ?>', {
                        method: 'POST',
                        body: formData
                    }).then(res => res.json())
                    .then(res => {
                        if (res == 0) {
                            b.classList.remove('border-5')
                            b.classList.remove('border-danger')
                            b.querySelector('span').innerText = ''
                        } else {
                            b.classList.add('border-5')
                            b.classList.add('border-danger')
                            b.querySelector('span').innerText = 'Habilitado'
                        }
                    })
            })
        })

        document.querySelectorAll('.btn-grupo').forEach((b) => {
            b.addEventListener('click', () => {
                var formData = new FormData();
                formData.append('grupo', b.getAttribute('data-grupo'))

                fetch('/dashboard/usuario/grupos_manejar/<?= $usuario->id ?>', {
                        method: 'POST',
                        body: formData
                    }).then(res => res.json())
                    .then(res => {
                        if (res == 0) {
                            b.classList.remove('border-5')
                            b.classList.remove('border-danger')
                        } else {
                            b.classList.add('border-5')
                            b.classList.add('border-danger')
                        }
                    })
            })
        })
    </script>

<?php endif ?>

<?= $this->endSection() ?>