$(function(){
  $("#contact-us-form").on("submit", function(e) {
    /*alert('okk');*/
    e.preventDefault();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

    $('#saveContact').html('Sending..');

      $.ajax({
        url: 'contact/save',
        type: "POST",
        data: $('#contact-us-form').serialize(),
        success: (response) => {
          location.reload();
            this.reset();
            $("#contact-us-form")[0].reset();
            $('#saveContact').html('Submit');
        },
      });

});//end of add submit

/*---------------View Data-----------------------*/
  $(document).on("click", "#viewId", function(e){
   
   e.preventDefault();

  var id = $(this).data("id");
  var url = $(this).attr("href");

  $.ajax({
    url: url,
    data: {id:id},
    type: "GET",
    dataType: "JSON",
    success: function(response){
      if($.isEmptyObject(response) != null){
          $("#viewContact").modal("show");

          $("#Contactname").text(response.name + "'s Data");
          $(".Cname").text("Name: " + response.name);
          $(".Cphone").text("Phone: " + response.phone);
          $(".Cemail").text("Email: " + response.email);

      }else{
        console.log("errors");
      }
    }
  });
 });//end of view
/*---------------Edit Data-----------------------*/
 $(document).on("click", "#editId", function(arg){
  /*alert('okkk');*/
   arg.preventDefault();

  var id = $(this).data("id");
  var url = $(this).attr("href");

  $.ajax({
    url: url,
    data: {id:id},
    type: "GET",
    dataType: "JSON",
    success: function(response){
          $("#editContact").modal("show");
          $("#editContactName").text("Update " + response.name + "'s Data");

          $("#Ename").val(response.name);
          $("#Ephone").val(response.phone);
          $("#Eemail").val(response.email);

          $("#studentId").val(response.id);
      
    }
  });
 });//end of edit
 /*----- Update ------*/
 /*----- Update ------*/
 /*----- Update ------*/
$("#editContactForm").on("submit", function(arg){
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
          $("#editContact").modal("hide");
          swal("great", "Data Updated Successfully", "success");
        
        form[0].reset();
        }
      },
  });
});//end of update

/*---------delete data-----------*/
$(document).on("click", "#deleteId", function(arg){

  var x = confirm("Are you sure you want to delete?");

  if (x==true) {
arg.preventDefault();
  var id = $(this).data("id");
  var url = '/contact/delete/';

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

  $('#mainbody').append('<tr><td><input type="text" name="addmore['+i+'][name]" style="margin-right: 85px" required minlength="3"></td><td><input type="email" name="addmore['+i+'][email]" style="margin-right: 85px; margin-top:5px" required></td><td><input type="number" name="addmore['+i+'][phone]" style="margin-right: 85px" required minlength="5" maxlength="20"></td><td><button type="button" name="remove" id="remove" value="remove" class="btn btn-sm btn-danger">remove</button></td></tr>');

  $('#mainbody').on('click', '#remove', function(){
      $(this).closest('tr').remove();
  });

});

});




});//all top