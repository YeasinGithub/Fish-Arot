<?php

namespace App\Http\Controllers\Mohajon;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Requestss;
use App\Http\Controllers\Mohajon\Requests\CreateMohajonRequest;
use Illuminate\Http\Request;
use App\FishRepository\Mohajon\Repositories\MohajonRepository;
use App\FishRepository\Mohajon\Repositories\Interfaces\MohajonInterface;

use App\Models\Mohajon;

class MohajonController extends Controller
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

        $list = $this->mohajonRepo->listMohajons('created_at', 'desc');
            return view('Admin.Mohajon.mohajon', [
            'mohajons' => $list,
            ]);

        //return view('Admin.Sell.sells',compact('lists', $lists));

    /*  $mohajons=Mohajon::get();
        $paikars=Paikar::get();

        $sells = Due::with('mohajon', 'paikar')->latest()->paginate();
        return view('Admin.Due.sells', compact('sells', 'mohajons', 'paikars'));*/

        //return $list;
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$mohajons=Mohajon::get();
        $paikars=Paikar::get();*/

        return view('Admin.Mohajon.mohajon', [ 'mohajons' => $this->mohajonRepo->listMohajons('address', 'asc') ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*return $request->all();*/

        $this->mohajonRepo->createMohajon($request->except('_token', '_method'));
        return redirect('/mohajon/show')->with('msg', 'Mohajons Data Saved In Database successfully');


        /*$insert = Sell::insert([
            "mohajon_id" => $request->mohajon_id,
            "paikar_id" => $request->paikar_id,
            "address" => $request->address,
            "fish_weight" => $request->fish_weight,
            "price_per_kg" => $request->price_per_kg,
            "total" => $request->total,
            "arot_total" => $request->arot_total,
        ]);

        if($insert){
            return response()->json("success");
        }else{
            return response()->json("error");
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

      /*return view('Admin.Sell.sellEdit', [
            'sells' => $this->sellRepo->listSells('mohajon_id', 'asc', $id),
            'sell' => $this->sellRepo->findSellById($id)
        ]);*/
        $id = $request->id;
        $editData = Mohajon::find($id);
        return $editData;
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
       // @dd($request->all());
        $update = Mohajon::where("id", $request->id)->update([
            "mohajon_name" => $request->mohajon_name,
            "address" => $request->address,
        ]);
        if($update){
                /*return response()->json("success");*/
                return redirect('/mohajon/show');
        }else{
                return response()->json("error");
        }
        /*$list = $this->sellRepo->findSellById($id);
        $update = new SellsRepository($list);
        $update->updateSell($request->except('_token', '_method'));

        return redirect('/sell/show')->with('msg', 'Sells Data Updated successfully');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
        {

        $update = Mohajon::where("id", $request->id)->update([
            "status" =>0,
         
        ]);
        if($update){
                return response()->json("success");
                /*return redirect('/mohajon/show');
        }else{
                return response()->json("error");
        }





       // $category = $this->mohajonRepo->findMohajonById($request->id);



       //  if($category->delete()){
                
       //          return response()->json("success");

       //  }else{
       //          return response()->json("error");
       //  }

       //  return redirect('/sell/show')->with('msgR', 'Data Deleted successfully');
        
        /*$delete = Sell::where("id", $request->id)->delete();
        if($delete){
                return response()->json("success");
        }else{
                return response()->json("error");
        }*/

    }

}
}

