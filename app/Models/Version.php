<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    protected $fillable = [
        'versie_nummer',
        'inhoud',
        'lesson_preparation_id'
    ];

    public function lessonPreparation()
    {
        return $this->belongsTo(LessonPreparation::class);
    }

    public static function rules()
    {
        return [
            'versie_nummer' => 'required|integer|min:1',
            'inhoud' => 'required|string',
            'lesson_preparation_id' => 'required|exists:lesson_preparations,id'
        ];
    }

    public static function messages()
    {
        return [
            'versie_nummer.required' => 'Het versienummer is verplicht',
            'versie_nummer.integer' => 'Het versienummer moet een geheel getal zijn',
            'versie_nummer.min' => 'Het versienummer moet minimaal 1 zijn',
            'inhoud.required' => 'De inhoud is verplicht',
            'lesson_preparation_id.required' => 'De lesvoorbereiding is verplicht',
            'lesson_preparation_id.exists' => 'De geselecteerde lesvoorbereiding bestaat niet'
        ];
    }
} 