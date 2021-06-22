@extends('Admin.master')
@section('content')
  <div class="content-wrapper">
    <form action="" method="POST" id="due-us-form">
      @csrf
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <form id="signupForm">
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-address-book-o"></i>
                   বকেয়া খাতা
                </h4>
                <div class="form-group row">
                  <label for="input-10" class="col-sm-2 col-form-label">পাইকার নাম</label>
                  <div class="col-sm-4">
                        <select class="form-control single-select" name="paiker_id" id="paikar_id">
                          <option>Select Paikar</option>
                          @foreach($paikars as $paikar)
                          <option value="{{$paikar->id}}">{{$paikar->paikar_name}}</option>
                          @endforeach
                      </select>
                  </div>
                  <label for="input-10" class="col-sm-2 col-form-label">ঠিকানা</label>
                  <div class="col-sm-4">
                    <textarea name="address" id="paikar_address" class="form-control" required placeholder="পাইকার ঠিকানা"></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-11" class="col-sm-2 col-form-label">আজকের ঋণ</label>
                  <div class="col-sm-4">
                    <input type="text" id="Ddebit" class="form-control" name="due_amount_today" required>
                  </div>
                  <label for="input-12" class="col-sm-2 col-form-label">হাল</label>
                  <div class="col-sm-4">
                    <input type="text" id="Dhal" class="form-control" name="hal">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">মোট</label>
                  <div class="col-sm-4">
                    <input type="number" id="Dtotal" class="form-control" name="total" readonly>
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">জমা</label>
                  <div class="col-sm-4">
                    <input type="text" id="Dpaid" class="form-control" name="paid" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-4">

                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">মোট বাকী</label>
                  <div class="col-sm-4">
                    <input type="number" id="Ddue" class="form-control" name="total_due" readonly>
                  </div>
                </div>

                <div class="form-footer">
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</button>
                    <button type="submit" name="submit" class="btn btn-success" id="saveDue"><i class="fa fa-check-square-o"></i> SAVE</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div><!--End Row-->
    </form>

<!-- show data -->
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header"><i class="fa fa-table"></i>Due Data Table</div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>পাইকার নাম</th>
                    <th>ঠিকানা</th>
                    <th>আজকের ঋণ</th>
                    <th>হাল</th>
                    <th>মোট</th>
                    <th>জমা</th>
                    <th>মোট বাকী</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @php
                $j=0;
                @endphp

                @foreach($dues as $due)
              <tr>
                <td>{{$due->paikar->paikar_name}}</td>
                <td>{{$due->address}}</td>
                <td>{{$due->due_amount_today}}</td>
                <td>{{$due->hal}}</td>
                <td>{{$due->total}}</td>
                <td>{{$due->paid}}</td>
                <td>{{$due->total_due}}</td>
                <td>
                  <a href="{{ url('/due/edit/') }}" data-id="{{$due->id}}" id="dueId" class="btn btn-sm btn-info">Edit</a>

                  <a href="{{ url('/due/delete/') }}" data-id="{{$due->id}}" id="deleteId"  class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
                  @php

                    $j+=$due->total_due;

                  @endphp

                  @endforeach
                  
            </tbody>
              <tr>
                  <td style="border-right: none;"></td>
                  <td style="border-right: none;"></td>
                  <td style="border-right: none;"></td>
                  <td style="border-right: none;"></td>
                  <td style="border-right: none;"></td>
                  <td>মোট বকেয়া</td>
                  <td>@php echo $j; @endphp টাকা</td>
                  <td style="border-right: none;"></td>
              </tr>
              
        </table>
        </div>
        </div>
      </div>
    </div>
  </div><!-- End Row-->


      <div class="overlay toggle-menu"></div>
        <!--end overlay-->
      </div>


  @endsection


  <!-- Edit Modal -->
 <div class="modal fade" id="editDue" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDueName"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <form action="{{url('/due/update')}}" method="post" id="editDueForm">
    {{ csrf_field() }}

      <div class="modal-body">
      <input type="hidden" name="id" id="dueId">

        <div class="form-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
              পাইকার
            </span>
            <select class="form-control single-select" id="Epaikar" name="paiker_id">
              @foreach($paikars as $paikar)
              <option value="{{$paikar->id}}">{{$paikar->paikar_name}}</option>
              @endforeach
            </select>
        </div>
        </div>

        <div class="form-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
              ঠিকানা
            </span>
            <input type="text" class="form-control" id="Eaddress" name="address" readonly>
        </div>
        </div>

        <div class="form-group">
        <div class="input-group-prepend">
              <span class="input-group-text">
                আজকের <br> ঋণ
              </span>
              <input type="text" class="form-control" id="Edue_amount_today" name="due_amount_today">
        </div>
        </div>
        <div class="form-group">
        <div class="input-group-prepend">
              <span class="input-group-text">
                হাল
              </span>
              <input type="number" class="form-control" id="Ehal" name="hal" readonly>
        </div>
        </div>
        <div class="form-group">
        <div class="input-group-prepend">
              <span class="input-group-text">
                মোট
              </span>
              <input type="number" class="form-control" id="Etotal" name="total" readonly>
        </div>
        </div>
        <div class="form-group">
        <div class="input-group-prepend">
              <span class="input-group-text">
                জমা
              </span>
              <input type="text" class="form-control" id="Epaid" name="paid">
        </div>
        </div>
        <div class="form-group">
        <div class="input-group-prepend">
              <span class="input-group-text">
                মোট বাকী
              </span>
              <input type="text" class="form-control" id="Etotal_due" name="total_due">
        </div>
        </div>

    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit"  name="submit" value="submit" class="btn btn-sm btn-primary">Update</button>
      </div>
    </form>

    </div>
  </div>
</div>
<!-- end Edit Modal -->




@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{asset('due.js')}}"></script>

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

