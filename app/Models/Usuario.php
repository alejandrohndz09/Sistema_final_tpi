<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $idUsuario
 * @property string $correo
 * @property string $contraseña
 * @property int|null $rol
 * @property string|null $idPersona
 * 
 * @property Persona|null $persona
 * @property Collection|Medidore[] $medidores
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	protected $primaryKey = 'idUsuario';
	public $timestamps = false;

	protected $casts = [
		'rol' => 'int'
	];

	protected $fillable = [
		'correo',
		'contraseña',
		'rol',
		'idPersona'
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'idPersona');
	}

	public function medidores()
	{
		return $this->hasMany(Medidore::class, 'idUsuario');
	}
}
