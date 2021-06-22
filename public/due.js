$(function(){

/*key_up("#Dhal");
key_up("#Ddebit");
function key_up(mainid){

        $(document).on("keyup", mainid, function(arg){
             var hal=$("#Dhal").val();
        var debit=$("#Ddebit").val();
        if (debit!=0) {

          var total=Number(debit) + Number(hal);
          $('#Dtotal').val(total);

        }
        });
}*/
        /*---Sum Or Minus---*/
        $(document).on("keyup", "#Ddebit", function(arg){
          var debit=$('#Ddebit').val();
          var hal=$("#Dhal").val();
          if (hal!=0) {
            var total=Number(debit) + Number(hal);
          $('#Dtotal').val(total);
          /*if (hal!=0) {
            $("#Darot").val(total+debit);
          }
          else{
           $("#Darot").val(0);
        }*/

        }

        });

        $(document).on("keyup", "#Dhal", function(arg){
          var hal=$("#Dhal").val();
          var debit=$("#Ddebit").val();
        if (debit!=0) {

       
          var total=Number(debit) + Number(hal);
          
          $('#Dtotal').val(total);
        /*if (hal!=0) {
          $("#Darot").val(total+debit);
        }
        else{
           $("#Darot").val(0);
        }*/

        }
        });


/*--------------------------------*/
        $(document).on("keyup", "#Dtotal", function(arg){
          var total=$("#Dtotal").val();
          var paid=$("#Dpaid").val();
        if (paid!=0) {

       
          var due_total=Number(total) - Number(paid);
          
          $('#Ddue').val(due_total);
        /*if (hal!=0) {
          $("#Darot").val(total+debit);
        }
        else{
           $("#Darot").val(0);
        }*/

        }
        });
        $(document).on("keyup", "#Dpaid", function(arg){
          var paid=$("#Dpaid").val();
          var total=$("#Dtotal").val();
        if (total!=0) {

       
          var due_total=Number(total) - Number(paid);
          
          $('#Ddue').val(due_total);
        /*if (hal!=0) {
          $("#Darot").val(total+debit);
        }
        else{
           $("#Darot").val(0);
        }*/

        }
        });
        /*---End Sum or Minus----*/





  $("#due-us-form").on("submit", function(e) {
    /*alert('okk');*/
    e.preventDefault();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

    $('#saveDue').html('Sending..');
      $.ajax({
        url: 'save',
        type: "POST",
        data: $('#due-us-form').serialize(),
        success: (response) => {
          location.reload();
            this.reset();
            $("#due-us-form")[0].reset();
            $('#saveDue').html('Submit');
        },
      });

});//end of add submit

/*---------------Edit Data-----------------------*/
 $(document).on("click", "#dueId", function(arg){
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
          $("#editDue").modal("show");
          $("#editDueName").text("Update 's Data");

          $('#Epaikar option[value='+response.paikar_id+']').attr('selected', 'selected');
          $("#Eaddress").val(response.address);
          $("#Edue_amount_today").val(response.due_amount_today);
          $("#Ehal").val(response.hal);
          $("#Etotal").val(response.total);
          $("#Epaid").val(response.paid);
          $("#Etotal_due").val(response.total_due);

          $("#dueId").val(response.id);
      
    }
  });
 });//end of edit

      /*---Edit Modal Sum Or Minus---*/
        $(document).on("keyup", "#Edue_amount_today", function(arg){
          var debit=$('#Edue_amount_today').val();
          var hal=$("#Ehal").val();
          if (hal!=0) {
            var total=Number(debit) + Number(hal);
          $('#Etotal').val(total);
          /*if (hal!=0) {
            $("#Darot").val(total+debit);
          }
          else{
           $("#Darot").val(0);
        }*/

        }

        });

        $(document).on("keyup", "#Ehal", function(arg){
          var hal=$("#Ehal").val();
          var debit=$("#Edue_amount_today").val();
        if (debit!=0) {

       
          var total=Number(debit) + Number(hal);
          
          $('#Etotal').val(total);
        /*if (hal!=0) {
          $("#Darot").val(total+debit);
        }
        else{
           $("#Darot").val(0);
        }*/

        }
        });


/*--------------------------------*/
        $(document).on("keyup", "#Etotal", function(arg){
          var total=$("#Etotal").val();
          var paid=$("#Epaid").val();
        if (paid!=0) {

       
          var due_total=Number(total) - Number(paid);
          
          $('#Etotal_due').val(due_total);
        /*if (hal!=0) {
          $("#Darot").val(total+debit);
        }
        else{
           $("#Darot").val(0);
        }*/

        }
        });
        $(document).on("keyup", "#Epaid", function(arg){
          var paid=$("#Epaid").val();
          var total=$("#Etotal").val();
        if (total!=0) {

       
          var due_total = Number(total) - Number(paid);
          
          $('#Etotal_due').val(due_total);
        /*if (hal!=0) {
          $("#Darot").val(total+debit);
        }
        else{
           $("#Darot").val(0);
        }*/

        }
        });
        /*---End Sum or Minus Edit Modal----*/

 /*----- Update ------*/
$("#dueForm").on("submit", function(arg){
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
          $("#editDue").modal("hide");
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
/*---Sell form arot Total for Due Hal---*/
$("select#paikar_id").change(function(){
      var paikarId = $(this).children("option:selected").val();

    $.ajax({
      url: "hal",
      data: {id:paikarId},
      type: "GET",
      dataType: "JSON",
      success: function(response){
        if($.isEmptyObject(response) != null){
       
           $("#Dhal").val(response);

          }else{
            console.log("errors");
        }
      }
  });
});


});//all top




/*key_up("#Dhal");
key_up("#Ddebit");


function key_up(mainid){

        $(document).on("keyup", mainid, function(arg){
             var hal=$("#Dhal").val();
        var debit=$("#Ddebit").val();
        if (debit!=0) {

       
          var total=Number(debit) + Number(hal);
          
          $('#Dtotal').val(total);
    

        }
        });

}*/
