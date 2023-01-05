<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Medidore
 *
 * @property $idMedidores
 * @property $ruta
 * @property $referencia
 * @property $idUsuario
 * @property $idCanton
 *
 * @property Canton $canton
 * @property Consumo[] $consumos
 * @property Usuario $usuario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Medidore extends Model
{
    
    static $rules = [
		'idMedidores' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idMedidores','ruta','referencia','idUsuario','idCanton'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function canton()
    {
        return $this->hasOne('App\Models\Canton', 'idCanton', 'idCanton');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consumos()
    {
        return $this->hasMany('App\Models\Consumo', 'idMedidores', 'idMedidores');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->hasOne('App\Models\Usuario', 'idUsuario', 'idUsuario');
    }
    

}
