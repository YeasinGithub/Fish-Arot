@extends('Admin.master')
@section('content')
  <div class="content-wrapper">
    <!-- <div>
      <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">যুক্ত করুন</button>
    </div> -->
    <!--  -->
    <form action="{{route('report.sell.save')}}" method="POST" >
      @csrf
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <form id="signupForm">
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-address-book-o"></i>
                   বিক্রয় রিপোর্ট
                </h4>
                <div class="form-group row">
                  <label for="input-10" class="col-sm-2 col-form-label">মহাজন নাম</label>
                  <div class="col-sm-4">
                        <select class="form-control single-select" id="mohajon_id" name="mohajon_id">
                          <option disabled="disabled" selected="selected">মহাজন সিলেক্ট করুন</option>
                          @foreach($mohajons as $mohajon)
                          <option value="{{$mohajon->id}}">{{$mohajon->mohajon_name}}</option>
                          @endforeach
                      </select>
                  </div>
                  
                </div>
                <div class="form-group row">
                  <label for="input-11" class="col-sm-2 col-form-label">পাইকার নাম</label>
                  <div class="col-sm-4">
                    <select class="form-control single-select" name="paikar_id" id="paikar_id">
                          <option disabled="disabled" selected="selected">পাইকার সিলেক্ট করুন</option>
                          @foreach($paikars as $paikar)
                          <option value="{{$paikar->id}}">{{$paikar->paikar_name}}</option>
                          @endforeach
                        </select>
                  </div>
                  
                  
                </div>
               
              

                <div class="form-footer">
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</button>
                    <button type="submit" name="submit" class="btn btn-success" ><i class="fa fa-check-square-o"></i> Report</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div><!--End Row-->
    </form>
    <!--  -->

 



  <?php
  if ($report==true) {
    ?>






<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i>সকল বিক্রয় খাতা</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>মহাজন নাম</th>
                        <th>মহাজন ঠিকানা</th>
                        <th>পাইকার নাম</th>
                        <th>পাইকার ঠিকানা</th>
                        <th>মাছের কেজি</th>
                        <th>প্রতি কেজির মূল্য</th>
                        <th>মোট</th>
                        <th>ভ্যাট ২টাকা সহ</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @php
                $i=0;
                $j=0;
                $x = 1;
                @endphp


                    @foreach($sells as $sell)
                  <tr>
                    <td>@php echo $x; @endphp</td>
                    <td>{{$sell->mohajon->mohajon_name}}</td>
                    <td>{{$sell->mohajon_address}}</td>
                    <td>{{$sell->paikar->paikar_name}}</td>
                    <td>{{$sell->paikar_address}}</td>
                    <td>{{$sell->fish_weight}}kg</td>
                    <td>{{$sell->price_per_kg}}</td>
                    <td>{{$sell->total}}</td>
                    <td>{{$sell->arot_total}}</td>
                    <td>
                      <a href="{{ url('/sell/edit/') }}" data-id="{{$sell->id}}" id="sellId" class="btn btn-sm btn-info">Edit</a>

                      <a href="{{ url('/sell/delete/') }}" data-id="{{$sell->id}}" id="deleteId"  class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @php
                  $i+=$sell->total;
                  $j+=$sell->arot_total;
                  $x++;
                  @endphp
                  @endforeach
                  <tr>
                    <td style="color: white; border-right: none;">Total</td>
                    <td style="border-right: none;"></td>
                    <td style="border-right: none;"></td>
                    <td style="border-right: none;"></td>
                    <td style="border-right: none;"></td>
                    <td style="border-right: none;"></td>
                    <td style="text-align: right;"><b>মোট</b></td>
                    <td><b>@php echo $i; @endphp টাকা</b></td>
                    <td><b>@php echo $j; @endphp টাকা</b></td>
                    <td ></td>
                  </tr>
                </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->

    <?php
    # code...
  }

   ?>




@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{asset('sell_report.js')}}"></script>

<script>
     $(document).ready(function() {
      //Default data table
       $('#default-datatable').DataTable();


       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );

    </script>

    <script>
      $('#default-datepicker').datepicker({
        todayHighlight: true
      });
      $('#autoclose-datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
      });

      $('#inline-datepicker').datepicker({
         todayHighlight: true
      });

      $('#dateragne-picker .input-daterange').datepicker({
       });

    </script>


    <!-- select -->



    <script>
        $(document).ready(function() {
            $('.single-select').select2();
      
            $('.multiple-select').select2();

        //multiselect start

            $('#my_multi_select1').multiSelect();
            $('#my_multi_select2').multiSelect({
                selectableOptgroup: true
            });

            $('#my_multi_select3').multiSelect({
                selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                afterInit: function (ms) {
                    var that = this,
                        $selectableSearch = that.$selectableUl.prev(),
                        $selectionSearch = that.$selectionUl.prev(),
                        selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                        .on('keydown', function (e) {
                            if (e.which === 40) {
                                that.$selectableUl.focus();
                                return false;
                            }
                        });

                    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                        .on('keydown', function (e) {
                            if (e.which == 40) {
                                that.$selectionUl.focus();
                                return false;
                            }
                        });
                },
                afterSelect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                },
                afterDeselect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                }
            });

         $('.custom-header').multiSelect({
              selectableHeader: "<div class='custom-header'>Selectable items</div>",
              selectionHeader: "<div class='custom-header'>Selection items</div>",
              selectableFooter: "<div class='custom-header'>Selectable footer</div>",
              selectionFooter: "<div class='custom-header'>Selection footer</div>"
            });



          });

    </script>

@endsection

