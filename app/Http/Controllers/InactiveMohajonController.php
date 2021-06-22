<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Controllers\Mohajon\Requests\CreateMohajonRequest;
use App\FishRepository\Mohajon\Repositories\MohajonRepository;
use App\FishRepository\Mohajon\Repositories\Interfaces\MohajonInterface;

use App\Models\Mohajon;

class InactiveMohajonController extends Controller

    {
   private $dueRepo;
  /******************************/

    public function __construct(MohajonInterface $mohajonRepository)
      {
        $this->mohajonRepo = $mohajonRepository;
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     { 
        $mohajons = Mohajon::where('status', '0')->get();
		return view('Admin.Delete.mohajon_inactive',compact('mohajons'));
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
        {

        $update = Mohajon::where("id", $request->id)->update([
            "status" =>1,
         
        ]);
        if($update){
                return response()->json("success");
            }

}
}
