$("#loan").submit(function(e){
  /*alert('ok');*/
    e.preventDefault();

    let name = $("#name").val();
    let phone = $("#phone").val();
    let date = $("#date").val();
    let loan_amount = $("#loan_amount").val();
    let paid = $("#paid").val();
    let due = $("#due").val();
    let _token = $("input[name=_token]").val();
    $.ajax({
      url: "/adds-loans",
      type:"POST",
      data:{
        name:name,
        phone:phone,
        date:date,
        loan_amount:loan_amount,
        paid:paid,
        due:due,
        _token:_token

      },
      success:function(response)
      {
        /*console.log(response);*/
        if (response) {
          $("#dataTableExample tbody").prepend('<tr><td>'+response.name+'</td><td>'+response.phone+'</td><td>'+response.date+'</td><td>'+response.loan_amount+'</td><td>'+response.paid+'</td><td>'+response.due+'</td><td><a href="#" class="btn btn-danger btn-sm">Delete</a></td></tr>');
          $("#loan")[0].reset();
          ajax.reload();
        }
      }
    });

  });

$(function(){

 



    $(document).on("keyup", "#phone", function(phone, lm, paid, due){
  mobile();

        });


$(document).on("keyup", "#loan_amount", function(arg){
  
   mobile();
})







$(document).on("keyup", "#paid", function(arg){
          mobile(); 

})


function mobile(){

var phone=$("#phone").val();
         var lm=$("#loan_amount").val()? $("#loan_amount").val():0;
        
          var paid=$("#paid").val()? $("#paid").val():0;
          var due=$("#due").val()? $("#due").val():0;
        $.ajax({
                url: "/loans/amount/",
                data: {id:phone},
                type: "GET",
                dataType: "JSON",
                success: function(response){
                
                  if(response.length!= 0){

                      var a=response[0].due?response[0].due:0;

                     
                 
                      $("#due").val((Number(lm)+Number(a))-Number(paid));


                      }else
                      {
                        $("#due").val(Number(lm)-Number(paid));
                      }
                  }
          });
}






})
