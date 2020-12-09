<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $animalPOST=[
		'nombre'=>'required|alpha',
		'edad'=>'required',
		'tipo'=>'required',
		'comida'=>'required',
		'descripcion'=>'required',
		'foto'=>'required'
	];

	public $animalGET=[
		'nombre'=>'required|alpha',
		'edad'=>'required',
		'tipo'=>'required',
		'comida'=>'required',
		'descripcion'=>'required',
		'foto'=>'required'
	];

	public $animalPUT=[
		'nombre'=>'required|alpha',
		'edad'=>'required'
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
