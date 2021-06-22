@extends('Admin.master')
@section('styles')
  <link href="{{ asset('Admin/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection

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
                   নতুন চালান বাদ যুক্ত করুন
                </h4>
                <div class="form-group row">
                  <label for="input-10" class="col-sm-2 col-form-label">মন্দির</label>
                  <div class="col-sm-4">
                    <input type="text" id="Ddebit" class="form-control" name="name" required>
                  </div>
                  <label for="input-10" class="col-sm-2 col-form-label">কমিশন</label>
                  <div class="col-sm-4">
                    <input type="text" id="Ddebit" class="form-control" name="name" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-11" class="col-sm-2 col-form-label">খাজনা</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="date" required>
                  </div>
                  <label for="input-12" class="col-sm-2 col-form-label">নগদ</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="day">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">কয়েলী</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="mobile">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">সমিতি</label>
                  <div class="col-sm-4">
                    <input type="number" id="Dtaka" class="form-control" name="total_amount" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">গাড়ি ভাড়া</label>
                  <div class="col-sm-4">
                    <input type="number" id="Dpaid" class="form-control" name="paid">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">লাইন খরচ</label>
                  <div class="col-sm-4">
                    <input type="number" id="Dlast" class="form-control" name="last_total">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">পার্কিং</label>
                  <div class="col-sm-4">
                    <input type="number" id="Dpaid" class="form-control" name="paid">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">হাওলাত</label>
                  <div class="col-sm-4">
                    <input type="number" id="Dlast" class="form-control" name="last_total">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">বরফ</label>
                  <div class="col-sm-4">
                    <input type="number" id="Dpaid" class="form-control" name="paid">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">কুলি</label>
                  <div class="col-sm-4">
                    <input type="number" id="Dlast" class="form-control" name="last_total">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">বাজে খরচ</label>
                  <div class="col-sm-4">
                    <input type="number" id="Dpaid" class="form-control" name="paid">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">টি.টি / ডি.ডি</label>
                  <div class="col-sm-4">
                  	<input type="number" id="Dlast" class="form-control" name="last_total">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">আমানত</label>
                  <div class="col-sm-4">
                    <input type="number" id="Dpaid" class="form-control" name="paid">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">ডিউটি</label>
                  <div class="col-sm-4">
                  	<input type="number" id="Dlast" class="form-control" name="last_total">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-4">

                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">মোট</label>
                  <div class="col-sm-4">
                  	<input type="number" id="Dlast" class="form-control" name="last_total" readonly>
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
        <div class="card-header"><i class="fa fa-table"></i>সকল চালান বাদ</div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>মন্দির</th>
                    <th>কমিশন</th>
                    <th>খাজনা</th>
                    <th>নগদ</th>
                    <th>কয়েলী</th>
                    <th>সমিতি</th>
                    <th>গাড়ি ভাড়া</th>
                    <th>লাইন খরচ</th>
                    <th>পার্কিং</th>
                    <th>হাওলাত</th>
                    <th>বরফ</th>
                    <th>কুলি</th>
                    <th>বাজে খরচ</th>
                    <th>টি.টি / ডি.ডি</th>
                    <th>আমানত</th>
                    <th>ডিউটি</th>
                    <th>মোট</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td>করিম পুর</td>
                <td>২%</td>
                <td>৩%</td>
                <td>২০২১</td>
                <td>৪০০</td>
                <td>৫০৩৪১</td>
                <td>৪৫৫৫</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>
                  <a href="{{ url('/dadon/edit/') }}" data-id="" id="dadonId" class="btn btn-sm btn-info">Edit</a>

                  <a href="{{ url('/dadon/delete/') }}" data-id="" id="deleteId"  class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
              <tr>
                <td>করিম পুর</td>
                <td>২%</td>
                <td>৩%</td>
                <td>২০২১</td>
                <td>৪০০</td>
                <td>৫০৩৪১</td>
                <td>৪৫৫৫</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>৭৮৮৮৯</td>
                <td>
                  <a href="{{ url('/dadon/edit/') }}" data-id="" id="dadonId" class="btn btn-sm btn-info">Edit</a>

                  <a href="{{ url('/dadon/delete/') }}" data-id="" id="deleteId"  class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
                  
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

  @section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{asset('chalan.js')}}"></script>

  <script src="{{ asset('Admin/assets/plugins/bootstrap-datatable/jsjquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>

  <script src="{{ asset('assets/js/data-table.js') }}"></script>

@endsection

