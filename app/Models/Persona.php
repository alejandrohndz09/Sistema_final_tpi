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
 * @property Collection|Medidor[] $medidores
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Persona extends Model
{
	protected $table = 'personas';
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

	public function medidores()
	{
		return $this->hasMany(Medidor::class, 'idPersona');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'idPersona');
	}

	public function toString()
	{
		return $this->nombre.' '.$this->apellidos;
	}
}
