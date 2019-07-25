<?php


namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function view(User $user): View
    {
        return view(
            'profile',
            [
                'user' => $user,
                'edit' => $user->id === Auth::id() ? 'true' : 'false'
            ]
        );
    }
}
