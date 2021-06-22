$(function(){


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
          $("#Enames").val(response.mohajon_name);
          $("#Eaddress").val(response.address);

          $("#dadonId").val(response.id);
      
    }
  });
 });//end of edit


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

