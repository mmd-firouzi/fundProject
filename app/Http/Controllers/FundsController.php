<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fund;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Gate;

class FundsController extends Controller
{
    public function create()
    {
        return view('fund.create');
    }

    public function store(Request $request)
    {

#       $request->validate([
#           'fund_name' => 'required|string|max:255',
#           'admin_name' => 'required|string|max:255',
#           'entry' => 'required|integer',
#           'monthly_pay' => 'required|integer',
#           'bank_account' => 'required|integer',
#           'max_member' => 'required|integer',
#           'info' => 'nullable|string|max:255',
#        ]);

        $fund = new Fund();
        $fund->fund_name = $request->input('fundName');
        $fund->admin_name = $request->input('adminName');
        $fund->entry = $request->input('entry');
        $fund->monthly_pay = $request->input('monthlyPay');
        $fund->bank_account = $request->input('bankAccount');
        $fund->max_member = $request->input('maxMember');
        $fund->info = $request->input('info');

        $fund->create_date = now();
        $fund->total_amount = 0;


        $fund->save();

        return redirect()->route('landing.page')->with('success', 'Fund created successfully!');


    }

    public function index()
    {
        $funds = Fund::all();

        return view('funds.index', compact('funds'));
    }

    public function show($id)
    {
        $fund = Fund::findOrFail($id);
        return view('funds.show', compact('fund'));
    }

    public function destroy($id) {

        // $fund = fund::find($id);
        // if (Gate::denies('delete', $fund)) {
        //     echo "You are not allowed to delete this fund.";
        // }
        // if ($fund) {
        //     $fund->forceDelete();
        //     return redirect()->route('showFunds')->with('success', 'Fund deleted successfully!');
        // } else {
        //     return redirect()->route('showFunds')->with('error', 'Fund not found.');
        // }

        DB::delete("DELETE FROM funds WHERE ID = :id", ['id' => $id]);
        return redirect()->route('showFunds')->with('success', 'Fund deleted successfully!');
    }
}
