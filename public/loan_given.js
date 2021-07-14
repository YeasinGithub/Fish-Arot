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
      url: "/add-loan",
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
          $("#dataTableExample tbody").prepend('<tr><td>'+response.name+'</td><td>'+response.phone+'</td><td>'+response.date+'</td><td>'+response.loan_amount+'</td><td>'+response.paid+'</td><td>'+response.due+'</td><td><a href="javascript:void(0)" class="btn btn-info btn-sm">edit</a><a href="#" class="btn btn-danger btn-sm">Delete</a></td></tr>');
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
        url: "/loan/amount/",
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

function deleteFunc(id){
    if(confirm("do you want to delete ?"))
    {
      $.ajax({
        url: '/loan/'+id,
        type: 'DELETE',
        data:{
          _token : $("input[name=_token]").val()
        },
        success:function(response)
        {
        /*alert(response);*/
          $("#sid"+id).remove();
        }
      });
    }
  }





/*----edit-update-----*/
  function editFunc(id){
    $.get('/loan/'+id,function(loan){
      $("#id").val(loan.id);
      $("#name2").val(loan.name);
      $("#phone2").val(loan.phone);
      $("#date2").val(loan.date);
      $("#amount2").val(loan.loan_amount);
      $("#paid2").val(loan.paid);
      $("#due2").val(loan.due);
      $("#editModal").modal('show');
    })
  }
  $("#studentEditForm").submit(function(e){
    e.preventDefault();
    
    let id = $("#id").val();
    let name = $("#name2").val();
    let phone = $("#phone2").val();
    let date = $("#date2").val();
    let loan_amount = $("#amount2").val();
    let paid = $("#paid2").val();
    let due = $("#due2").val();
    let _token = $("input[name=_token]").val();
    
    $.ajax({
      url:"loan/update",
      type:"PUT",
      data:{
        id:id,
        name:name,
        phone:phone,
        date:date,
        loan_amount:loan_amount,
        paid:paid,
        due:due,
        _token:_token
      },
      success:function(response){
        $('#sid' + response.id +' td:nth-child(1)').text(response.name);
        $('#sid' + response.id +' td:nth-child(2)').text(response.phone);
        $('#sid' + response.id +' td:nth-child(3)').text(response.date);
        $('#sid' + response.id +' td:nth-child(4)').text(response.loan_amount);
        $('#sid' + response.id +' td:nth-child(5)').text(response.paid);
        $('#sid' + response.id +' td:nth-child(6)').text(response.due);
        $("#editModal").modal('toggle');
        $("#studentEditForm")[0].reset();
      }
    });
  });
/*----end edit-update-----*/


$(function(){

  $(document).on("keyup", "#phone2", function(phone, lm, paid, due){
      /*alert('ok');*/
      mobile();
          });

  $(document).on("keyup", "#loan_amount2", function(arg){
    
      mobile();
  })

  $(document).on("keyup", "#paid2", function(arg){
      mobile(); 

  })


  function mobile(){

    var phone=$("#phone2").val();

    var lm=$("#loan_amount2").val()? $("#loan_amount2").val():0;
    /*alert($("#loan_amount2").val()? $("#loan_amount2").val():0);*/
          
    var paid=$("#paid2").val()? $("#paid2").val():0;
    var due=$("#due2").val()? $("#due2").val():0;
    $.ajax({
        url: "/loanE/edit-amount/",
        data: {id:phone},
        type: "GET",
        dataType: "JSON",
        success: function(response){
              
            if(response.length!= 0){

                var a=response[0].due?response[0].due:0;
                /*alert(a);*/

                $("#due2").val((Number(lm)+Number(a))-Number(paid));
                /*alert($("#due2").val((Number(lm)+Number(a))-Number(paid)));*/

                }else
                {
                  $("#due2").val(Number(lm)-Number(paid));
                }
            }
        });
  }


})