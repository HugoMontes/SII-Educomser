<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrera extends Model
{
    use SoftDeletes;

    protected $table = 'carreras';
    protected $primaryKey = 'codigo';
    public $incrementing = false;

    protected $fillable = ['codigo', 'nombre', 'logo', 'color_hexa', 'costo_mensual'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}