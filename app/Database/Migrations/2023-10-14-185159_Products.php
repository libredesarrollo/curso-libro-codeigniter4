<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => 10
            ],
            'description' => [
                'type' => 'TEXT'
            ],
            'entry' => [
                'type' => 'INT',
                'unsigned' => TRUE
            ],
            'exit' => [
                'type' => 'INT',
                'unsigned' => TRUE
            ],
            'stock' => [
                'type' => 'INT',
                'unsigned' => TRUE
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2'
            ],
        ]);

        $this->forge->addKey('id',TRUE);
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
