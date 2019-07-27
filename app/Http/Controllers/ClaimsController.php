<?php


namespace App\Http\Controllers;

// TODO This should be in API, but we don't have user API access yet
use App\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaimsController extends Controller
{
    public function create(Request $request)
    {
        /** @var Good $good */
        $good = Good::find($request->post('id'));

        $good->claimed_by = Auth::id();
        $good->save();

        return response()->json($good);
    }
}
