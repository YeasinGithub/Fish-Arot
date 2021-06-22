$(function(){
  $("#sell-us-form").on("submit", function(e) {
    /*alert('okk');*/
    e.preventDefault();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

    $('#saveSell').html('Sending..');

      $.ajax({
        url: 'save',
        type: "POST",
        data: $('#sell-us-form').serialize(),
        success: (response) => {
          location.reload();
            this.reset();
            $("#sell-us-form")[0].reset();
            $('#saveSell').html('Submit');
        },
      });

  });//end of add submit

  /*---Sum or multiple---*/
   $(document).on("keyup", "#Dweight", function(arg){
    var weight=$(this).val();
    var kg=$("#Dper_kg").val();
    if (kg!=0) {
      var total = weight*kg;
    
    $('#Dtotal').val(total);
    if (kg!=0) {
      $("#Darot").val(total+(weight*2));
    }
    else{
     $("#Darot").val(0);
    }
  }

  });

  $(document).on("keyup", "#Dper_kg", function(arg){
    var kg=$(this).val();
    var weight=$("#Dweight").val();
  if (weight!=0) {
    var total=weight*kg;

    $('#Dtotal').val(total);
  if (kg!=0) {
    $("#Darot").val(total+(weight*2));
  }
  else{
     $("#Darot").val(0);
      }
    }
  });
/*---end Sum--*/

  /*---submit Add Modal---*/
  /*$("#addStudent").on("submit", function(e) {
    e.preventDefault();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

    $('#ModalsaveSell').html('Sending..');

      $.ajax({
        url: 'save',
        type: "POST",
        data: $('#addStudent').serialize(),
        success: (response) => {
          location.reload();
            this.reset();
            $("#addStudent")[0].reset();
            $('#ModalsaveSell').html('Submit');
        },
      });

});*/
  /*--End Modal Submit---*/

  /*----Modal Sum-----*/
 /*$(document).on("keyup", "#Mweight", function(arg){
  var weight=$(this).val();
  var kg=$("#Mper_kg").val();
  if (kg!=0) {
    var total = weight*kg;
  
  $('#Mtotal').val(total);
  if (kg!=0) {
    $("#Marot").val(total+(weight*2));
  }
  else{
   $("#Marot").val(0);
  }
}

});

$(document).on("keyup", "#Mper_kg", function(arg){
  var kg=$(this).val();
  var weight=$("#Mweight").val();
if (weight!=0) {
  var total=weight*kg;

  $('#Mtotal').val(total);
if (kg!=0) {
  $("#Marot").val(total+(weight*2));
}
else{
   $("#Marot").val(0);
    }
  }
});*/
/*--End Sum Modal---*/


/*---------------Edit Data-----------------------*/
 $(document).on("click", "#sellId", function(arg){
  /*alert('okkks');*/
   arg.preventDefault();

  var id = $(this).data("id");
  var url = $(this).attr("href");

  $.ajax({
    url: url,
    data: {id:id},
    type: "GET",
    dataType: "JSON",
    success: function(response){
          $("#editSell").modal("show");
          $("#editSellName").text("Update 's Data");
          /*$('#Emohajon option[value='+response.mohajon_id+']').attr('selected', 'selected');
          $("#EMaddress").val(response.mohajon_address);
          $('#Epaikar option[value='+response.paikar_id+']').attr('selected', 'selected');
          $("#EPaddress").val(response.paikar_address);*/
          $("#Eweight").val(response.fish_weight);
          $("#Eper_kg").val(response.price_per_kg);
          $("#Etotal").val(response.total);
          $("#Earot").val(response.arot_total);

          $("#paikarId").val(response.id);
      
    }
  });
 });//end of edit
 /*----Edit Modal Sum-----*/
 $(document).on("keyup", "#Eweight", function(arg){
  var weight=$(this).val();
  var kg=$("#Eper_kg").val();
  if (kg!=0) {
    var total = weight*kg;
  
  $('#Etotal').val(total);
  if (kg!=0) {
    $("#Earot").val(total+(weight*2));
  }
  else{
   $("#Earot").val(0);
  }
}

});

$(document).on("keyup", "#Eper_kg", function(arg){
  var kg=$(this).val();
  var weight=$("#Eweight").val();
if (weight!=0) {
  var total=weight*kg;

  $('#Etotal').val(total);
if (kg!=0) {
  $("#Earot").val(total+(weight*2));
}
else{
   $("#Earot").val(0);
    }
  }
});
/*--End Sum edit Modal---*/

 /*----- Update data ------*/
  $("#editForm").on("submit", function(arg){
  /*alert('edit');*/
    arg.preventDefault();
    
    var form = $(this);
    var url = form.attr("action");
    var type = form.attr("method");
    var data = form.serialize();
      
    $.ajax({
      url: url,
      data: data,
      type: type,
      dataType: "JSON",

      success: function(response){
          if(response == "success"){
            location.reload();
            $("#editSell").modal("hide");
            swal("great", "Data Updated Successfully", "success");
          
          form[0].reset();
          }
        },
    });
  });//end of update

/*---------delete data-----------*/
$(document).on("click", "#deleteId", function(arg){
  /*alert('del');*/
  var x = confirm("Are you sure you want to delete?");

  if (x==true) {
  arg.preventDefault();
  var id = $(this).data("id");
  var url = 'delete';

  $.ajax({
    url: url,
    data: {id:id},
    type: "GET",
    dataType: "JSON",
    success(response){
      swal("Deleted", "Data has been Deleted Successfully", "success");
      location.reload();
    }
  });
    
  }
});
/*-----end of delete--------*/

//add new input field, and remove input field
$(document).ready(function(){
  var i = 0;
$('#add_new').click(function(){
  ++i;

  $('#mainbody').append('<tr><td><input type="text" class="form-control" name="addmore[0][paikar_name]" style="margin-right: 50px"></td><td><input type="text" class="form-control" name="addmore[0][mohajon_name]" style="margin-right: 50px"></td><td><textarea name="addmore[0][address]" class="form-control" placeholder="address"></textarea></td></tr><tr><td><input type="text" class="form-control" name="addmore[0][fish_weight]" style="margin-right: 50px" placeholder="fish weight"></td><td><input type="text" class="form-control" name="addmore[0][price_per_kg]" style="margin-right: 50px" placeholder="price per kg"></td><td><input type="text" class="form-control" name="addmore[0][total]" style="margin-right: 50px" placeholder="total"></td><td><input type="text" class="form-control" name="addmore[0][arot_total]" style="margin-right: 50px" placeholder="arot total"></td></tr>');

  $('#mainbody').on('click', '#remove', function(){
      $(this).closest('tr').remove();
  });

});
});

/*--mohajon address---*/
$("select#mohajon_id").change(function(){
      var mohajonId = $(this).children("option:selected").val();


    
    $.ajax({
      url: "customer_address",
      data: {id:mohajonId},
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
});
/*---paikar---*/
$("select#paikar_id").change(function(){
      var paikarId = $(this).children("option:selected").val();


    
    $.ajax({
      url: "paikars_address",
      data: {id:paikarId},
      type: "GET",
      dataType: "JSON",
      success: function(response){
        if($.isEmptyObject(response) != null){
       
           $("#paikar_address").val(response.address);

          }else{
            console.log("errors");
        }
      }
  });
});




});//all top



/*--test easyly sum--*/
  /*$(document).on("keyup", "#Eweight", function(arg){
    var weight=$(this).val();
    var kg=$("#Eper_kg").val();
      var total=weight*kg;
    $('#Etotal').val(total);
      $("#Earot").val(total+(weight*2));
    

  });

  $(document).on("keyup", "#Eper_kg", function(arg){
  var weight=$("#Eweight").val();
    var kg=$(this).val();
    var total=weight*kg;
    $('#Etotal').val(total);
    $("#Earot").val(total+(weight*2));

  });*/
