
<div class="card">

    <div class="card-header">
        Gestión de Tags
    </div>

    <div class="card-body">

        <label for="name">Nombre</label>
        <input class="form-control" type="text" id="name" name="name" value="<?= old('name', $tag->name) ?>" />
        <button type="submit" class="mt-3 btn btn-success"><?= $textButton ?></button>

    </div>
</div>