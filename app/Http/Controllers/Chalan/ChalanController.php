<?php

namespace App\Http\Controllers\Chalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chalan;
use App\Models\Mohajon;

class ChalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chalans = Chalan::orderBy('id', 'DESC')->get();
        $mohajons=Mohajon::get();
        return view('Admin.Chalan.chalan', compact('mohajons','chalans'));
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
        /*return $request->all();*/
        foreach ($request->addmore as $key => $value) {
            $arr1 = array('mohajon_id' => $request->mohajon_id, 
                           'mohajon_address' => $request->mohajon_address,
                           'total_kg' => $request->total_kg,
                           'last_total' => $request->last_total,
                           'date' => $request->date
                         );

            $test=$value + $arr1;

            Chalan::create($test);
      
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
    public function edit(Request $request)
    {
        $id = $request->id;
        $editData = Chalan::find($id);
        return $editData;
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
        // @dd($request->all());
        $update = Chalan::where("id", $request->id)->update([
            "fish_name" => $request->fish_name,
            "kg_gram" => $request->kg_gram,
            "rate_per_kg" => $request->rate_per_kg,
            "total_taka" => $request->total_taka,
        ]);
        if($update){
                /*return response()->json("success");*/
                return redirect('/chalan');
        }else{
                return response()->json("error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loan = Chalan::find($id);
        $loan->delete();
        return response()->json(['success'=>'data hss been deleted']);

    }


    public function address(Request $request)
     {      
        return $mohajon=Mohajon::select("address")->findOrFail($request->id);

      }
}
