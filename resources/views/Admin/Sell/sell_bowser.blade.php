@extends('Admin.master')
@section('styles')
<style >
  .tal{
    text-align: left;
  }
.tar{
  text-align: right;
}
</style>

@endsection
@section('content')
  <div class="content-wrapper">
    <!-- <div>
      <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">যুক্ত করুন</button>
    </div> -->
    <button onclick="window.print()" class="btn-primary">print</button>
<table style="width:70%; margin: auto; border:1px solid black">
  <tr style="text-align: center;">
    <th colspan="2">Mohajon Name: {{$data->mohajon->mohajon_name}}</th>

    
  </tr>
  <tr style="text-align: center;">
   
    <th colspan="2">Paikar Name: {{$data->paikar->paikar_name}}</th>
  
    
  </tr>
 
  <tr style="border:1px solid black">
    <td>Fish weight: </td>
    <td class="tal">{{$data->fish_weight}}</td>
    
  </tr>
   <tr style="border:1px solid black">
    <td>Fish weight: </td>
    <td class="tal">{{$data->fish_weight}}</td>
    
  </tr>
</table>
 

</div>




@section('scripts')


@endsection

