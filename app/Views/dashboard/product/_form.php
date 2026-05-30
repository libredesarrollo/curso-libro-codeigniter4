<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

<div class="card">

    <div class="card-header">
        Gestión de Productos
    </div>

    <div class="card-body">
        <label class="mt-2" for="name">Nombre</label>
        <input class="form-control" type="text" id="name" name="name" value="<?= old('name', $product->name) ?>" />

        <label class="mt-2" for="code">Código</label>
        <input class="form-control" type="text" id="code" name="code" value="<?= old('code', $product->code) ?>" />

        <label for="description">Descripción</label>
        <textarea id="editor" name="description"><?= old('description', $product->description) ?></textarea>

        <label class="mt-2" for="entry">Entrada</label>
        <input class="form-control" type="number" id="entry" name="entry" value="<?= old('entry', $product->entry) ?>" />

        <label class="mt-2" for="exit">Salida</label>
        <input class="form-control" type="text" id="exit" name="exit" value="<?= old('exit', $product->exit) ?>" />

        <label class="mt-2" for="stock">Stock</label>
        <input class="form-control" type="text" id="stock" name="stock" value="<?= old('stock', $product->stock) ?>" />

        <label class="mt-2" for="price">Precio</label>
        <input class="form-control" type="text" id="price" name="price" value="<?= old('price', $product->price) ?>" />

        <label class="mt-2" for="category_id">Categorías</label>
        <select class="form-control" name="category_id" id="category_id">

            <?php foreach ($categories as $c) : ?>
                <option <?= $product->category_id == $c->id ? "selected" : "" ?> value="<?= $c->id ?>"><?= $c->name ?></option>
            <?php endforeach ?>

        </select>

        <label class="mt-2" for="tag_id">Tags</label>
        <select class="form-control" multiple name="tag_id[]" id="tag_id">
            <?php foreach ($tags as $t) : ?>
                <option <?= in_array($t->id, old('tag_id', $productTags)) ? "selected" : "" ?> value="<?= $t->id ?>"><?= $t->name ?></option>
            <?php endforeach ?>
        </select>

        <button type="submit" class="mt-3 btn btn-success"><?= $textButton ?></button>

    </div>
</div>

<script>
    ClassicEditor.create(document.querySelector("#editor"))
</script>