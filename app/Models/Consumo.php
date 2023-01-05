<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Consumo
 *
 * @property $lectura_anterior
 * @property $lectura_actual
 * @property $fecha_a_facturar
 * @property $desde
 * @property $hasta
 * @property $monto
 * @property $estado
 * @property $vence
 * @property $idMedidores
 * @property $mora
 *
 * @property Medidore $medidore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Consumo extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['lectura_anterior','lectura_actual','fecha_a_facturar','desde','hasta','monto','estado','vence','idMedidores','mora'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medidore()
    {
        return $this->hasOne('App\Models\Medidore', 'idMedidores', 'idMedidores');
    }
    

}
