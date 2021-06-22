@extends('Admin.master')
@section('styles')
  <link href="{{ asset('Admin/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
  
  <div class="content-wrapper">
    <div class="container-fluid">
    <!-- End Breadcrumb-->
	
		 <div class="row">
			<div class="col-lg-10 mx-auto">
			   <div class="card">
			     <div class="card-body">
				   <div class="card-title">নতুন চালান যুক্ত করুন</div>
           <button onclick="window.print()" class="btn-primary">print</button>
				   <hr>
				    <form>
					 <div class="form-group">
					  <label for="input-1">মাছের নাম</label>
					  <input type="text" class="form-control" id="input-1" placeholder="মাছের নাম লিখুন">
					 </div>
					 <div class="form-group">
					  <label for="input-2">পরিমান / কেজি</label>
					  <input type="text" class="form-control" id="input-2" placeholder="মাছের কেজি">
					 </div>
					 <div class="form-group">
					  <label for="input-3">গ্রাম</label>
					  <input type="text" class="form-control" id="input-3" placeholder="কত গ্রাম">
					 </div>
					 <div class="form-group">
					  <label for="input-3">দর প্রতি কেজি</label>
					  <input type="text" class="form-control" id="input-3" placeholder="দর প্রতি কেজি">
					 </div>
					 <div class="form-group">
					  <label for="input-3">টাকার পরিমান</label>
					  <input type="text" class="form-control" id="input-3" placeholder="টাকার পরিমান">
					 </div>
					 <div class="form-group">
					  <button type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i>Save </button>
					</div>
					</form>
				 </div>
			   </div>
			   
			</div>
		  </div><!--End Row-->

		  <!-- show data -->
	<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header"><i class="fa fa-table"></i>সকল চালান</div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>মাছের নাম</th>
                    <th>পরিমান / কেজি</th>
                    <th>গ্রাম</th>
                    <th>দর প্রতি কেজি</th>
                    <th>টাকার পরিমান</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td>রুই</td>
                <td>১০০ কেজি</td>
                <td>৫০০ গ্রাম</td>
                <td>৩০০</td>
                <td>৬০০০</td>
                <td>
                  <a href="{{ url('/dadon/edit/') }}" data-id="" id="dadonId" class="btn btn-sm btn-info">Edit</a>

                  <a href="{{ url('/dadon/delete/') }}" data-id="" id="deleteId"  class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
              <tr>
                <td>রুই</td>
                <td>১০০ কেজি</td>
                <td>৫০০ গ্রাম</td>
                <td>৩০০</td>
                <td>৬০০০</td>
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

		  <!--start overlay-->
	  <div class="overlay toggle-menu"></div>
	<!--end overlay-->
    </div>
    <!-- End container-fluid-->
    
   </div><!--End content-wrapper-->

  @endsection

  @section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{asset('chalan.js')}}"></script>

  <script src="{{ asset('Admin/assets/plugins/bootstrap-datatable/jsjquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>

  <script src="{{ asset('assets/js/data-table.js') }}"></script>

@endsection

