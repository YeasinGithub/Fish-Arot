<?php

namespace App\Http\Controllers\LoanGiven;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanGiven;
class LoanGivenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = LoanGiven::orderBy('id', 'DESC')->get();

        return view('Admin.Loan.loan_given', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*return view('Admin.Loan.loan_given');*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new LoanGiven();
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
        $loan = LoanGiven::find($id);
        return response()->json($loan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $loan = LoanGiven::find($request->id);
        $loan->name = $request->name;
        $loan->title = $request->title;
        $loan->phone = $request->phone;
        $loan->save();
        return response()->json($loan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loan = LoanGiven::find($id);
        $loan->delete();
        return response()->json(['success'=>'data hss been deleted']);
    }

    public function amount(Request $request)
    {
        /*return $paikar=LoanGiven::select("due")->where('phone',$request->id);*/


        return LoanGiven::select("due")->where('phone', '=', $request->id) ->orderBy('id', 'desc')
            ->take(1)->get();
    }

    public function editamount(Request $request)
    {
       
        return LoanGiven::select("due")->where('phone', '=', $request->id) ->orderBy('id', 'desc')
            ->take(1)->get();
    }


}
