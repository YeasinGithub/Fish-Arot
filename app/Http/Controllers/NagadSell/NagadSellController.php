<?php

namespace App\Http\Controllers\NagadSell;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Nagadsell;
use App\Models\Paikar;
use App\Models\Mohajon;

class NagadSellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mohajons=Mohajon::get();
        $paikars=Paikar::get();
        $nagads = Nagadsell::with('mohajon', 'paikar')->latest()->paginate();
        return view('Admin.NagadSell.nagad_sell', compact('nagads', 'mohajons', 'paikars'));
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

        return view('Admin.NagadSell.nagad_sell', compact('mohajons', 'paikars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*return $request->all();*/
        $insert = Nagadsell::insert([
            "mohajon_id" => $request->mohajon_id,
            "mohajon_address" => $request->mohajon_address,
            "paikar_id" => $request->paikar_id,
            "paikar_address" => $request->paikar_address,
            "fish_weight" => $request->fish_weight,
            "price_per_kg" => $request->price_per_kg,
            "total" => $request->total,
            "arot_total" => $request->arot_total,
        ]);

        if($insert){
            return response()->json("success");
        }else{
            return response()->json("error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nagadsell  $nagadsell
     * @return \Illuminate\Http\Response
     */
    public function show(Nagadsell $nagadsell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nagadsell  $nagadsell
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $editData = Nagadsell::find($id);
        return $editData;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nagadsell  $nagadsell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // @dd($request->all());
        $update = Nagadsell::where("id", $request->id)->update([
            /*"mohajon_id" => $request->mohajon_id,
            "mohajon_address" => $request->mohajon_address,
            "paikar_id" => $request->paikar_id,
            "paikar_address" => $request->paikar_address,*/
            "fish_weight" => $request->fish_weight,
            "price_per_kg" => $request->price_per_kg,
            "total" => $request->total,
            "arot_total" => $request->arot_total,
        ]);
        if($update){
            return redirect('/nagad/');
                /*return response()->json("success");*/
        }else{
                return response()->json("error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nagadsell  $nagadsell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $delete = Nagadsell::where("id", $request->id)->delete();
        if($delete){
                return response()->json("success");
        }else{
                /*return response()->json("error");*/
                return redirect()->back();
        }
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
