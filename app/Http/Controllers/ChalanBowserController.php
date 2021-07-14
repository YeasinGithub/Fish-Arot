<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mohajon;
use App\Models\Chalan;
use App\Models\ChalanBad;

class ChalanBowserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mohajons=Mohajon::orderBy('id', 'DESC')->get();
        $chalans=Chalan::get();
        $chalanbads=ChalanBad::get();
        $report=false;
      
        /*return view('Admin.Sell.sell_bowser', compact('mohajons', 'paikars', 'report'));*/
        return view('Admin.Chalan.chalan_bowser', compact('mohajons', 'chalans', 'chalanbads'));
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
        //
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
}
