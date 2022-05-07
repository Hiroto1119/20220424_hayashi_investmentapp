<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'company_name' => ['string', 'max:255'],
            'position' => ['string', 'max:255'],
            'investertag_id' => ['string', 'max:255'],
            'entrepreneurtag_id' => ['string', 'max:255'],
            'description' => ['string', 'max:255'],
            'purpose' => ['boolean', 'max:255'],
            'hidden' => ['boolean', 'max:255']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'company_name' => $request->company_name,
            'position' => $request->position,
            'investertag_id' => $request->investertag_id,
            'entrepreneurtag_id' => $request->entrepreneurtag_id,
            'description' => $request->description,
            'purpose' => $request->purpose,
            'hidden' => $request->hidden
        ]);

        event(new Registered($user));

        Auth::login($user);


        // 林追加
        // $userData = User::all();
        //     return view('dashboard', ['userData' => $userData]);

        return redirect(RouteServiceProvider::HOME);
    }
}
