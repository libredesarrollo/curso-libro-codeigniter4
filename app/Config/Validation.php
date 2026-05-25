<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $categorias = [
        'titulo' => 'required|min_length[3]|max_length[255]'
    ];
    
    public $peliculas = [
        'titulo' => 'required|min_length[3]|max_length[255]',
        'descripcion' => 'required|min_length[3]|max_length[2000]',
        'categoria_id' => 'required|is_natural',
    ];
    
    public $etiquetas = [
        'titulo' => 'required|min_length[3]|max_length[255]',
        'categoria_id' => 'required|is_natural',
    ];

    public $usuarios = [
        'usuario' => 'required|min_length[3]|max_length[20]|is_unique[usuarios.usuario]',
        'email' => 'required|min_length[3]|max_length[70]|is_unique[usuarios.email]',
        'contrasena' => 'required|min_length[5]|max_length[15]',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
