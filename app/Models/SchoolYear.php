<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'naam',
        'start_datum',
        'eind_datum'
    ];

    protected $casts = [
        'start_datum' => 'date',
        'eind_datum' => 'date'
    ];

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public static function rules()
    {
        return [
            'naam' => 'required|string|max:255',
            'start_datum' => 'required|date',
            'eind_datum' => 'required|date|after:start_datum'
        ];
    }

    public static function messages()
    {
        return [
            'naam.required' => 'De naam van het schooljaar is verplicht',
            'start_datum.required' => 'De startdatum is verplicht',
            'start_datum.date' => 'De startdatum moet een geldige datum zijn',
            'eind_datum.required' => 'De einddatum is verplicht',
            'eind_datum.date' => 'De einddatum moet een geldige datum zijn',
            'eind_datum.after' => 'De einddatum moet na de startdatum liggen'
        ];
    }
} 