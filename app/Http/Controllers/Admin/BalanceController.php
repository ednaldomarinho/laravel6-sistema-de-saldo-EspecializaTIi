<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function index()
    {
        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;
        return view('admin.balance.index',compact('amount'));   
    }

    public function deposit()
    {
        return view('admin.balance.deposit');   
    }

    public function depositStore(Request $request)
    {
        
        $balance = auth()->user()->balance()->firstOrCreate([]);
        dd($balance->deposit($request->value));
    }
}