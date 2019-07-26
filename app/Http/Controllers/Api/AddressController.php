<?php


namespace App\Http\Controllers\Api;


use App\Address;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function create(User $user, Request $request)
    {
        // TODO This duplicates records unnecessarily. Should save the correct address.
        $address = new Address($request->post());
        $address->primary = true;

        $user->addresses()->save($address);

        return response()->json($user->addresses);
    }
}
