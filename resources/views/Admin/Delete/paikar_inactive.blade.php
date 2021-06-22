@extends('Admin.master')
@section('content')
  <div class="content-wrapper">
    

<!-- show data -->
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header"><i class="fa fa-table"></i>সকল পাইকার</div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>পাইকার নাম</th>
                    <th>পাইকার ঠিকানা</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               

                @foreach($paikars as $paikar)

              <tr>
                <td>{{$paikar->paikar_name}}</td>
                <td>{{$paikar->address}}</td>
                <td>
                  <a href="{{ url('/paikar/active/') }}" data-id="{{$paikar->id}}" id="deleteId" class="btn btn-sm btn-info">Active</a>
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


      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  @endsection


 




@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{asset('inActivePaikar.js')}}"></script>

@endsection

