<?php 

namespace app\models;
use Yii;
use yii\base\model;

class ValidarFormularioAjax extends model{
	public $nombre;
	public $email;

	public function rules()
	{
		return [
			['nombre', 'required', 'message' => 'Campo requerido'],
			['nombre', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Minimo 3 y maximo 50 caracteres' ],
			['nombre', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y números'],
			['email', 'required', 'message' => 'Campo requerido'],
			['email', 'match', 'pattern' => "/^.{5,80}$/", 'message' => 'Minimo 5 y maximo 80 caracteres'],
			['email', 'email', 'message' => 'Formato no válido'],
			['email','email_existe'],
		];
	}

	public function attributes()
	{
		return[
			'nombre' => 'Nombre: ',
			'email' => 'Email: ',
		];
	}

	public function email_existe($attributes, $params)
	{
		$email = ["manuel@mail.com", "antonio@mail.com"];
		foreach($email as $val)
		{
			if($this->email == $val)
			{
				$this->addError($attributes, "El email selecionado existe");
			}
			else
			{
				return false;
			}
		}
	}
}