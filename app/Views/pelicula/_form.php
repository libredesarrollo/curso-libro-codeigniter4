<label for="title">Title</label>
<input type="input" name="titulo" value="<?= old('titulo', $pelicula->titulo) ?>" />

<br>

<label for="title">Title</label>
<textarea type="input" name="descripcion"><?= old('descripcion', $pelicula->descripcion) ?></textarea>

<br>

<label for="categoria_id">Categoría</label>
<select name="categoria_id" id="categoria_id">
    <option value=""></option>
    <?php foreach ($categorias as $c) : ?>
        <option <?= $pelicula->categoria_id !== $c->id ?: "selected" ?> value="<?= $c->id ?>"><?= $c->titulo ?> </option>
    <?php endforeach ?>
</select>

<?php if ($pelicula->id) : ?>
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" />
<?php endif ?>

<button type="submit"><?= $op ?></button>