<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductTag extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id' => [
                'type' => 'INT',
                'unsigned' => TRUE
            ],
            'tag_id' => [
                'type' => 'INT',
                'unsigned' => TRUE
            ]
        ]);

        $this->forge->addForeignKey('product_id', 'products', 'id');
        $this->forge->addForeignKey('tag_id', 'tags', 'id');

        $this->forge->addKey(['product_id', 'tag_id'], true, true);

        $this->forge->createTable('product_tag');
    }

    public function down()
    {
        $this->forge->dropTable('product_tag');
    }
}
