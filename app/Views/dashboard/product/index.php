<div class="row mb-4 align-items-center">
    <div class="col">
        <h2 class="fw-bold mb-0 text-gradient">Inventario de Productos</h2>
        <p class="text-muted small">Administra tu stock de forma eficiente</p>
    </div>
    <div class="col-auto">
        <a href="/dashboard/product/new" class="btn btn-primary px-4 shadow-sm">
            <i class="fa fa-plus me-1"></i> Nuevo Producto
        </a>
    </div>
</div>

<!-- Filtros Card -->
<div class="card mb-4 border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center cursor-pointer" data-bs-toggle="collapse" data-bs-target="#filters">
        <h5 class="mb-0 fw-semibold"><i class="fa fa-filter me-2 text-primary"></i>Filtros de búsqueda</h5>
        <i class="fa fa-chevron-down text-muted"></i>
    </div>
    <div class="card-body collapse show" id="filters">
        <form class="row g-3">
            <div class="col-md-4">
                <label for="category_id" class="form-label fw-medium small">Categoría</label>
                <select class="form-select form-select-sm" name="category_id" id="category_id">
                    <option value="">Todas las categorías</option>
                    <?php foreach ($categories as $c) : ?>
                        <option <?= $category_id == $c->id ? "selected" : "" ?> value="<?= $c->id ?>"><?= $c->name ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="col-md-8">
                <label class="form-label fw-medium small">Etiquetas</label>
                <div class="d-flex flex-wrap gap-2 p-2 border rounded bg-light" style="max-height: 100px; overflow-y: auto;">
                    <?php foreach ($tags as $t) : ?>
                        <div class="form-check">
                            <input class="form-check-input" value="<?= $t->id ?>" <?= in_array($t->id, old('tag_id', $productTags)) ? "checked" : "" ?> type="checkbox" name="tags_id[]" id="t_<?= $t->id ?>">
                            <label class="form-check-label small" for="t_<?= $t->id ?>">
                                <?= $t->name ?>
                            </label>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-12 text-end border-top pt-3">
                <button type="submit" class="btn btn-dark btn-sm px-4">
                    <i class="fa fa-search me-1"></i> Filtrar reporte
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Tabla Productos -->
<div class="card border-0 shadow-sm overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light">
                <tr>
                    <th class="ps-4">ID</th>
                    <th>Producto</th>
                    <th>Código</th>
                    <th style="width: 120px;">Entrada</th>
                    <th style="width: 120px;">Salida</th>
                    <th class="text-center">Stock</th>
                    <th class="text-end pe-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $key => $p) : ?>
                    <tr>
                        <td class="ps-4 text-muted small">#<?= $p->id ?></td>
                        <td>
                            <div class="fw-bold"><?= $p->name ?></div>
                            <div class="text-muted x-small"><?= $p->price ?> €/unidad</div>
                        </td>
                        <td><span class="badge bg-light text-dark border fw-medium"><?= $p->code ?></span></td>
                        <td>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-white"><i class="fa fa-plus text-success x-small"></i></span>
                                <input type="number" data-id="<?= $p->id ?>" class="entry form-control border-start-0" value="<?= $p->entry ?>" />
                            </div>
                        </td>
                        <td>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-white"><i class="fa fa-minus text-danger x-small"></i></span>
                                <input type="number" data-id="<?= $p->id ?>" class="exit form-control border-start-0" value="<?= $p->exit ?>" />
                            </div>
                        </td>
                        <td class="text-center font-monospace">
                            <span id="stock_<?= $p->id ?>" class="badge <?= $p->stock < 10 ? 'bg-danger-subtle text-danger' : 'bg-success-subtle text-success' ?> fs-6 px-3">
                                <?= $p->stock ?>
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-pill" data-bs-toggle="dropdown">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                    <li><a class="dropdown-item" href="/dashboard/product/<?= $p->id ?>/edit"><i class="fa fa-edit me-2 text-primary"></i> Editar</a></li>
                                    <li><a class="dropdown-item" href="<?= route_to('product.trace', $p->id) ?>"><i class="fa fa-history me-2 text-info"></i> Ver Traza</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="/dashboard/product/delete/<?= $p->id ?>" method="POST" onsubmit="return confirm('¿Estás seguro?')">
                                            <button class="dropdown-item text-danger"><i class="fa fa-trash me-2"></i> Eliminar</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4 d-flex justify-content-center">
    <?= $pager->links() ?>
</div>

