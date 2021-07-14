$("#chalanBad").submit(function(e){
    e.preventDefault();

    let mondir = $("#mondir").val();
    let komition = $("#komition").val();
    let khajna = $("#khajna").val();
    let nagad = $("#nagad").val();
    let koheli = $("#koheli").val();
    let somity = $("#somity").val();
    let gari_bara = $("#gari_bara").val();
    let line_cost = $("#line_cost").val();
    let parking = $("#parking").val();
    let haolat = $("#haolat").val();
    let ice = $("#ice").val();
    let kuli = $("#kuli").val();
    let baje_cost = $("#baje_cost").val();
    let tity_didy = $("#tity_didy").val();
    let amanot = $("#amanot").val();
    let duty = $("#duty").val();
    let total = $("#total").val();
    let chalan_total = $("#chalan_total").val();
    let khoros_bad = $("#khoros_bad").val();
    let _token = $("input[name=_token]").val();
    $.ajax({
      url: "chalan-bad/save/",
      type:"POST",
      data:{
        mondir:mondir,
        komition:komition,
        khajna:khajna,
        nagad:nagad,
        koheli:koheli,
        somity:somity,
        gari_bara:gari_bara,
        line_cost:line_cost,
        parking:parking,
        haolat:haolat,
        ice:ice,
        kuli:kuli,
        baje_cost:baje_cost,
        tity_didy:tity_didy,
        amanot:amanot,
        duty:duty,
        total:total,
        chalan_total:chalan_total,
        khoros_bad:khoros_bad,
        _token:_token

      },
      success:function(response)
      {
        if (response) {
          $("#dataTableExample tbody").prepend('<tr><td>'+response.mondir+'</td><td>'+response.komition+'</td><td>'+response.khajna+'</td><td>'+response.nagad+'</td><td>'+response.koheli+'</td><td>'+response.somity+'</td><td>'+response.gari_bara+'</td><td>'+response.line_cost+'</td><td>'+response.parking+'</td><td>'+response.haolat+'</td><td>'+response.ice+'</td><td>'+response.kuli+'</td><td>'+response.baje_cost+'</td><td>'+response.tity_didy+'</td><td>'+response.amanot+'</td><td>'+response.duty+'</td><td>'+response.total+'</td><td>'+response.chalan_total+'</td><td>'+response.khoros_bad+'</td><td><a href="javascript:void(0)" class="btn btn-info btn-sm">edit</a><a href="#" class="btn btn-danger btn-sm">Delete</a></td></tr>');
          $("#chalanBad")[0].reset();
          ajax.reload();
        }
      }
    });

  });

/*----another way----*/
/*$(".ttaka").keyup(function(){
var mondir=$('.mondir0').val()? $('.mondir0').val() : 0 ;
var komition=$(".komition0").val()? $(".komition0").val() :0 ;
var khajna=$(".khajna0").val()? $(".khajna0").val() :0 ;
var result=Number(mondir)+Number(komition)+Number(khajna);
    $('.total').val(result);

});*/

$(".ttaka").keyup(function(){
  var sum = 0;
    $(".ttaka").each(function(){
      var valu=0;
      if($(this).val()=='' || isNaN($(this).val())){
            valu=0;
      }
      else{
        valu=$(this).val();
      }
        sum += Number(valu);
      
    });
 
    $(".total0").val(sum);

    /*--chalan theke total minus er jonno
        jate jeikhanei click kori value change hoy
    --*/
    var chalan=$('#mohajon_id').val();
    var total=$('#total').val();
        if(isNaN(chalan)==false && isNaN(total)==false ){
         $("#khoros_bad").val(Number($('#mohajon_id').val())-Number($('#total').val()));
      }
      else{
        $("#khoros_bad").val(0);
      }


});

    $('#chalan_total').change(function(){

      var chalan=$('#chalan_total').val();
          var total=$('#total').val();

      if(isNaN(chalan)==false && isNaN(total)==false ){
         $("#khoros_bad").val(Number($('#chalan_total').val())-Number($('#total').val()));
      }
      else{
        $("#khoros_bad").val(0);
      }
});





