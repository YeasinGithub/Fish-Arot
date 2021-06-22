$(function(){

/*---------delete data-----------*/
$(document).on("click", "#deleteId", function(arg){
  /*alert('del');*/
  var x = confirm("Are you sure you want to delete?");

  if (x==true) {
  arg.preventDefault();
  var id = $(this).data("id");
  var url = 'active/';

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



});//all top


