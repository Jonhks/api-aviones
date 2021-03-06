<?php namespace App;

use Illuminate\Database\Eloquent\Model;

// Generalmente cada vez que creamos una clase tenemos que indicar el espacio de nombres
// dónde la estamos creando y suele coincidir con el nombre del directorio.
// El nombre del namespace debe comenzar por UNA LETRA MAYÚSCULA.

// Para más información ver contenido clase Model.php (CTRL + P en Sublime) de Eloquent para ver los atributos disponibles.
// Documentación completa de Eloquent ORM en: http://laravel.com/docs/5.0/eloquent

class Avion extends Model
{
	// Nombre de la tabla en MySQL.
	protected $table='aviones';

	// Eloquent asume que cada tabla tiene una clave primaria con una columna llamada id.
	// Si éste no fuera el caso entonces hay que indicar cuál es nuestra clave primaria en la tabla:
	protected $primaryKey = 'serie';

	// Atributos que se pueden asignar de manera masiva.
	protected $fillable = array('modelo','longitud','capacidad','velocidad','alcance');
	
	// Aquí ponemos los campos que no queremos que se devuelvan en las consultas.
	protected $hidden = ['created_at','updated_at']; 

	// Definimos a continuación la relación de esta tabla con otras.
	// Ejemplos de relaciones:
	// 1 usuario tiene 1 teléfono   ->hasOne() Relación 1:1
	// 1 teléfono pertenece a 1 usuario   ->belongsTo() Relación 1:1 inversa a hasOne()
	// 1 post tiene muchos comentarios  -> hasMany() Relación 1:N 
	// 1 comentario pertenece a 1 post ->belongsTo() Relación 1:N inversa a hasMany()
	// 1 usuario puede tener muchos roles  ->belongsToMany()
	//  etc..


	// Relación de Avión con Fabricante:
	public function fabricante()
	{
		// 1 avión pertenece a un Fabricante.
		// $this hace referencia al objeto que tengamos en ese momento de Avión.
		return $this->belongsTo('App\Fabricante');
	}
}