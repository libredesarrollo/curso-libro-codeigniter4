<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PeliculaSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('peliculas')->where('id >=', 1)->delete();

        for ($i = 1; $i <= 20; $i++) {
            $data = [
                'titulo' => "Pelicula $i",
                'descripcion' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...",
                'categoria_id' => 1
            ];
            $this->db->table('peliculas')->insert($data);
        }
    }
}
