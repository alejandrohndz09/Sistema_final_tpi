<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //Campos que son reueridos
            'correo' => 'required',
            'contraseña' => 'required',
        ];
    }

    public function getCredenciales(){
        //Obtener datos de la base de datos
        $correo = $this->get('correo');
        $pass = $this->get('contraseña');

        //Se retornan los campos
        return $this->only($correo, $pass);
    }
}
