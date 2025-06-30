<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'naam',
        'school_year_id'
    ];

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function lessonPreparations()
    {
        return $this->hasMany(LessonPreparation::class);
    }

    public static function rules()
    {
        return [
            'naam' => 'required|string|max:255',
            'school_year_id' => 'required|exists:school_years,id'
        ];
    }

    public static function messages()
    {
        return [
            'naam.required' => 'De naam van het vak is verplicht',
            'school_year_id.required' => 'Het schooljaar is verplicht',
            'school_year_id.exists' => 'Het geselecteerde schooljaar bestaat niet'
        ];
    }
} 