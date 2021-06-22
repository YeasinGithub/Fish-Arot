<?php

namespace App\Http\Controllers\LoanTaken;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanTake;

class LoanTakenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = LoanTake::orderBy('id', 'DESC')->get();

        return view('Admin.Loan.loan_taken', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new LoanTake();
        $cat->name = $request->name;
        $cat->phone = $request->phone;
        $cat->date = $request->date;
        $cat->loan_amount = $request->loan_amount;
        $cat->paid = $request->paid;
        $cat->due = $request->due;
        $cat->save();

        if($cat){
            return response()->json($cat);
        }else{
            return response()->json($cat);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function amount(Request $request)
    {
        /*return $paikar=LoanGiven::select("due")->where('phone',$request->id);*/


        return LoanTake::select("due")->where('phone', '=', $request->id) ->orderBy('id', 'desc')
            ->take(1)->get();
    }
}
