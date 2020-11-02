<?php

namespace App\Models;

use CodeIgniter\Model;

class PedirCitaModel extends Model {

    protected $table = 'citas';
    protected $primaryKey = 'id_cita';
    protected $allowedFields = [
        'id_mascota',
        'id_doctor',
        'estado',
        'fecha_cita',
        'fecha_registro',
        'id_usuario'
    ];

    protected $returnType = 'array';
}