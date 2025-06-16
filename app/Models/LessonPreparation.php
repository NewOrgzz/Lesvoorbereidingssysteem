<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonPreparation extends Model
{
    use HasFactory;

    protected $fillable = [
        'titel',
        'beschrijving',
        'subject_id',
        'user_id'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function versions()
    {
        return $this->hasMany(Version::class);
    }

    public static function rules()
    {
        return [
            'titel' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'subject_id' => 'required|exists:subjects,id'
        ];
    }

    public static function messages()
    {
        return [
            'titel.required' => 'De titel is verplicht',
            'beschrijving.required' => 'De beschrijving is verplicht',
            'subject_id.required' => 'Het vak is verplicht',
            'subject_id.exists' => 'Het geselecteerde vak bestaat niet'
        ];
    }
} 