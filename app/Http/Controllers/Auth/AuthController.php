<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use GetCandy\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login() {
        return Inertia::render('Auth/LoginPage');
    }

    public function register() {
        $countries = Country::with(['states'])->whereIn('iso3', ['USA'])->get();

        return Inertia::render('Auth/RegistrationPage', [
            'countries' => $countries
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required:email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return Redirect::route('home');
        }

        return Redirect::back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout() {
        Auth::logout();
        return Redirect::route('home');
    }

    public function store(Request $request)
    {
        $account_data = $request->validate([
            'email' => 'string|required|email|unique:users',
            'password' => 'string|required|confirmed|min:8'
        ]);

        $customer_data = $request->validate([
            'title' => 'string|required|min:2',
            'first_name' => 'string|required|min:2',
            'last_name' => 'string|required|min:2',
            'company_name' => 'string|min:2|nullable',
        ]);

        $address_data = $request->validate([
            'line_one' => 'string|required|min:5',
            'line_two' => 'string|nullable',
            'city' => 'string|required|min:2',
            'state' => 'string|required|min:2',
            'postcode' => 'string|required|min:5',
            'country_id' => 'integer|required',
            'contact_phone' => 'string|min:10|nullable'
        ]);

        // Create an account
        $user = User::create($account_data);

        // Create a customer profile
        $customer = $user->customers()->create($customer_data);

        // Create a default address for the customer
        $customer->addresses()->create(array_merge($customer_data, $address_data, [
            'shipping_default' => true,
            'billing_default' => true
        ]));

        // Log the new user into their account
        Auth::login($user);

        return Redirect::route('home');
    }
}
