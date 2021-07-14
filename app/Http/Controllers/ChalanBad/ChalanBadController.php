<?php

namespace App\Http\Controllers\ChalanBad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChalanBad;
use App\Models\Chalan;

class ChalanBadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chalanbads = ChalanBad::orderBy('id', 'DESC')->get();
         $chalans = Chalan::select('last_total')->orderBy('id', 'DESC')->get()->take(1); 
        


        return view('Admin.Chalan.chalan_bad', compact('chalanbads', 'chalans'));
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
        /*return $request->all();
        exit();*/
        $cat = new ChalanBad();
        $cat->mondir = $request->mondir;
        $cat->komition = $request->komition;
        $cat->khajna = $request->khajna;
        $cat->nagad = $request->nagad;
        $cat->koheli = $request->koheli;
        $cat->somity = $request->somity;
        $cat->gari_bara = $request->gari_bara;
        $cat->line_cost = $request->line_cost;
        $cat->parking = $request->parking;
        $cat->haolat = $request->haolat;
        $cat->ice = $request->ice;
        $cat->kuli = $request->kuli;
        $cat->baje_cost = $request->baje_cost;
        $cat->tity_didy = $request->tity_didy;
        $cat->amanot = $request->amanot;
        $cat->duty = $request->duty;
        $cat->total = $request->total;
        $cat->chalan_total = $request->chalan_total;
        $cat->khoros_bad = $request->khoros_bad;
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
        $chalanbad = ChalanBad::find($id);
        return response()->json($chalanbad);
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
        /*return $request->all();
        exit();*/
            $chalanbad = ChalanBad::find($request->id);
            $chalanbad->mondir = $request->mondir;
            $chalanbad->komition = $request->komition;
            $chalanbad->khajna = $request->khajna;
            $chalanbad->nagad = $request->nagad;
            $chalanbad->koheli = $request->koheli;
            $chalanbad->somity = $request->somity;
            $chalanbad->gari_bara = $request->gari_bara;
            $chalanbad->line_cost = $request->line_cost;
            $chalanbad->parking = $request->parking;
            $chalanbad->haolat = $request->haolat;
            $chalanbad->ice = $request->ice;
            $chalanbad->kuli = $request->kuli;
            $chalanbad->baje_cost = $request->baje_cost;
            $chalanbad->tity_didy = $request->tity_didy;
            $chalanbad->amanot = $request->amanot;
            $chalanbad->duty = $request->duty;
            $chalanbad->total = $request->total;
            $chalanbad->chalan_total = $request->chalan_total;
            $chalanbad->khoros_bad = $request->khoros_bad;
            $chalanbad->save();
            return response()->json($chalanbad);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chalanbad = ChalanBad::find($id);
        $chalanbad->delete();
        return response()->json(['success'=>'data hss been deleted']);
    }
}
