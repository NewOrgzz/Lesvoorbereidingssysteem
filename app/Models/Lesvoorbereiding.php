<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesvoorbereiding extends Model
{
    protected $table = 'lesvoorbereidingen';
    
    protected $fillable = [
        'vak_id', 'titel', 'datum', 'lokaal', 'tijd',
        'groepssamenstelling', 'beginsituatie', 'leerdoelen',
        'voorbereiding', 'werkvorm', 'materiaal_type'
    ];
    protected $casts = ['datum' => 'date', 'tijd' => 'time'];

    public function vak(): BelongsTo
    {
        return $this->belongsTo(Vak::class);
    }

    public function versies(): HasMany
    {
        return $this->hasMany(Lesversie::class);
    }
}
