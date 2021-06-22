Route::get('/sell/customer_address/', [App\Http\Controllers\Sell\SellController::class,'address']);



public function address(Request $request)
     {      
        
        return $mohajon=Mohajon::select("address")->findOrFail($request->id);

      }

      <!-- js -->
      /*$("select#mohajon_id").change(function(){
      var selectedCountry = $(this).children("option:selected").val();
    
    $.ajax({
      url: "customer_address",
      data: {id:selectedCountry},
      type: "GET",
      dataType: "JSON",
      success: function(response){
        if($.isEmptyObject(response) != null){
          
           $("#mohajon_address").val(response.address);

          }else{
            console.log("errors");
        }
      }
  });
});*/




    