<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    
    protected $table = 'personas';

  
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'direccion',
        'telefono',
    ];

   
    public $timestamps = true;

    /**
    
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehiculosConducidos()
    {
        return $this->hasMany(Vehiculo::class, 'conductor_id');
    }

    /**
    
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehiculosPropietarios()
    {
        return $this->hasMany(Vehiculo::class, 'propietario_id');
    }
}
