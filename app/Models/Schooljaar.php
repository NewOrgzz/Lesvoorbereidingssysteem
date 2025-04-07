<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schooljaar extends Model
{
    protected $table = 'schooljaren';
    
    protected $fillable = ['naam', 'start_datum', 'eind_datum'];
    protected $casts = ['start_datum' => 'date', 'eind_datum' => 'date'];

    public function vakken(): HasMany
    {
        return $this->hasMany(Vak::class);
    }
}
