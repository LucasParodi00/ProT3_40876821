<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'codUsuario';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'nombre_completo',
        'usuario',
        'correo',
        'telefono',
        'direccion', 
        'password'
    ];

    protected $useTimestamps = false;

    // Reglas de validación ajustadas
    protected $validationRules = [
        'nombre_completo' => 'required|min_length[3]|max_length[100]',
        'correo'          => 'required|valid_email|max_length[100]',
        'telefono'        => 'required|min_length[10]|max_length[15]',
        'direccion'       => 'required|max_length[100]',
        'password'        => 'permit_empty|min_length[3]|max_length[60]'
    ];
    
    
    protected $validationMessages = [
        'nombre_completo' => [
            'required'   => 'El nombre completo es obligatorio.',
            'min_length' => 'El nombre completo debe tener al menos 3 caracteres.',
            'max_length' => 'El nombre completo no puede exceder los 100 caracteres.'
        ],
        'usuario' => [
            'required'   => 'El nombre de usuario es obligatorio.',
            'min_length' => 'El nombre de usuario debe tener al menos 3 caracteres.',
            'max_length' => 'El nombre de usuario no puede exceder los 10 caracteres.',
            'is_unique'  => 'El nombre de usuario ya está registrado.'
        ],
        'correo' => [
            'required'    => 'El correo electrónico es obligatorio.',
            'valid_email' => 'Debes proporcionar un correo electrónico válido.',
            'max_length'  => 'El correo electrónico no puede exceder los 100 caracteres.'
        ],
        'telefono' => [
            'required'   => 'El número de teléfono es obligatorio.',
            'min_length' => 'El número de teléfono debe tener al menos 10 caracteres.',
            'max_length' => 'El número de teléfono no puede exceder los 15 caracteres.'
        ],
        'direccion' => [
            'required'   => 'La dirección es obligatoria.',
            'max_length' => 'La dirección no puede exceder los 100 caracteres.'
        ],
        'password' => [
            'permit_empty' => 'La contraseña es opcional.',
            'min_length'   => 'La contraseña debe tener al menos 3 caracteres.',
            'max_length'   => 'La contraseña no puede exceder los 60 caracteres.'
        ]
    ];

    protected $skipValidation = false;
}
