<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregarCategoriaAPelicula extends Migration
{
    public function up()
    {
        $this->forge->addColumn('peliculas', [
            'COLUMN categoria_id INT(10) UNSIGNED',
            'CONSTRAINT products_categoria_id_foreign FOREIGN KEY(categoria_id) REFERENCES categorias(id)'
        ]);
    }

    public function down()
    {
        $this->forge->dropForeignKey('peliculas', 'peliculas_categoria_id_foreign');
        $this->forge->dropColumn('peliculas', 'categoria_id');
    }
}
