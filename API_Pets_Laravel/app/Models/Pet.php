<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory;

    use SoftDeletes;

    // altera o nome da tabela buscada pelo modelo
    protected $table = 'pets';

    protected $fillable = ['name', 'weight', 'size', 'age', 'race_id', 'specie_id', 'client_id'];

    protected $hidden = ['created_at','updated_at'];

    public function race() {
        return $this->hasOne(Race::class, 'id', 'race_id');
    }

    public function specie() {
        return $this->hasOne(Specie::class, 'id', 'specie_id');
    }

    public function vaccines(){
        return $this->hasMany(Vaccine::class);
    }
}
