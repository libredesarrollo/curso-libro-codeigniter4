<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserToProductsControl extends Migration
{
    public function up()
    {
        // $this->forge->addColumn('products_control',[
        //     'user_id' => [
        //         'type' => 'INT',
        //         'constraint' => 10,
        //         'unsigned' => TRUE
        //     ]
        // ]);

        // $this->forge->addForeignKey('user_id','users','id','CASCADE','CASCADE');


        $this->forge->addColumn('products_control',[
            'COLUMN user_id INT(10) UNSIGNED',
            'CONSTRAINT products_control_user_id_foreign FOREIGN KEY(user_id) 
            REFERENCES users(id)'
        ]);


    }

    public function down()
    {
        $this->forge->dropColumn('products_control','user_id');
    }
}
