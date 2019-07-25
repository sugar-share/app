<?php


namespace App\Http\Controllers\Api;


use App\Condition;
use App\Http\Controllers\Controller;

class ConditionController extends Controller
{
    public function index()
    {
        return response()->json(Condition::all());
    }
}
