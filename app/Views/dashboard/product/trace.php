<h1 class="text-center">
    Ventas y compras de <?= $product->name ?>
</h1>

<hr>
<div class="card mb-2" style="width: 200px;">
    <div class="card-header">
        Características
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            Precio <?= $product->price ?>
        </li>
        <li class="list-group-item">
            Última Entrada <?= $product->entry ?>
        </li>
        <li class="list-group-item">
            Última Salida <?= $product->exit ?>
        </li>
    </ul>
</div>


<div class="card">

    <div class="card-header">
        <h3>Filtro</h3>
    </div>



    <form method="get" id="formFilter" class="m-0">

        <div class="card-body border-bottom">
            <h4>Busqueda</h4>

            <div class="p-2">
                <input class="form-control mb-2" value="<?= $search ?>" type="text" name="search" placeholder="Buscar">

                <div class="row ">



                    <div class="col">
                        <select class="form-control" name="type">
                            <option value="">Tipos</option>
                            <option <?= ($typeId == "exit") ? "selected" : "" ?> value="exit">Salida</option>
                            <option <?= ($typeId == "entry") ? "selected" : "" ?> value="entry">Entrada</option>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control" name="user_id">
                            <option value="">Usuarios</option>
                            <?php foreach ($users as $u) : ?>
                                <option <?= ($u->id == $userId) ? "selected" : "" ?> value="<?= $u->id ?>"><?= $u->username ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>

        </div>



        <div class="card-body">

            <h3>Cantidades</h3>

            <div class="p-2">
                <label class="d-block" for="check_cant">
                    Activar
                    <input type="checkbox" name="check_cant" id="check_cant" checked>
                </label>

                <label class="d-block" for="min_cant">
                    Minimo <span><?= $minCant ? $minCant : 0 ?></span>:
                    <input type="range" name="min_cant" value="<?= $minCant ? $minCant : 0 ?>" min="0" max="90" step="1">
                </label>

                <label class="d-block" for="max_cant">
                    Maximo <span><?= $maxCant ? $maxCant : 100 ?></span>:
                    <input type="range" name="max_cant" value="<?= $maxCant ? $maxCant : 100 ?>" min="10" max="100" step="1">
                </label>
            </div>


        </div>

        <div class="card-footer">
            <button class="btn btn-success" type="submit">Enviar</button>

            <a class="float-end btn btn-flat" href="<?= route_to('product.trace', $product->id) ?>">Limpiar</a>
        </div>

    </form>


</div>


<table class="table mt-3">
    <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                Fecha
            </th>
            <th>
                Tipo
            </th>

            <th>
                Cantidad
            </th>

            <th>
                Usuario
            </th>
            <th>
                Descripción
            </th>
            <th>Dirección</th>
            <th>
                Precio
            </th>
            <th>
                Total
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0 ?>
        <?php foreach ($trace as $key => $t) : ?>
            <tr>
                <td>
                    <?= $t->id ?>
                </td>
                <td>
                    <?= $t->created_at ?>
                </td>
                <td>
                    <?= $t->type ?>
                </td>
                <td>
                    <?= $t->count ?>
                </td>

                <td>
                    <?= $t->email ?>
                </td>
                <td>
                    <?= $t->description ?>
                </td>
                <td>
                    <?= $t->direction ?>
                </td>
                <td>
                    <?= $product->price ?>
                </td>
                <td>
                    <?php $total += $product->price * $t->count ?>
                    <?= $product->price * $t->count ?>
                </td>
            </tr>
        <?php endforeach ?>
        <tr>

            <td colspan="8">
                <span class="fw-bold">Total</span>
            </td>
            <td>
                <span class="fw-bold text-success">
                    <?= $total ?>
                </span>
            </td>

        </tr>
    </tbody>
</table>

<script>
    formFilter = document.getElementById("formFilter")
    min_cant = document.querySelector("[name='min_cant']")
    max_cant = document.querySelector("[name='max_cant']")
    for_min_cant = document.querySelector("[for='min_cant']")
    for_max_cant = document.querySelector("[for='max_cant']")
    check_cant = document.querySelector("[name='check_cant']")

    check_cant.addEventListener('change', () => {
        if (check_cant.checked) {
            for_min_cant.style.display = "inline-block"
            for_max_cant.style.display = "inline-block"
        } else {
            for_min_cant.style.display = "none"
            for_max_cant.style.display = "none"
        }
    })

    min_cant.addEventListener('change', () => {
        for_min_cant.querySelector("span").innerText = min_cant.value
    })

    max_cant.addEventListener('change', () => {
        for_max_cant.querySelector("span").innerText = max_cant.value
    })

    formFilter.addEventListener('submit', (event) => {
        event.preventDefault()

        if (parseInt(min_cant.value) >= parseInt(max_cant.value))
            return alert("Seleccione un rango correcto por los dioses!")

        formFilter.submit()
    })
</script>