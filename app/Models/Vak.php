<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vak extends Model
{
    protected $table = 'vakken';
    
    protected $fillable = [
        'schooljaar_id',
        'naam',
        'beschrijving'
    ];

    public function schooljaar(): BelongsTo
    {
        return $this->belongsTo(Schooljaar::class);
    }

    public function lesvoorbereidingen(): HasMany
    {
        return $this->hasMany(Lesvoorbereiding::class);
    }
}
