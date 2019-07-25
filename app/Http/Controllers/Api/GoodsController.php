<?php


namespace App\Http\Controllers\Api;


use App\Condition;
use App\Good;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index(int $page = null)
    {
        return response()->json(Good::with(['user', 'condition'])->paginate(50, ['*'], 'page', $page));
    }

    public function create(Request $request)
    {
        $good = (new Good())->fill($request->post());
        $good->user_id = 4;
//        $good->user()->associate(Auth::user());
        $good->condition()->associate(Condition::find($request->post('condition')));
        $good->save();

        return response()->json($good);
    }
}
