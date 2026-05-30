
<div class="card">

    <div class="card-header">
        Gestión de Categorías
    </div>

    <div class="card-body">

        <label for="name">Nombre</label>
        <input class="form-control" type="text" id="name" name="name" value="<?= old('name', $category->name) ?>" />

        <button type="submit" class="mt-3 btn btn-success"><?= $textButton ?></button>

    </div>
</div>


