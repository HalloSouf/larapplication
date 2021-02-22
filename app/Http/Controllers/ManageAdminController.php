<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ManageAdminController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse|Response
     */
    public function update(Request $request, int $id)
    {
        $user = User::find($id);
        $user->role = 2;
        $user->save();
        return Redirect::back()->with('success', 'Deze gebruiker is nu ook een administrator');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        if (Auth::id() == $id) return Redirect::back()->with('error', 'Je kan geen admin van jezelf verwijderen...');
        $user = User::find($id);
        $user->role = 1;
        $user->save();
        return Redirect::back()->with('success', 'Administrator is succesvol van de gebruiker verwijderd!');
    }
}
