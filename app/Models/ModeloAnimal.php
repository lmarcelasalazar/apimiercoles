<?php namespace App\Models;

use CodeIgniter\Model;

class ModeloAnimal extends Model {

    protected $table='animales';
    protected $primaryKey='id';

    protected $allowedFields = array('nombreanimal','edad','tipoanimal','comida','descripcion','foto');
}