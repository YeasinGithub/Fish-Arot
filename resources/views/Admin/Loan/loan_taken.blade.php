@extends('Admin.master')

@section('styles')
  <link href="{{ asset('Admin/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
  
<div class="content-wrapper">
    <form action="" method="POST" id="loan">
      @csrf
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-address-book-o"></i>
                   লোন নেওয়া
                </h4>

                <div class="form-group row">
                  <label for="input-10" class="col-sm-2 col-form-label">নাম</label>
                  <div class="col-sm-4">
                    <input type="text" id="name" class="form-control" name="name" required placeholder="নাম লিখুন">
                  </div>
                  <label for="input-10" class="col-sm-2 col-form-label">মোবাইল</label>
                  <div class="col-sm-4">
                    <input type="text" id="phone" class="form-control" placeholder="নাম্বার লিখুন">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-11" class="col-sm-2 col-form-label">তারিখ</label>
                  <div class="col-sm-4">
                    <input type="date" id="date" class="form-control" required>
                  </div>
                  <label for="input-12" class="col-sm-2 col-form-label">লোনের পরিমান</label>
                  <div class="col-sm-4">
                    <input type="number" id="loan_amount" class="form-control" name="hal" placeholder="টাকার পরিমান">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">জমা</label>
                  <div class="col-sm-4">
                    <input type="number" id="paid" class="form-control" name="total" placeholder="জমা">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">অবশিষ্ট</label>
                  <div class="col-sm-4">
                    <input type="number" id="due" class="form-control" name="paid" readonly>
                  </div>
                </div>

                <div class="form-footer">
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</button>
                    <button type="submit" name="submit" class="btn btn-success" id="saveDue"><i class="fa fa-check-square-o"></i> SAVE</button>
                </div>

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
          <table id="dataTableExample" class="table loanTable">
            <thead>
                <tr>
                    <th>নাম</th>
                    <th>মোবাইল</th>
                    <th>তারিখ</th>
                    <th>লোনের পরিমান</th>
                    <th>জমা</th>
                    <th>অবশিষ্ট</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($loans as $loan)
                  <td>{{$loan->name}}</td>
                  <td>{{$loan->phone}}</td>
                  <td>{{$loan->date}}</td>
                  <td>{{$loan->loan_amount}}</td>
                  <td>{{$loan->paid}}</td>
                  <td>{{$loan->due}}</td>
                  <td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
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



@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{asset('loan_taken.js')}}"></script>

  <script src="{{ asset('Admin/assets/plugins/bootstrap-datatable/jsjquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>

  <script src="{{ asset('assets/js/data-table.js') }}"></script>

@endsection

