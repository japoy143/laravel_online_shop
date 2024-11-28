<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\File;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'profile' => ['required', File::types(['jpg', 'png', 'svg', 'jpeg'])],
            'contactnumber' => ['required', 'min:11', 'max:11'],
            'userrole' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $logoPath = $request->profile->store('Profiles');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_image' => $logoPath,
            'contactnumber' => $request->contactnumber,
            'isadmin' => $request->userrole == "seller" ? true : false,

        ]);



        //handling customer and seller
        if ($request->userrole == 'seller') {
            Seller::create([
                'email' => $user->email,
                'contactnumber' => $user->contactnumber,
                'user_id' => $user->id,
            ]);
        }


        event(new Registered($user));



        Auth::login($user);

        return redirect('/');
    }
}
