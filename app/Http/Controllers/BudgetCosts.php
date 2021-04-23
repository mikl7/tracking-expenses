<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\Budget;
use App\Http\Requests\CreateCost;
use App\Http\Requests\UpdateCost;
use Illuminate\Support\Facades\Auth;

class BudgetCosts extends Controller
{

    public function index(Budget $budget)
    {
        $cost = Cost::where('budget_id', '=', $budget->id)->paginate(5);
        return view('costs.index', ['budget' => $budget, 'cost' => $cost]);
    }

    public function store(Budget $budget, CreateCost $request)
    {

        $cost = Cost::add($request->validated());
        $cost->budget_id = $budget->id;
        $cost->user_id = Auth::user()->id;
        $cost->save();


        return redirect(route('costs.index', $budget));
    }

    public function create(Budget $budget)
    {
        return view('costs.create')->withBudget($budget);
    }


    public function destroy(Budget $budget, Cost $cost)
    {
        Cost::find($cost->id)->delete();
        return redirect()->route('costs.index', $budget);
    }


    public function edit(Budget $budget, Cost $cost)
    {
        return view('costs.edit', ['budget' => $budget, 'cost' => $cost]);
    }

    public function update(Budget $budget, Cost $cost, UpdateCost $request)
    {
        $cost = $budget->costs()->where('id', $cost->id)->update($request->validated());

        return redirect()->route('costs.index', $budget);
    }
}
