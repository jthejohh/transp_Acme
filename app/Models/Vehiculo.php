<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

   
    protected $table = 'vehiculos';

   
    protected $fillable = [
        'placa',
        'color',
        'marca',
        'tipo',
        'conductor_id',
        'propietario_id',
    ];

  
    public $timestamps = true;

    /**
    .
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conductor()
    {
        return $this->belongsTo(Persona::class, 'conductor_id');
    }

    /**
     
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propietario()
    {
        return $this->belongsTo(Persona::class, 'propietario_id');
    }
}
