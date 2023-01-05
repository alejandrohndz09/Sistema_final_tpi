<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Canton
 * 
 * @property int $idCanton
 * @property string|null $nombre
 * 
 * @property Collection|Medidore[] $medidores
 * @property Collection|Persona[] $personas
 *
 * @package App\Models
 */
class Canton extends Model
{
	protected $table = 'canton';
	protected $primaryKey = 'idCanton';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function medidores()
	{
		return $this->hasMany(Medidore::class, 'idCanton');
	}

	public function personas()
	{
		return $this->hasMany(Persona::class, 'idCanton');
	}
}
