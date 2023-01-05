<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Medidore
 * 
 * @property int $idMedidores
 * @property string|null $ruta
 * @property string|null $referencia
 * @property string|null $idPersona
 * @property int|null $idCanton
 * 
 * @property Canton|null $canton
 * @property Persona|null $persona
 * @property Consumo $consumo
 *
 * @package App\Models
 */
class Medidor extends Model
{
	protected $table = 'medidores';
	protected $primaryKey = 'idMedidores';
	public $timestamps = false;

	protected $casts = [
		'idCanton' => 'int'
	];

	protected $fillable = [
		'ruta',
		'referencia',
		'idPersona',
		'idCanton'
	];

	public function canton()
	{
		return $this->belongsTo(Canton::class, 'idCanton');
	}

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'idPersona');
	}

	public function consumo()
	{
		return $this->hasOne(Consumo::class, 'idMedidores');
	}
}
