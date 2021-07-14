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
                   লোন দেওয়া
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
                    <input type="text" id="loan_amount" class="form-control" name="hal" placeholder="টাকার পরিমান">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">জমা</label>
                  <div class="col-sm-4">
                    <input type="text" id="paid" class="form-control" name="total" placeholder="জমা">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">অবশিষ্ট</label>
                  <div class="col-sm-4">
                    <input type="text" id="due" class="form-control" name="paid" readonly>
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
              <tr id="sid{{$loan->id}}">
                  <td>{{$loan->name}}</td>
                  <td>{{$loan->phone}}</td>
                  <td>{{$loan->date}}</td>
                  <td>{{$loan->loan_amount}}</td>
                  <td>{{$loan->paid}}</td>
                  <td>{{$loan->due}}</td>
                  <td>
                    <a href="javascript:void(0)" onclick="editFunc({{$loan->id}})" class="btn btn-info btn-sm">edit</a>
    <a href="javascript:void(0)" onclick="deleteFunc({{$loan->id}})" class="btn btn-danger btn-sm" >delete</a>
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



@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{asset('loan_given.js')}}"></script>

  <script src="{{ asset('Admin/assets/plugins/bootstrap-datatable/jsjquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>

  <script src="{{ asset('assets/js/data-table.js') }}"></script>

@endsection

<!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalsScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalsScrollableTitle">Loan Update Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       <form id="studentEditForm">
        @csrf
    <input type="hidden" id="id" name="id">
          <div class="form-group">
            <label class="col-form-label">Name:</label>
            <input type="text" class="form-control" required id="name2">
          </div>
          <div class="form-group">
            <label class="col-form-label">Phone:</label>
            <input type="text" class="form-control" required id="phone2">
          </div>
          <div class="form-group">
            <label class="col-form-label">Date:</label>
            <input type="date" class="form-control" required id="date2">
          </div>
          <div class="form-group">
            <label class="col-form-label">Loan Amount:</label>
            <input type="text" class="form-control" required id="amount2">
          </div>
          <div class="form-group">
            <label class="col-form-label">Paid:</label>
            <input type="text" class="form-control" required id="paid2">
          </div>
          <div class="form-group">
            <label class="col-form-label">Due:</label>
            <input type="text" class="form-control" required id="due2">
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary">update</button>
      </div>
      </form>

    </div>
  </div>
</div>
<!-- end Edit Modal -->