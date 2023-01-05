<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Persona
 * 
 * @property string $idPersona
 * @property string|null $nombre
 * @property string|null $apellidos
 * @property string|null $telefono
 * @property int|null $idCanton
 * 
 * @property Canton|null $canton
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Persona extends Model
{
	protected $table = 'persona';
	protected $primaryKey = 'idPersona';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idCanton' => 'int'
	];

	protected $fillable = [
		'nombre',
		'apellidos',
		'telefono',
		'idCanton'
	];

	public function canton()
	{
		return $this->belongsTo(Canton::class, 'idCanton');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'idPersona');
	}
}
