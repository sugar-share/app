<?php


namespace App\Http\Controllers;

// TODO This should be in API, but we don't have web API auth access yet
use App\Good;
use App\Mail\ItemRequested;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ClaimsController extends Controller
{
    public function create(Request $request)
    {
        /** @var Good $good */
        $good = Good::find($request->post('id'));

        $good->claimed_by = Auth::id();
        $good->save();

        Mail::send(new ItemRequested($good));

        return response()->json($good);
    }
}
