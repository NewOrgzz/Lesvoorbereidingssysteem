<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Dummy data voor nu, later vervangen door echte queries
        $totaalLesvoorbereidingen = 24;
        $komendeLessen = [
            [
                'vak' => 'Wiskunde - 4 HAVO',
                'onderwerp' => 'Kwadratische vergelijkingen',
                'datum' => now()->format('Y-m-d'),
                'tijd' => '13:30 - 14:20',
                'lokaal' => 'B12',
                'label' => 'Vandaag'
            ],
            [
                'vak' => 'Nederlands - 5 VWO',
                'onderwerp' => 'Literatuurgeschiedenis',
                'datum' => now()->addDay()->format('Y-m-d'),
                'tijd' => '09:15 - 10:05',
                'lokaal' => 'A05',
                'label' => 'Morgen'
            ],
            [
                'vak' => 'Biologie - 3 HAVO',
                'onderwerp' => 'Fotosynthese',
                'datum' => now()->addDays(2)->format('Y-m-d'),
                'tijd' => '11:15 - 12:05',
                'lokaal' => 'C03',
                'label' => 'Overmorgen'
            ],
        ];
        $concepten = 5;
        $vakken = 6;
        $activiteiten = [
            [
                'type' => 'aangemaakt',
                'beschrijving' => 'Nieuwe lesvoorbereiding aangemaakt',
                'vak' => 'Wiskunde - Kwadratische vergelijkingen',
                'tijd' => 'Vandaag, 10:42'
            ],
            [
                'type' => 'bewerkt',
                'beschrijving' => 'Lesvoorbereiding bewerkt',
                'vak' => 'Nederlands - Literatuurgeschiedenis',
                'tijd' => 'Gisteren, 15:30'
            ],
            [
                'type' => 'versie',
                'beschrijving' => 'Nieuwe versie aangemaakt',
                'vak' => 'Biologie - Fotosynthese (v2)',
                'tijd' => '2 dagen geleden'
            ],
            [
                'type' => 'verwijderd',
                'beschrijving' => 'Lesvoorbereiding verwijderd',
                'vak' => 'Geschiedenis - Koude Oorlog (concept)',
                'tijd' => '3 dagen geleden'
            ],
        ];

        return view('dashboard', compact(
            'user', 'totaalLesvoorbereidingen', 'komendeLessen', 'concepten', 'vakken', 'activiteiten'
        ));
    }
}