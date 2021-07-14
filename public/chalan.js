$(function(){
$("#chalan").submit(function(e){
  /*alert('ok');*/
   e.preventDefault();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

      $.ajax({
        url: 'chalan/add-chalan/',
        type: "POST",
        data: $('#chalan').serialize(),
        success: (response) => {
			location.reload();
        },
      });
  });

function nettotalfind(){
        var sum = 0;
          $('.totalC').each(function()
          {
           var valu=0;
      if($(this).val()=='' || isNaN($(this).val())){
            valu=0;
      }
      else{
        valu=$(this).val();
      }
              sum += parseFloat(valu);
          });
          /*alert(sum);*/
            $('#net').val(sum);

      }


      function kgtotalfind(){
        var sum = 0;
          $('.kg_gram').each(function()
          {
           var valu=0;
      if($(this).val()=='' || isNaN($(this).val())){
            valu=0;
      }
      else{
        valu=$(this).val();
      }
              sum += parseFloat(valu);
          });
          /*alert(sum);*/
            $('#kg').val(sum);

      }





$(document).on("keyup", ".kg_gram", function(arg){

            var id=$(this).attr('id');
            var number=id.split('kg_gram')[1];

            var kg_gram=$('#kg_gram'+number).val();
            var rate_per_kg=$('#rate_per_kg'+number).val();

      if(kg_gram=='' || isNaN(kg_gram) ||  rate_per_kg=='' || isNaN(rate_per_kg)){
           $('#total_taka'+number).val(0);
      }
      else{
       var total=Number(kg_gram) * Number(rate_per_kg);
            $('#total_taka'+number).val(total);
      }
           
            nettotalfind();
            kgtotalfind();
        
        });

$(document).on("keyup", ".rate_per_kg", function(arg){

        var id=$(this).attr('id');
        var number=id.split('rate_per_kg')[1];
      

        var kg_gram=$('#kg_gram'+number).val();
        var rate_per_kg=$('#rate_per_kg'+number).val();

          if(kg_gram=='' || isNaN(kg_gram) ||  rate_per_kg=='' || isNaN(rate_per_kg)){
           $('#total_taka'+number).val(0);
      }
      else{
           var total=Number(kg_gram) * Number(rate_per_kg);
        $('#total_taka'+number).val(total);
      }
   
        nettotalfind();
        kgtotalfind();
         
    });








$("select#mohajon_id").change(function(){
    var mohajonId = $(this).children("option:selected").val();

    $.ajax({
      url: "/chalan/mohajons_address/",
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
//dynamic row create

$(document).ready(function(){
  var i = 0;
$('#add_new').click(function(){
  ++i;
  $('#mainbody').append('<tr><td><input class="col-sm col-form-label" type="text" name="addmore['+i+'][fish_name]" required  id="fish_name'+i+'"></td>' +
      '<td><input class="kg_gram col-sm col-form-label" type="text" name="addmore['+i+'][kg_gram]" id="kg_gram'+i+'" required ></td>' +
      '<td><input class="rate_per_kg col-sm col-form-label" type="text" name="addmore['+i+'][rate_per_kg]" id="rate_per_kg'+i+'" value="" required></td>' +
      '<td><input class="totalC  col-sm col-form-label" type="text" name="addmore['+i+'][total_taka]" id="total_taka'+i+'" value="" required></td>' +
      '<td><button type="button" name="remove" id="remove" value="remove" class="btn btn-sm btn-danger">-</button></td></tr>');

  $('#mainbody').on('click', '#remove', function(){
      $(this).closest('tr').remove();
      nettotalfind();
  });

});

});




/*---------------Edit Data-----------------------*/
 $(document).on("click", "#chalanId", function(arg){
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
          $("#editChalan").modal("show");

          $("#Ename").val(response.fish_name);
          $("#Ekg").val(response.kg_gram);
          $("#Erate").val(response.rate_per_kg);
          $("#Etotal").val(response.total_taka);

          $("#chalanId").val(response.id);
      
    }
  });
 });//end of edit

});//all top


//edit calculation
$(document).on("keyup", ".kg_gram", function(arg){
            var id=$(this).attr('id');
            var number=id.split('Ekg')[1];
          

            var Ekg=$('#Ekg'+number).val();
            var Erate=$('#Erate'+number).val();
            var total=Number(Ekg) * Number(Erate);
            $('#Etotal'+number).val(total);
        
        });

$(document).on("keyup", ".rate_per_kg", function(arg){
        var id=$(this).attr('id');
        var number=id.split('Erate')[1];
      

        var kg_gram=$('#Ekg'+number).val();
        var Erate=$('#Erate'+number).val();
        var total=Number(kg_gram) * Number(Erate);
        $('#Etotal'+number).val(total);
         
    });

function deleteFunc(id){
    if(confirm("do you want to delete ?"))
    {
      $.ajax({
        url: '/chalan/'+id,
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