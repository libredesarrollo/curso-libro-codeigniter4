<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCategoryToProduct extends Migration
{
    public function up()
    {
        $this->forge->addColumn('products',[
            'COLUMN category_id INT(10) UNSIGNED',
            'CONSTRAINT products_category_id_foreign FOREIGN KEY(category_id) REFERENCES categories(id)'
        ]);
    }

    public function down()
    {
        $this->forge->dropForeignKey('products','products_category_id_foreign');
        $this->forge->dropColumn('products','category_id');
    }
}
