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
                   মহাজন খাতা
                </h4>
                <div class="form-group row">
                  <label for="input-10" class="col-sm-1 col-form-label">মহাজন নাম</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="mohajon_name" required>
                    <input name="status" value="1" hidden>
                  </div>
                  <label for="input-10" class="col-sm-1 col-form-label">মহাজন ঠিকানা</label>
                  <div class="col-sm-4">
                    <textarea name="address" class="form-control" required placeholder="ঠিকানা"></textarea>
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
        <div class="card-header"><i class="fa fa-table"></i>সকল মহাজন</div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>মহাজন নাম</th>
                    <th>মহাজন ঠিকানা</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               

                @foreach($mohajons as $mohajon)

              <tr>
                <td>{{$mohajon->mohajon_name}}</td>
                <td>{{$mohajon->address}}</td>
                <td>
                  <a href="{{ url('/mohajon/edit/') }}" data-id="{{$mohajon->id}}" id="dadonId" class="btn btn-sm btn-info">Edit</a>

                  <a href="{{ url('/mohajon/delete/') }}" data-id="{{$mohajon->id}}" id="deleteId"  class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>

                  @endforeach
                  
            </tbody>
            
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
 <div class="modal fade" id="editDadon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDadonName"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <form action="{{url('/mohajon/update')}}" method="post" id="editDadonForm">
    {{ csrf_field() }}

      <div class="modal-body">
      <input type="hidden" name="id" id="dadonId">

      <div class="form-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
              নাম
            </span>
            <input type="text" class="form-control" id="Enames" name="mohajon_name">
        </div>
        </div>
        <div class="form-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
              ঠিকানা
            </span>
            <input type="text" class="form-control" id="Eaddress" name="address">
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
<script src="{{asset('mohajon.js')}}"></script>

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

