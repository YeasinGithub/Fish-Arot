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
        $(document).on("keyup", "#Dtaka", function(arg){
          var debit=$('#Dtaka').val();
          var hal=$("#Dpaid").val();
          if (hal!=0) {
            var total=Number(debit) - Number(hal);
          $('#Dlast').val(total);
          /*if (hal!=0) {
            $("#Darot").val(total+debit);
          }
          else{
           $("#Darot").val(0);
        }*/

        } else {
          $('#Dlast').val(debit);
        }

        });

  $(document).on("click", "#dayname", function(arg){

         var ddate=new Date($("#ddate").val());
 var dd=ddate.getDay();
       
         if (isNaN(dd)) {
          alert('Select Date ');
         }

        });




      $( "#ddate" ).change(function() {
var ddate=new Date($("#ddate").val());
 var dd=ddate.getDay();



switch(dd) {
  case 0:
    $('#dayname').val('রবিবার');
    break;
  case 1:
   $('#dayname').val('সোমবার');
    break;

      case 2:
    $('#dayname').val('মঙ্গলবার');
    break;
      case 3:
     $('#dayname').val('বুধবার');
    break;
      case 4:
     $('#dayname').val('বৃহস্পতিবার');
    break;
      case 5:
     $('#dayname').val('শুক্রবার');
    break;
      case 6:
     $('#dayname').val('শনিবার');
   
    break;
  default:
    // code block
}


      
      });





        $(document).on("keyup", "#Dpaid", function(arg){
          var hal=$("#Dpaid").val();
          var debit=$("#Dtaka").val();
        if (debit!=0) {

       
          var total=Number(debit) - Number(hal);
          
          $('#Dlast').val(total);
        /*if (hal!=0) {
          $("#Darot").val(total+debit);
        }
        else{
           $("#Darot").val(0);
        }*/

        }
        });








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
 $(document).on("click", "#dadonId", function(arg){
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
          $("#editDadon").modal("show");
          $("#editDadonName").text("Update 's Data");
          $("#Ename").val(response.name);
          $("#Eaddress").val(response.address);
          $("#Edate").val(response.date);
          $("#Eday").val(response.day);
          $("#Emobile").val(response.mobile);
          $("#Etotal_amount").val(response.total_amount);
          $("#Epaid").val(response.paid);
          $("#Elast_total").val(response.last_total);

          $("#dadonId").val(response.id);
      
    }
  });
 });//end of edit

      /*---Sum Or Minus---*/
        $(document).on("keyup", "#Etotal_amount", function(arg){
          var debit=$('#Etotal_amount').val();
          var hal=$("#Epaid").val();
          if (hal!=0) {
            var total=Number(debit) - Number(hal);
          $('#Elast_total').val(total);
          /*if (hal!=0) {
            $("#Darot").val(total+debit);
          }
          else{
           $("#Darot").val(0);
        }*/

        }

        });

        $(document).on("keyup", "#Epaid", function(arg){
          var hal=$("#Epaid").val();
          var debit=$("#Etotal_amount").val();
        if (debit!=0) {

       
          var total=Number(debit) - Number(hal);
          
          $('#Elast_total').val(total);
        /*if (hal!=0) {
          $("#Darot").val(total+debit);
        }
        else{
           $("#Darot").val(0);
        }*/

        }
        });

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