/*----edit-update-----*/
  function editFunc(id){
    $.get('/chalan-bad/'+id,function(chalanbad){
      $("#id").val(chalanbad.id);
      $("#Emondir").val(chalanbad.mondir);
      $("#Ekomition").val(chalanbad.komition);
      $("#Ekhajna").val(chalanbad.khajna);
      $("#Enagad").val(chalanbad.nagad);
      $("#Ekoheli").val(chalanbad.koheli);
      $("#Esomity").val(chalanbad.somity);
      $("#Egari_bara").val(chalanbad.gari_bara);
      $("#Eline_cost").val(chalanbad.line_cost);
      $("#Eparking").val(chalanbad.parking);
      $("#Ehaolat").val(chalanbad.haolat);
      $("#Eice").val(chalanbad.ice);
      $("#Ekuli").val(chalanbad.kuli);
      $("#Ebaje_cost").val(chalanbad.baje_cost);
      $("#Etity_didy").val(chalanbad.tity_didy);
      $("#Eamanot").val(chalanbad.amanot);
      $("#Eduty").val(chalanbad.duty);
      $("#Etotal").val(chalanbad.total);
      $("#Echalan_total").val(chalanbad.chalan_total);
      $("#Ekhoros_bad").val(chalanbad.khoros_bad);
      $("#editChalanBad").modal('show');
    })
  }
  $("#chalanbadEditForm").submit(function(e){
    e.preventDefault();
    
    let id = $("#id").val();
    let mondir = $("#Emondir").val();
    let komition = $("#Ekomition").val();
    let khajna = $("#Ekhajna").val();
    let nagad = $("#Enagad").val();
    let koheli = $("#Ekoheli").val();
    let somity = $("#Esomity").val();
    let gari_bara = $("#Egari_bara").val();
    let line_cost = $("#Eline_cost").val();
    let parking = $("#Eparking").val();
    let haolat = $("#Ehaolat").val();
    let ice = $("#Eice").val();
    let kuli = $("#Ekuli").val();
    let baje_cost = $("#Ebaje_cost").val();
    let tity_didy = $("#Etity_didy").val();
    let amanot = $("#Eamanot").val();
    let duty = $("#Eduty").val();
    let total = $("#Etotal").val();
    let chalan_total = $("#Echalan_total").val();
    let khoros_bad = $("#Ekhoros_bad").val();
    let _token = $("input[name=_token]").val();
    
    $.ajax({
      url:"chalan-bad/update",
      type:"PUT",
      data:{
        id:id,
        mondir:mondir,
        komition:komition,
        khajna:khajna,
        nagad:nagad,
        koheli:koheli,
        somity:somity,
        gari_bara:gari_bara,
        line_cost:line_cost,
        parking:parking,
        haolat:haolat,
        ice:ice,
        kuli:kuli,
        baje_cost:baje_cost,
        tity_didy:tity_didy,
        amanot:amanot,
        duty:duty,
        total:total,
        chalan_total:chalan_total,
        khoros_bad:khoros_bad,
        _token:_token
      },
      success:function(response){
        $('#sid' + response.id +' td:nth-child(1)').text(response.mondir);
        $('#sid' + response.id +' td:nth-child(2)').text(response.komition);
        $('#sid' + response.id +' td:nth-child(3)').text(response.khajna);
        $('#sid' + response.id +' td:nth-child(4)').text(response.nagad);
        $('#sid' + response.id +' td:nth-child(5)').text(response.koheli);
        $('#sid' + response.id +' td:nth-child(6)').text(response.somity);
        $('#sid' + response.id +' td:nth-child(7)').text(response.gari_bara);
        $('#sid' + response.id +' td:nth-child(8)').text(response.line_cost);
        $('#sid' + response.id +' td:nth-child(9)').text(response.parking);
        $('#sid' + response.id +' td:nth-child(10)').text(response.haolat);
        $('#sid' + response.id +' td:nth-child(11)').text(response.ice);
        $('#sid' + response.id +' td:nth-child(12)').text(response.kuli);
        $('#sid' + response.id +' td:nth-child(13)').text(response.baje_cost);
        $('#sid' + response.id +' td:nth-child(14)').text(response.tity_didy);
        $('#sid' + response.id +' td:nth-child(15)').text(response.amanot);
        $('#sid' + response.id +' td:nth-child(16)').text(response.duty);
        $('#sid' + response.id +' td:nth-child(17)').text(response.total);
        $('#sid' + response.id +' td:nth-child(18)').text(response.chalan_total);
        $('#sid' + response.id +' td:nth-child(19)').text(response.khoros_bad);
        $("#editChalanBad").modal('toggle');
        $("#chalanbadEditForm")[0].reset();
      }
    });
  });
/*----end edit-update-----*/



/*---------------Edit Data-----------------------*/
 /*$(document).on("click", "#chalanBadId", function(arg){
   arg.preventDefault();

  var id = $(this).data("id");
  var url = $(this).attr("href");
  $.ajax({
    url: url,
    data: {id:id},
    type: "GET",
    dataType: "JSON",
    success: function(response){
          $("#editChalanBad").modal("show");

          $("#Emondir").val(response.mondir);
          $("#Ekomition").val(response.komition);
          $("#Ekhajna").val(response.khajna);
          $("#Enagad").val(response.nagad);
          $("#Ekoheli").val(response.koheli);
          $("#Esomity").val(response.somity);
          $("#Egari_bara").val(response.gari_bara);
          $("#Eline_cost").val(response.line_cost);
          $("#Eparking").val(response.parking);
          $("#Ehaolat").val(response.haolat);
          $("#Eice").val(response.ice);
          $("#Ekuli").val(response.kuli);
          $("#Ebaje_cost").val(response.baje_cost);
          $("#Etity_didy").val(response.tity_didy);
          $("#Eamanot").val(response.amanot);
          $("#Eduty").val(response.duty);
          $("#Etotal").val(response.total);
          $("#Echalan_total").val(response.chalan_total);
          $("#Ekhoros_bad").val(response.khoros_bad);

          $("#chalanBadId").val(response.id);
      
    }
  });
 });*///end of edit

 //edit calculation
 $(".ttaka").keyup(function(){
    var sum = 0;
    $(".ttaka").each(function(){
      var valu=0;
      if($(this).val()=='' || isNaN($(this).val())){
            valu=0;
      }
      else{
        valu=$(this).val();
      }
        sum += Number(valu);
      
    });

    $("#Etotal").val(sum);

    /*--chalan theke total minus er jonno
        jate jeikhanei click kori value change hoy
    --*/
    var chalan=$('#mohajon_id').val();
    var total=$('#Etotal').val();
        if(isNaN(chalan)==false && isNaN(total)==false ){
         $("#Ekhoros_bad").val(Number($('#mohajon_id').val())-Number($('#Etotal').val()));
      }
      else{
        $("#Ekhoros_bad").val(0);
      }


});

 $('#Echalan_total').change(function(){

      var chalan=$('#Echalan_total').val();
          var total=$('#Etotal').val();

      if(isNaN(chalan)==false && isNaN(total)==false ){
         $("#Ekhoros_bad").val(Number($('#Echalan_total').val())-Number($('#Etotal').val()));
      }
      else{
        $("#Ekhoros_bad").val(0);
      }

 

});









 function deleteFunc(id){
    if(confirm("do you want to delete ?"))
    {
      $.ajax({
        url: '/chalan-bad/'+id,
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