<!-- Modal Moderno Stock -->
<div class="modal fade" id="blockSelectUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-dark text-white border-0">
                <h5 class="modal-title fw-bold" id="modalTitle">Confirmar Movimiento</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Responsable (Usuario/Cliente)</label>
                    <select class="form-select user border-0 bg-light">
                        <?php foreach ($users as $key => $u) : ?>
                            <option value="<?= $u->id ?>"><?= $u->username ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Descripción del movimiento</label>
                    <textarea class="form-control description border-0 bg-light" rows="2" placeholder="Ej: Venta directa a cliente..."></textarea>
                    <div class="errorDescription text-danger x-small mt-1"></div>
                </div>

                <div class="mb-0">
                    <label class="form-label fw-semibold">Dirección / Ubicación</label>
                    <textarea class="form-control direction border-0 bg-light" rows="2" placeholder="Destino o procedencia..."></textarea>
                    <div class="errorDirection text-danger x-small mt-1"></div>
                </div>
            </div>
            <div class="modal-footer border-0 p-4 pt-0">
                <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Cancelar</button>
                <button class="user btn btn-primary px-4 shadow">
                    <i class="fa fa-check me-1"></i> Confirmar Stock
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    modal = new bootstrap.Modal(document.getElementById('blockSelectUser'))

    entries = document.querySelectorAll(".entry")

    exits = document.querySelectorAll(".exit")
    blockSelectUser = document.querySelector("#blockSelectUser")
    selectUser = document.querySelector("#blockSelectUser select.user")
    buttonUser = document.querySelector("#blockSelectUser button.user")
    direction = document.querySelector("#blockSelectUser .direction")
    description = document.querySelector("#blockSelectUser .description")
    //labels
    errorDescription = document.querySelector("#blockSelectUser .errorDescription")
    errorDirection = document.querySelector("#blockSelectUser .errorDirection")

    typeUser = "customer"
    userExit = []
    userEntry = []


    function getUsers() {
        fetch("/dashboard/user/get-by-type/" + typeUser)
            .then((res) => res.json())
            .then((res) => {
                if (typeUser == "provider")
                    userEntry = res
                else
                    userExit = res

                populateSelectUser()
            })
    }

    function populateSelectUser() {
        selectUser.options.length = 0

        dataArray = typeUser == "customer" ? userExit : userEntry

        for (index in dataArray) {
            selectUser.options[selectUser.options.length] = new Option(dataArray[index].username + " " + dataArray[index].type, dataArray[index].id)
        }
    }

    entries.forEach(function(entry) {
        entry.addEventListener('keyup', function(event) {

            id = entry.getAttribute('data-id')
            buttonUser.setAttribute('data-id', id)
            buttonUser.setAttribute('data-value', entry.value)
            buttonUser.setAttribute('data-type', 'entry')

            typeUser = "provider"

            if (event.keyCode === 13) {
                blockSelectUser.style.display = "block"
            }

            if (userEntry.length == 0)
                getUsers()
            else
                populateSelectUser()

            modal.show()

        });
    })




    exits.forEach(function(exit) {

        exit.addEventListener('keyup', function(event) {
            id = exit.getAttribute('data-id')
            buttonUser.setAttribute('data-id', id)
            buttonUser.setAttribute('data-value', exit.value)
            buttonUser.setAttribute('data-type', 'exit')

            typeUser = "customer"

            if (event.keyCode === 13) {
                blockSelectUser.style.display = "block"
            }

            if (userExit.length == 0)
                getUsers()
            else
                populateSelectUser()

            modal.show()

        });
    })

    buttonUser.addEventListener("click", function() {



        id = buttonUser.getAttribute('data-id')
        value = buttonUser.getAttribute('data-value')
        type = buttonUser.getAttribute('data-type')
        userId = selectUser.value

        url = `/dashboard/product/add-stock/${id}/${value}`
        if (type == "exit")
            url = `/dashboard/product/exit-stock/${id}/${value}`

        var formData = new FormData()
        formData.append('user_id', userId)
        formData.append('direction', direction.value)
        formData.append('description', description.value)

        fetch(url, {
                method: 'POST',
                body: formData
            }).then((res) => {
                return res.json()
            })
            .then((res) => {
                //problemas con la respuesta
                switch (res.status) {
                    case 400:
                        console.log(res.messages)
                        console.log(res.messages['direction'])

                        errorDirection.innerText = res.messages['direction']
                        errorDescription.innerText = res.messages['description']

                        throw new Error("Errores de validacion")
                        break
                }

                // 200 ok

                blockSelectUser.style.display = "none"
                resetForm()

                document.getElementById("stock_" + res.id).innerText = res.stock
            })
            .catch((res) => {
                console.log(res)
            })

            modal.hide()

    })

    function resetForm() {
        errorDirection.innerText = ""
        errorDescription.innerText = ""
        direction.value = ""
        description.value = ""
    }
</script>

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>