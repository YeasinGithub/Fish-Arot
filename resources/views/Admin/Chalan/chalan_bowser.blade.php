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
	<button class="btn btn-info btn-sm" onclick="window.print()">print</button>
    <table style="width:70%; margin: auto; border:1px solid black; background-color: #00bfff;">
    <tr style="text-align: center; font-size: 20px; color: white;">
    	<th colspan="4" style="padding-left: 18px;">ওঁ মা</th>
  	</tr>
    <tr style="text-align: center; font-size: 24px; color: white;">
    	<th colspan="4" style="padding-left: 18px;">ক্যাশ মেমো </th>
  	</tr>
  	<tr style="text-align: center; color: white;">
    	<th colspan="4" style="padding-left: 18px;">মা লক্ষী মৎস্য আড়ৎ </th>
  	</tr>
  	

    <tr class="col-sm col-form-label">
	    <td></td>
	    <td></td>
	    <td></td>
	    <th style="text-align: right; color: white; padding-right: 5px;">মোবাইল:০১৬৩৬৫০২৩১৪</th>
  	</tr>
    <tr class="col-sm col-form-label">
	    <td></td>
	    <td></td>
	    <td></td>
	    <th style="text-align: right; color: white; padding-right: 5px;">০১৬৩৬৫০২৩১৪</th>
  	</tr>
  	<tr class="col-sm col-form-label" style=" color: white;">
	    <th style="padding-left: 18px;">নং:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 9888985</th>
	    <td></td>
	    <td></td>
	    <th style="text-align: right; color: white; padding-right: 5px;">তারিখ:&nbsp;&nbsp;&nbsp;০১-০৭-২০২১</th>
  	</tr>
  	<tr class="col-sm col-form-label" style=" color: white;">
	    <td></td>
	    <td></td>
	    <td></td>
	    <td style="text-align: right;"></td>
  	</tr>
  	
  	<tr class="col-sm col-form-label" style=" color: white;">
	    <th style="padding-left: 18px;">নাম:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; সিকদার</th>
	    <td></td>
	    <td></td>
	    <td style="text-align: right;"></td>
  	</tr>
  	<tr class="col-sm col-form-label" style=" color: white;">
	    <th style="padding-left: 18px;">ঠিকানা: &nbsp;&nbsp; সিক</th>
	    <td></td>
	    <td></td>
	    <td style="text-align: right;"></td>
  	</tr>
  	
  	<tr class="col-sm col-form-label">
	    <td></td>
	    <td></td>
	    <td></td>
	    <td style="text-align: right;"></td>
  	</tr>
  	<tr class="col-sm col-form-label">
	    <td></td>
	    <td></td>
	    <td></td>
	    <td style="text-align: right;"></td>
  	</tr>
  	<tr class="col-sm col-form-label">
	    <td></td>
	    <td></td>
	    <td></td>
	    <td style="text-align: right;"></td>
  	</tr>
  </table>


<table style="width:70%; margin: auto; border:1px solid black; background-color: #00BFE5;">
	@foreach($chalans as $chalan)
  	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">মাছের নাম: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$chalan->fish_name}}</td>
  	</tr>
   	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">কেজি/গ্রাম: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$chalan->kg_gram}}</td>
  	</tr>
  	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">দর প্রতি কেজি: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$chalan->rate_per_kg}}</td>
  	</tr>
   	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">টাকার পরিমান: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$chalan->total_taka}}</td>
  	</tr>
  	@endforeach

  	@foreach($chalanbads as $bad)
  	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">মন্দির: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->mondir}}</td>
  	</tr>
   	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">কমিশন: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->komition}}</td>
  	</tr>
  	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">খাজনা: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->khajna}}</td>
  	</tr>
   	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">নগদ: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->nagad}}</td>
  	</tr>
  	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">কয়েলী: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->koheli}}</td>
  	</tr>
   	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">সমিতি: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->somity}}</td>
  	</tr>
  	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">গাড়ি ভাড়া: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->gari_bara}}</td>
  	</tr>
   	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">লাইন খরচ: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->line_cost}}</td>
  	</tr>
  	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">পার্কিং: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->parking}}</td>
  	</tr>
   	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">হাওলাত: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->haolat}}</td>
  	</tr>
  	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">বরফ: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->ice}}</td>
  	</tr>
   	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">কুলি: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->kuli}}</td>
  	</tr>
  	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">বাজে খরচ: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->baje_cost}}</td>
  	</tr>
   	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">টি.টি / ডি.ডি: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->tity_didy}}</td>
  	</tr>
   	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">আমানত: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->amanot}}</td>
  	</tr>
   	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">ডিউটি: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->duty}}</td>
  	</tr>
   	<tr style="border:1px solid black; color: white;">
	    <th style="padding-left: 18px;">মোট: </th>
	    <td class="tal" style="text-align: left; padding-right: 55px;">{{$bad->total}}</td>
  	</tr>
  	@endforeach
