<div class="mb-3">
    <label for="title" class="form-label">Título</label>

<input type="input"  class="form-control name="titulo" value="<?= old('titulo', $categoria->titulo) ?>" />
</div>


<div class="mb-3">
    <label for="submit" class="form-label"></label>
    <button type="submit" class="btn btn-primary w-100 mt-3"><?= $op ?></button>
</div>

