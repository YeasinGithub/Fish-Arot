<?php

namespace App\Http\Controllers\Sell;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sell;
use App\Models\Paikar;
use App\Models\Mohajon;

class SellBowserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      

        /*$mohajons=Mohajon::get();
        $paikars=Paikar::get();
        $sells = Sell::with('mohajon', 'paikar')->latest()->paginate();
        return view('Admin.Sell.sell_bowser', compact('sells', 'mohajons', 'paikars'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$mohajons=Mohajon::get();
        $paikars=Paikar::get();
        $report=false;
      
        return view('Admin.Sell.sell_bowser', compact('mohajons', 'paikars', 'report'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $mohajons=Mohajon::get();
        $paikars=Paikar::get();

        $report=true;
        if ($request->mohajon_id) {
          $sells = Sell::where('mohajon_id', $request->mohajon_id)->get();
        }
        elseif ($request->paikar_id) {
        	$sells = Sell::where('paikar_id', $request->paikar_id)->get();
        }
        else{
        	$sells = Sell::get();
        }
      

        return view('Admin.Sell.sell_bowser', compact('mohajons', 'paikars', 'report', 'sells'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nagadsell  $nagadsell
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data=Sell::with('mohajon', 'paikar')->findOrFail($id);
        return view('Admin.Sell.sell_bowser', compact( 'data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nagadsell  $nagadsell
     * @return \Illuminate\Http\Response
     */
    public function edit(Nagadsell $nagadsell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nagadsell  $nagadsell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nagadsell $nagadsell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nagadsell  $nagadsell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nagadsell $nagadsell)
    {
        //
    }
    public function address(Request $request)
     {      
        
        return $mohajon=Mohajon::select("address")->findOrFail($request->id);

      }
      public function Maddress(Request $request)
     {      
        
        return $paikar=Paikar::select("address")->findOrFail($request->id);

      }
}
