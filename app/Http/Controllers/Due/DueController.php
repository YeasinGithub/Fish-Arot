<?php

namespace App\Http\Controllers\Due;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Requestss;
use App\Http\Controllers\Due\Requests\CreateDueRequest;
use Illuminate\Http\Request;
use App\FishRepository\Due\Repositories\DueRepository;
use App\FishRepository\Due\Repositories\Interfaces\DueInterface;

use App\Models\Due;
use App\Models\Sell;
use App\Models\Paikar;

class DueController extends Controller
{
   private $dueRepo;
  /******************************/

    public function __construct(DueInterface $dueRepository)
      {
        $this->dueRepo = $dueRepository;
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {      

        $paikars=Paikar::get();

        $list = $this->dueRepo->listDues('created_at', 'desc');
            return view('Admin.Due.due', [
            'dues' => $list,
            'paikars'=>$paikars,
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

        return view('Admin.Due.due', [ 'dues' => $this->dueRepo->listDues('address', 'asc') ]);
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

        $this->dueRepo->createDue($request->except('_token', '_method'));
        return redirect('/due/show')->with('msg', 'Sells Data Saved In Database successfully');


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
        $editData = Due::find($id);
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
        $update = Due::where("id", $request->id)->update([
            "paiker_id" => $request->paiker_id,
            "address" => $request->address,
            "due_amount_today" => $request->due_amount_today,
            "hal" => $request->hal,
            "total" => $request->total,
            "paid" => $request->paid,
            "total_due" => $request->total_due,
        ]);
        if($update){
                /*return response()->json("success");*/
                return redirect('/due/show');
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

       $category = $this->dueRepo->findDueById($request->id);

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
    public function address(Request $request)
     {      
        return $paikar=Paikar::select("address")->findOrFail($request->id);
        return $sell=Sell::select("arot_total")->findOrFail($request->id);

      }
    public function hal(Request $request)
     {      
        // return $sell=Sell::select("arot_total")->findOrFail($request->id);
        return $sell=Sell::groupBy('paikar_id')
            ->selectRaw('sum(arot_total) as sum')->where('paikar_id',$request->id)
            ->pluck('sum');
      }

}
