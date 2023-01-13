<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Usuario
 * 
 * @property string $idUsuario
 * @property string $correo
 * @property string $contraseña
 * @property int|null $rol
 * @property string|null $idPersona
 * 
 * @property Persona|null $persona
 *
 * @package App\Models
 */
class Usuario extends Authenticatable
{
	use HasFactory;
	protected $table = 'usuario';
	protected $primaryKey = 'idUsuario';
	public $incrementing = false;
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

	protected $hidden = [
		
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'idPersona');
	}

	/*public function setPasswordAttribute($value) {
        $this->attributes['contraseña'] = bcrypt($value);
    }*/
}
