<?php

namespace App\Http\Controllers\CreditDebit;

use App\Http\Controllers\Controller;
use App\Models\CreditDebit;
use App\Models\Sell;
use App\Models\Paikar;

class CreditDebitController extends Controller
{
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {      

        return view('Admin.CreditDebit.credit_debit');

      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$cat = new LoanGiven();
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
        }*/


    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

       

    }
    

}
