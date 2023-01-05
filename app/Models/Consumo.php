<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Consumo
 * 
 * @property float|null $lectura_anterior
 * @property float|null $lectura_actual
 * @property Carbon|null $fecha_a_facturar
 * @property Carbon|null $desde
 * @property Carbon|null $hasta
 * @property float|null $monto
 * @property string|null $estado
 * @property Carbon|null $vence
 * @property int|null $idMedidores
 * @property float|null $mora
 * 
 * @property Medidor|null $medidore
 *
 * @package App\Models
 */
class Consumo extends Model
{
	protected $table = 'consumo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'lectura_anterior' => 'float',
		'lectura_actual' => 'float',
		'monto' => 'float',
		'idMedidores' => 'int',
		'mora' => 'float'
	];

	protected $dates = [
		'fecha_a_facturar',
		'desde',
		'hasta',
		'vence'
	];

	protected $fillable = [
		'lectura_anterior',
		'lectura_actual',
		'fecha_a_facturar',
		'desde',
		'hasta',
		'monto',
		'estado',
		'vence',
		'idMedidores',
		'mora'
	];

	public function medidor()
	{
		return $this->belongsTo(Medidor::class, 'idMedidores');
	}
}
