<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function read(User $user): JsonResponse
    {
        return response()->json($user);
    }

    public function update(User $user, Request $request): JsonResponse
    {
        $user->fill($request->post())->save();

        return response()->json($user);
    }
}