</table>


<table style="width:70%; margin: auto; border:1px solid black; background: #00bfff;">
  	
	<tr class="col-sm col-form-label">
	    <th></th>
	    <td></td>
	    <td></td>
	    <td style="text-align: right;"></td>
  	</tr>
    <tr class="col-sm col-form-label">
	    <th> </th>
	    <td></td>
	    <td></td>
	    <th style="text-align: right;"></th>
  	</tr>
  	<tr class="col-sm col-form-label">
	    <th></th>
	    <td></td>
	    <td></td>
	    <td style="text-align: right;"></td>
  	</tr>
    <tr class="col-sm col-form-label">
	    <th> </th>
	    <td></td>
	    <td></td>
	    <th style="text-align: right;"></th>
  	</tr>

  	<tr class="col-sm col-form-label" style="color: white; font-size:18px;">
	    <th style="padding-left: 18px;">খরচ বাদ:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;৫০০০</th>
	    <td></td>
	    <td></td>
	    <td style="text-align: right;"></td>
  	</tr>

    <tr class="col-sm col-form-label">
	    <td></td>
	    <td></td>
	    <td></td>
	    <th style="text-align: right;"></th>
  	</tr>
	<tr class="col-sm col-form-label" style="color: white; font-size:18px;">
	    <th style="padding-left: 18px;">পাকা বিক্রয়: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;৩০০০ </th>
	    <td></td>
	    <td></td>
	    <td style="text-align: right;"></td>
  	</tr>
    <tr class="col-sm col-form-label">
	    <td></td>
	    <td></td>
	    <td></td>
	    <th style="text-align: right;"></th>
  	</tr>
  	<tr class="col-sm col-form-label" style="color: white; font-size:18px;">
	    <th style="padding-left: 18px;">জমা বাদ:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;২০০০</th>
	    <td></td>
	    <td></td>
	    <td style="text-align: right;"></td>
  	</tr>
    <tr class="col-sm col-form-label">
	    <td></td>
	    <td></td>
	    <td></td>
	    <th style="text-align: right;"></th>
  	</tr>
  	<tr class="col-sm col-form-label" style="color: white; font-size:18px;">
	    <th style="padding-left: 18px;">সর্বমোট: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;১৫০০০</th>
	    <td></td>
	    <td></td>
	    <td style="text-align: right;"></td>
  	</tr>
    <tr class="col-sm col-form-label">
	    <td></td>
	    <td></td>
	    <td></td>
	    <th style="text-align: right;"></th>
  	</tr>
  	<tr class="col-sm col-form-label">
	    <th></th>
	    <td></td>
	    <td></td>
	    <td style="text-align: right;"></td>
  	</tr>
    <tr class="col-sm col-form-label">
	    <td></td>
	    <td></td>
	    <td></td>
	    <th style="text-align: right;"></th>
  	</tr>
  	<tr class="col-sm col-form-label">
	    <th></th>
	    <td></td>
	    <td></td>
	    <td style="text-align: right;"></td>
  	</tr>
    <tr class="col-sm col-form-label">
	    <td></td>
	    <td></td>
	    <td></td>
	    <th style="text-align: right;"></th>
  	</tr>
  	<tr class="col-sm col-form-label">
	    <th></th>
	    <td></td>
	    <td></td>
	    <th style="text-align: right; color: white;">স্বাক্ষর: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  	</tr>
    <tr class="col-sm col-form-label">
	    <td></td>
	    <td></td>
	    <td></td>
	    <td style="text-align: right;"></td>
  	</tr>
  	<tr class="col-sm col-form-label">
	    <td></td>
	    <td></td>
	    <td></td>
	    <td style="text-align: right;"></td>
  	</tr>


    </table>
 

</div>




@endsection