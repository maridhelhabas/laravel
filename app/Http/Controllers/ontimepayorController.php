<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ontimepayor;

class ontimepayorController extends Controller
{
    public function index()
    {
        $debtors = ontimepayor::orderBy('id','desc')->paginate(5);
        return view('debtors.index', compact('debtors'));
    }

    public function create()
    {
        return view('debtors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'date'=>'required',
            'amount'=>'required',
            'remarks'=>'required'
        ]);

        ontimepayor::create($request->post());
        return redirect()->route('debtors.index')->with('success','Debtor is added');
    }

    public function show(ontimepayor $ontimepayor)
    {
        return view('debtors.show', compact('ontimepayor'));
    }

    public function edit(ontimepayor $ontimepayor)
    {
        return view('debtors.edit', compact('ontimepayor'));

    }

    public function update(Request $request, ontimepayor $ontimepayor)
    {
        $request->validate([
            'name'=>'required',
            'date'=>'required',
            'amount'=>'required',
            'remarks'=>'required'
        ]);

        $ontimepayor->fill([
            'name' => $request->name,
            'date' => $request->date,
            'amount' => $request->amount,
            'remarks' => $request->remarks,
        ])->save();

        return redirect()->route('debtors.index')->with('success', 'Debtor has been updated!');
    }

    public function destroy(ontimepayor $ontimepayor)
    {
        $ontimepayor->delete();
        return redirect()->route('debtors.index')->with('success','Debtor deleted!');
    }
}
