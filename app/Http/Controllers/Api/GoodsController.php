<?php


namespace App\Http\Controllers\Api;


use App\Condition;
use App\Good;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoodsController extends Controller
{
    public function index(int $page = null)
    {
        return response()->json(Good::paginate(50, ['*'], 'page', $page));
    }

    public function create(Request $request)
    {
        $good = (new Good())->fill($request->post());
        $good->save();
        $good->owner()->associate(Auth::user());
        $good->condition()->associate(Condition::find($request->post('condition')));

        return response()->json($good);
    }
}
