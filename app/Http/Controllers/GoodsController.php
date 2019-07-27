<?php


namespace App\Http\Controllers;


use App\Category;
use App\Condition;
use App\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// TODO Should also be a API, but again...
class GoodsController extends Controller
{
    public function index(int $page = null)
    {
        return response()->json(Good::with(['user', 'condition', 'category'])->unclaimed()->paginate(50, ['*'], 'page', $page));
    }

    public function create(Request $request)
    {
        $good = (new Good())->fill($request->post());
        $good->user()->associate(Auth::user());
        $good->condition()->associate(Condition::find($request->post('condition')));
        $good->category()->associate(Category::find($request->post('category')));
        $good->save();

        return response()->json($good);
    }
}
