<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View|\Illuminate\Http\RedirectResponse
    {
        return redirect()->route('instellingen');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Update user settings: notificaties, thema, taal
     */
    public function updateSettings(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email_notifications' => ['nullable', 'boolean'],
            'push_notifications' => ['nullable', 'boolean'],
            'news_notifications' => ['nullable', 'boolean'],
            'theme' => ['required', 'in:light,dark,system'],
            'language' => ['required', 'in:nl,en,de,fr'],
        ]);

        $user = $request->user();
        $user->email_notifications = $request->boolean('email_notifications');
        $user->push_notifications = $request->boolean('push_notifications');
        $user->news_notifications = $request->boolean('news_notifications');
        $user->theme = $validated['theme'];
        $user->language = $validated['language'];
        $user->save();

        return back()->with('status', 'settings-updated');
    }
}
