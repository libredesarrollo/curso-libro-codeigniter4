<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('categorias')->where('id >', 1)->delete();

        for ($i = 1; $i <= 20; $i++) {
            $data = [
                'titulo' => "Categoría $i"
            ];
            $this->db->table('categorias')->insert($data);
        }
    }
}
