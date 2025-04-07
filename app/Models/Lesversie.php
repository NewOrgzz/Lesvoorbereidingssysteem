<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesversie extends Model
{
    protected $fillable = [
        'lesvoorbereiding_id',
        'versie',
        'inleiding',
        'kern',
        'afsluiting',
        'studentactiviteiten',
        'docentactiviteiten',
        'hulpmiddelen',
        'opmerkingen',
        'aandachtspunten'
    ];

    public function lesvoorbereiding(): BelongsTo
    {
        return $this->belongsTo(Lesvoorbereiding::class);
    }
}
