<label for="title">Title</label>
<input type="input" name="titulo" value="<?= old('titulo', $pelicula->titulo) ?>" />

<br>

<label for="title">Title</label>
<textarea type="input" name="descripcion"><?= old('descripcion', $pelicula->descripcion) ?></textarea>

<br>

<button type="submit"><?= $op ?></button>