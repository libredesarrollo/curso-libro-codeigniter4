<style>
    * {
        color:blue
    }
</style>

<p>
    Ventas y compras de <?= $product->name ?>
</p>

<ul>
    <li>
        Precio <?= $product->price ?>
    </li>
    <li>
        Última Entrada <?= $product->entry ?>
    </li>
    <li>
        Última Salida <?= $product->exit ?>
    </li>
</ul>


<table>
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

            <td colspan="8">Total</td>
            <td><?= $total ?></td>

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