<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCost;
use App\Models\Cost;

class BudgetCosts extends Controller
{
    public function store(Budget $budget, CreateCost $request)
    {
        $cost = $budget->costs()->create($request->validated());
        return redirect(route('budgets.show', $budget));
    }

    public function create(Budget $budget)
    {
        return view('costs.create')->withBudget($budget);
    }


    public function destroy($budget, $cost)
    {
        Cost::find($cost->id)->remove();
        return redirect()->route('budgets.show', $budget);
    }


    public function edit($budget, $cost)
    {
        return view('costs.edit', ['cost' => Cost::find($cost), 'budget' => $budget]);
    }

    public function update(Request $request, $budget, $cost)
    {
        Cost::where('id', $cost)
            ->update($request->validate([
                'name' => 'required',
                'money' => 'required',
            ]));


        return redirect()->route('budgets.show', $budget);
    }
}
