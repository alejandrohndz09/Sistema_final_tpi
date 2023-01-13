<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Usuario extends Authenticatable
{
	use HasFactory;

	protected $table = 'usuario';
	public $timestamps = false;

	protected $casts = [
		'rol' => 'int'
	];

	protected $fillable = [
		'correo',
		'rol',
		'idPersona'
	];

	protected $hidden = [
		'contraseña',
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'idPersona');
	}

	public function setPasswordAttribute($value) {
        $this->attributes['contraseña'] = bcrypt($value);
    }
}
