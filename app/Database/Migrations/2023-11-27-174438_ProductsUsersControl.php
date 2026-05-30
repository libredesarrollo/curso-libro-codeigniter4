<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductsUsersControl extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'created_at' => [
                'type' => 'TIMESTAMP'
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP'
            ],
            'product_control_id' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'constraint' => 10
            ],
            'description' => [
                'type' => 'text'
            ],
            'direction' => [
                'type' => 'text'
            ],
        ]);

        $this->forge->addKey('id', TRUE);

        $this->forge->addForeignKey('product_control_id', 'products_control', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('products_users_control');
    }

    public function down()
    {
        $this->forge->dropTable('products_users_control');
    }
}
