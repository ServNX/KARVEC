<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use GetCandy\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AddressController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $countries = Country::with(['states'])->whereIn('iso3', ['USA'])->get();

        return Inertia::render('Auth/User/CustomerAddressesPage', [
            'countries' => $countries
        ]);
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $address_data = $request->validate([
            'line_one' => 'string|required|min:5',
            'line_two' => 'string|nullable',
            'city' => 'string|required|min:2',
            'state' => 'string|required|min:2',
            'postcode' => 'string|required|min:5',
            'country_id' => 'integer|required',
            'contact_phone' => 'string|min:10|nullable'
        ]);

        $customer = $user->customers->first();

        $customer->addresses()->create(array_merge([
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name
        ], $address_data));

        return Redirect::back();
    }
}
