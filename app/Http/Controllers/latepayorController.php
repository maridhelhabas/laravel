<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\latepayor;

class latepayorController extends Controller
{
    public function index()
    {
        $latepayor = latepayor::orderBy('id','desc')->paginate(5);
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

        latepayor::create($request->post());
        return redirect()->route('debtors.index')->with('success','Debtor is added');
    }

    public function show(latepayor $latepayor)
    {
        return view('latepayor.show', compact('debtors'));
    }

    public function edit(latepayor $latepayor)
    {
        return view('latepayor.edit', compact('debtors'));

    }

    public function update(Request $request, latepayor $latepayor)
    {
        $request->validate([
            'name'=>'required',
            'date'=>'required',
            'amount'=>'required',
            'remarks'=>'required'
        ]);

        $latepayor->fill([
            'name' => $request->name,
            'date' => $request->date,
            'amount' => $request->amount,
            'remarks' => $request->remarks,
        ])->save();

        return redirect()->route('debtors.index')->with('success', 'Debtor has been updated!');
    }

    public function destroy(latepayor $latepayor)
    {
        $latepayor->delete();
        return redirect()->route('debtors.index')->with('success','Debtor deleted!');
    }
}
