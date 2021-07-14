@extends('Admin.master')
@section('styles')

@endsection
@section('content')
<div class="content-wrapper">
<div class="container-fluid">
<!-- End Breadcrumb-->
 <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <form id="chalan">
             @csrf
            <h4 class="form-header text-uppercase">
              <i class="fa fa-address-book-o"></i>
               নতুন চালান যুক্ত করুন
            </h4>
            <div class="form-group row">
              <label for="input-10" class="col-sm-2 col-form-label">মহাজন নাম</label>
              <div class="col-sm-4">
                    <select class="form-control" id="mohajon_id" name="mohajon_id">
                      <option disabled="disabled" selected="selected">মহাজন সিলেক্ট করুন</option>
                      @foreach($mohajons as $mohajon)
                      <option value="{{$mohajon->id}}">{{$mohajon->mohajon_name}}</option>
                      @endforeach
                      
                  </select>
              </div>
              <label for="input-11" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-4">
                
              </div>
            </div>
            <div class="form-group row">
              <label for="input-10" class="col-sm-2 col-form-label">মহাজন ঠিকানা</label>
              <div class="col-sm-4">
                <textarea name="mohajon_address" id="mohajon_address" class="form-control" readonly></textarea>
              </div>
              <label for="input-13" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-4">
                
              </div>
            </div>
            <div class="form-group row">
              <label for="input-10" class="col-sm-2 col-form-label">তারিখ</label>
              <div class="col-sm-4">
                <input type="datetime-local" id="ddate" class="form-control" name="date" required>
              </div>
              <label for="input-13" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-4">
                
              </div>
            </div>

          <div class="form-group row">
            <table>
            <thead>
              <tr>
                <th scope="col">মাছের নাম</th>
                <th scope="col">কেজি/গ্রাম</th>
                <th scope="col">দর প্রতি কেজি</th>
                <th scope="col">টাকার পরিমান</th>
                <th scope="col"><button id="add_new" type="button" name="add_new" class="btn btn-sm btn-success"> +</button></th>
              </tr>
              </thead>
              <tbody id="mainbody">

              <tr>
                <td>
                  <input class="col-sm col-form-label" type="text" name="addmore[0][fish_name]" required id="fish_name0">
                </td>
                <td>
                  <input class="kg_gram col-sm col-form-label" type="text" name="addmore[0][kg_gram]" id="kg_gram0" required>
                </td>
                <td>
                  <input class="rate_per_kg col-sm col-form-label" type="text" name="addmore[0][rate_per_kg]" id="rate_per_kg0" value="" required>
                </td>
                <td>
                  <input class="totalC col-sm col-form-label" type="text" name="addmore[0][total_taka]" id="total_taka0" value="" readonly>
                </td>

              </tr>
              </tbody>
              <!--  -->
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td><small></td>
                  <td><input type="text" class="col-sm col-form-label" name="total_kg" id="kg" readonly placeholder="total kg"></td>
                  <td></td>
            <td><input type="text" class="col-sm col-form-label" name="last_total" id="net" readonly placeholder="net price"></td>
                </tr>
                </tbody>



              </table>
        </div>

            <div class="form-footer">
                <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> SAVE</button>
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
        <div class="card-header"><i class="fa fa-table"></i>চালান</div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="dataTableExample" class="table loanTable">
            <thead>
            <tr>
                <th>মহাজন নাম</th>
                <th>মহাজন ঠিকানা</th>
                <th>মাছের নাম</th>
                <th>কেজি/গ্রাম</th>
                <th>দর প্রতি কেজি</th>
                <th>টাকার পরিমান</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          
          @foreach($chalans as $chalan)
          <tr id="sid{{$chalan->id}}" >
            <td>{{$chalan->mohajon->mohajon_name}}</td>
            <td>{{$chalan->mohajon_address}}</td>
            <td>{{$chalan->fish_name}}</td>
            <td>{{$chalan->kg_gram}}</td>
            <td>{{$chalan->rate_per_kg}}</td>
            <td>{{$chalan->total_taka}}</td>
            <td>
              <a href="{{ url('/chalan/edit/') }}" data-id="{{$chalan->id}}" id="chalanId" class="btn btn-sm btn-info">Edit</a>

              <a href="javascript:void(0)" onclick="deleteFunc({{$chalan->id}})" class="btn btn-danger btn-sm" >delete</a>
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

  <!--start overlay-->
<div class="overlay toggle-menu"></div>
<!--end overlay-->
</div>
  <!-- End container-fluid-->
  
 </div><!--End content-wrapper-->

  @endsection

@section('scripts')
<script src="{{asset('chalan.js')}}"></script>


@endsection

<!--Edit Modal -->
<div class="modal fade" id="editChalan" tabindex="-1" role="dialog" aria-labelledby="exampleModalsScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalsScrollableTitle">Chalan Update Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="{{url('/chalan/update/')}}" method="post" id="editChalanForm">
        @csrf
      <div class="modal-body">

        <input type="hidden" name="id" id="chalanId">
          <div class="form-group">
            <label class="col-form-label">মাছের নাম:</label>
            <input type="text" class="form-control" required id="Ename" name="fish_name" minlength="2">
          </div>
          <div class="form-group">
            <label class="col-form-label">কেজি/গ্রাম:</label>
            <input type="text" class="form-control kg_gram" required id="Ekg" name="kg_gram">
          </div>
          <div class="form-group">
            <label class="col-form-label">দর প্রতি কেজি:</label>
            <input type="text" class="form-control rate_per_kg" required id="Erate" name="rate_per_kg">
          </div>
          <div class="form-group">
            <label class="col-form-label">টাকার পরিমান:</label>
            <input type="text" class="form-control total_taka" readonly id="Etotal" name="total_taka">
          </div>
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>

    </div>
  </div>
</div>
<!-- end Edit Modal -->
