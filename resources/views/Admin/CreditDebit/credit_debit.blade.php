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
                   জমা খরচ খাতা
                </h4>
                <div class="form-group row">
                  <label for="input-10" class="col-sm-2 col-form-label">সাবেক</label>
                  <div class="col-sm-4">
                    <input type="text" id="Ddebit" class="form-control" name="name" required>
                  </div>
                  <label for="input-10" class="col-sm-2 col-form-label">মহাজনের বিল</label>
                  <div class="col-sm-4">
                    <input type="text" id="Ddebit" class="form-control" name="name" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-11" class="col-sm-2 col-form-label">নগদ বিক্রয়</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="date" required>
                  </div>
                  <label for="input-12" class="col-sm-2 col-form-label">খরচ</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="day">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">হাওলাত নেওয়া</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="mobile">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">হাওলাত দেওয়া</label>
                  <div class="col-sm-4">
                    <input type="number" id="Dtaka" class="form-control" name="total_amount" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">আদায়</label>
                  <div class="col-sm-4">
                    <input type="number" id="Dpaid" class="form-control" name="paid">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">মোট</label>
                  <div class="col-sm-4">
                    <input type="number" id="Dlast" class="form-control" name="last_total" placeholder="মোট">
                  </div>
                </div>


                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">মোট</label>
                  <div class="col-sm-4">
                    <input type="number" id="Dpaid" class="form-control" name="paid" placeholder="মোট">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-4">
                    
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-4">
                    
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">অবশিষ্ট</label>
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
        <div class="card-header"><i class="fa fa-table"></i>সকল জমা খরচ</div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>নাম</th>
                    <th>ঠিকানা</th>
                    <th>তারিখ</th>
                    <th>বার</th>
                    <th>মোবাইল</th>
                    <th>মোট টাকা</th>
                    <th>জমা</th>
                    <th>অবশিষ্ট দাদন</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td>করিম</td>
                <td>করিম পুর</td>
                <td>১০-২-২০২১</td>
                <td>রবিবার</td>
                <td>০১৬৩০৫০৩৪১</td>
                <td>৪৫৫৫</td>
                <td>৪০০০</td>
                <td>৫৫৫</td>
                <td>
                  <a href="{{ url('/dadon/edit/') }}" data-id="" id="dadonId" class="btn btn-sm btn-info">Edit</a>

                  <a href="{{ url('/dadon/delete/') }}" data-id="" id="deleteId"  class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
              <tr>
                <td>করিম</td>
                <td>করিম পুর</td>
                <td>১০-২-২০২১</td>
                <td>রবিবার</td>
                <td>০১৬৩০৫০৩৪১</td>
                <td>৪৫৫৫</td>
                <td>৪০০০</td>
                <td>৫৫৫</td>
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
<script src="{{asset('credit_debit.js')}}"></script>

  <script src="{{ asset('Admin/assets/plugins/bootstrap-datatable/jsjquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>

  <script src="{{ asset('assets/js/data-table.js') }}"></script>

@endsection

