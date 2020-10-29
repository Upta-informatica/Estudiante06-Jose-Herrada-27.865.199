<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistroModel extends Model {

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = [
        'nombre',
        'apellido',
        'clave',
        'correo',
        'numero',
        'tipo_usuario',
        'cedula',
        'estado',
        'fecha_creacion',
        'token'
    ];

    protected $returnType = 'array';
}