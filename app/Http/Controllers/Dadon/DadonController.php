<?php

namespace App\Http\Controllers\Dadon;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Requestss;
use App\Http\Controllers\Dadon\Requests\CreateDadonRequest;
use Illuminate\Http\Request;
use App\FishRepository\Dadon\Repositories\DadonRepository;
use App\FishRepository\Dadon\Repositories\Interfaces\DadonInterface;

use App\Models\Dadon;
use App\Models\Paikar;
use App\Models\Mohajon;

class DadonController extends Controller
{
   private $dueRepo;
  /******************************/

    public function __construct(DadonInterface $dadonRepository)
      {
        $this->dadonRepo = $dadonRepository;
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     { 

        $list = $this->dadonRepo->listDadons('created_at', 'desc');
            return view('Admin.Dadon.dadon', [
            'dadons' => $list,
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

        return view('Admin.Dadon.dadon', [ 'dadons' => $this->dadonRepo->listDadons('address', 'asc') ]);
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

        $this->dadonRepo->createDadon($request->except('_token', '_method'));
        return redirect('/dadon/show')->with('msg', 'Dadons Data Saved In Database successfully');


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
        $editData = Dadon::find($id);
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
        $update = Dadon::where("id", $request->id)->update([
            "name" => $request->name,
            "address" => $request->address,
            "date" => $request->date,
            "day" => $request->day,
            "mobile" => $request->mobile,
            "total_amount" => $request->total_amount,
            "paid" => $request->paid,
            "last_total" => $request->last_total,
        ]);
        if($update){
                /*return response()->json("success");*/
                return redirect('/dadon/show');
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

       $category = $this->dadonRepo->findDadonById($request->id);

        if($category->delete()){
                return response()->json("success");
        }else{
                return response()->json("error");
        }

       //  return redirect('/sell/show')->with('msgR', 'Data Deleted successfully');
        
        /*$delete = Sell::where("id", $request->id)->delete();
        if($delete){
                return response()->json("success");
        }else{
                return response()->json("error");
        }*/

    }

}
