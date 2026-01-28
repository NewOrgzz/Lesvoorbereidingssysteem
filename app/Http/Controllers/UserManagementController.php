<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    /**
     * Toon een overzicht van alle gebruikers.
     */
    public function index(): View
    {
        $users = User::orderBy('name')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Verwijder een gebruiker (niet jezelf).
     */
    public function destroy(User $user): RedirectResponse
    {
        if ($user->id === Auth::id()) {
            return redirect()->back()
                ->with('error', 'Je kunt je eigen account niet verwijderen.');
        }

        $user->delete();

        return redirect()->back()
            ->with('success', 'Gebruiker is succesvol verwijderd.');
    }

    /**
     * Reset het wachtwoord van een gebruiker en toon het nieuwe wachtwoord.
     */
    public function resetPassword(User $user): RedirectResponse
    {
        $newPassword = Str::random(12);

        $user->password = $newPassword;
        $user->save();

        return redirect()->back()
            ->with('success', "Wachtwoord gereset voor {$user->name}. Nieuw wachtwoord: {$newPassword}");
    }
}

