@extends('Admin.master')
@section('styles')
<link href="{{ asset('Admin/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
  <div class="content-wrapper">
              <form action="" method="POST" id="chalanBad">
                @csrf
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-address-book-o"></i>
                   নতুন চালান বাদ যুক্ত করুন
                </h4>
                <div class="form-group row">
                  <label for="input-10" class="col-sm-2 col-form-label">মন্দির</label>
                  <div class="col-sm-4">
                    <input type="text" id="mondir" class="form-control ttaka">
                  </div>
                  <label for="input-10" class="col-sm-2 col-form-label">কমিশন</label>
                  <div class="col-sm-4">
                    <input type="text" id="komition" class="form-control ttaka">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-11" class="col-sm-2 col-form-label">খাজনা</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control ttaka" id="khajna">
                  </div>
                  <label for="input-12" class="col-sm-2 col-form-label">নগদ</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control ttaka" id="nagad">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">কয়েলী</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control ttaka" id="koheli">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">সমিতি</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control ttaka" id="somity">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">গাড়ি ভাড়া</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control ttaka" id="gari_bara">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">লাইন খরচ</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control ttaka" id="line_cost">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">পার্কিং</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control ttaka" id="parking">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">হাওলাত</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control ttaka" id="haolat">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">বরফ</label>
                  <div class="col-sm-4">
                    <input type="text" id="ice" class="form-control ttaka">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">কুলি</label>
                  <div class="col-sm-4">
                    <input type="text" id="kuli" class="form-control ttaka">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">বাজে খরচ</label>
                  <div class="col-sm-4">
                    <input type="text" id="baje_cost" class="form-control ttaka">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">টি.টি / ডি.ডি</label>
                  <div class="col-sm-4">
                    <input type="text" id="tity_didy" class="form-control ttaka">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">আমানত</label>
                  <div class="col-sm-4">
                    <input type="text" id="amanot" class="form-control ttaka">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">ডিউটি</label>
                  <div class="col-sm-4">
                    <input type="text" id="duty" class="form-control ttaka">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-4">

                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">মোট</label>
                  <div class="col-sm-4">
                    <input type="text" id="total" class="mot form-control total0 chalan total" readonly>
                  </div>
                </div>
                <!--  -->


                <div class="form-footer">
                  <div class="form-group row">
                    <label for="input-13" class="col-sm-2 col-form-label">চালান টোটাল</label>
                    <div class="col-sm-4">
                      <select class="form-control chalan chalan_total" id="chalan_total" name="chalan_total" required>
                        <option selected="selected" class="chalan">-চালান-</option>
                        @foreach($chalans as $chalan)
                        <option value="{{$chalan->last_total}}" class="chalan">{{$chalan->last_total}}</option>
                        @endforeach
                    </select>
                    </div>
                    <label for="input-13" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                    </div>
                </div>
                </div>

                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">খরচ বাদ</label>
                  <div class="col-sm-4">  
                    <input type="text" class="form-control khoros_bad" id="khoros_bad" readonly>
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-4">
                  </div>
                </div>

                <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</button>
                <button type="submit" name="submit" class="btn btn-success" id="saveDue"><i class="fa fa-check-square-o"></i> SAVE</button>

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
          <table id="dataTableExample" class="table table-bordered">
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
                    <th>চালান</th>
                    <th>মোট</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($chalanbads as $chalanbad)
              <tr id="sid{{$chalanbad->id}}">
                  <td>{{$chalanbad->mondir}}</td>
                  <td>{{$chalanbad->komition}}</td>
                  <td>{{$chalanbad->khajna}}</td>
                  <td>{{$chalanbad->nagad}}</td>
                  <td>{{$chalanbad->koheli}}</td>
                  <td>{{$chalanbad->somity}}</td>
                  <td>{{$chalanbad->gari_bara}}</td>
                  <td>{{$chalanbad->line_cost}}</td>
                  <td>{{$chalanbad->parking}}</td>
                  <td>{{$chalanbad->haolat}}</td>
                  <td>{{$chalanbad->ice}}</td>
                  <td>{{$chalanbad->kuli}}</td>
                  <td>{{$chalanbad->baje_cost}}</td>
                  <td>{{$chalanbad->tity_didy}}</td>
                  <td>{{$chalanbad->amanot}}</td>
                  <td>{{$chalanbad->duty}}</td>
                  <td>{{$chalanbad->total}}</td>
                  <td>{{$chalanbad->chalan_total}}</td>
                  <td>{{$chalanbad->khoros_bad}}</td>
                  <td>
                    <a href="javascript:void(0)" onclick="editFunc({{$chalanbad->id}})" class="btn btn-info btn-sm">edit</a>
    <a href="javascript:void(0)" onclick="deleteFunc({{$chalanbad->id}})" class="btn btn-danger btn-sm" >delete</a>
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
<script src="{{asset('chalan_bad.js')}}"></script>

@endsection





<!--Edit Modal -->
<div class="modal fade" id="editChalanBad" tabindex="-1" role="dialog" aria-labelledby="exampleModalsScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalsScrollableTitle">Chalan Bad Update Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       <form id="chalanbadEditForm">
        @csrf
    <input type="hidden" id="id" name="id">
          <div class="form-group row">
                  <label for="input-10" class="col-sm-2 col-form-label">মন্দির</label>
                  <div class="col-sm-4">
                    <input type="text" id="Emondir" class="form-control ttaka" >
                  </div>
                  <label for="input-10" class="col-sm-2 col-form-label">কমিশন</label>
                  <div class="col-sm-4">
                    <input type="text" id="Ekomition" class="form-control ttaka" >
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-11" class="col-sm-2 col-form-label">খাজনা</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control ttaka" id="Ekhajna" >
                  </div>
                  <label for="input-12" class="col-sm-2 col-form-label">নগদ</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control ttaka" id="Enagad">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">কয়েলী</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control ttaka" id="Ekoheli">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">সমিতি</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control ttaka" id="Esomity" >
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">গাড়ি ভাড়া</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control ttaka" id="Egari_bara">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">লাইন খরচ</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control ttaka" id="Eline_cost">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">পার্কিং</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control ttaka" id="Eparking">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">হাওলাত</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control ttaka" id="Ehaolat">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">বরফ</label>
                  <div class="col-sm-4">
                    <input type="text" id="Eice" class="form-control ttaka">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">কুলি</label>
                  <div class="col-sm-4">
                    <input type="text" id="Ekuli" class="form-control ttaka">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">বাজে খরচ</label>
                  <div class="col-sm-4">
                    <input type="text" id="Ebaje_cost" class="form-control ttaka">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">টি.টি / ডি.ডি</label>
                  <div class="col-sm-4">
                    <input type="text" id="Etity_didy" class="form-control ttaka">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">আমানত</label>
                  <div class="col-sm-4">
                    <input type="text" id="Eamanot" class="form-control ttaka">
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">ডিউটি</label>
                  <div class="col-sm-4">
                    <input type="text" id="Eduty" class="form-control ttaka">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-4">

                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label">মোট</label>
                  <div class="col-sm-4">
                    <input type="text" id="Etotal" class="form-control total0" readonly>
                  </div>
                </div>


                <div class="form-group row">
                    <label for="input-13" class="col-sm-2 col-form-label">চালান টোটাল</label>
                    <div class="col-sm-4">
                      <select class="form-control chalan chalan_total" id="Echalan_total" name="chalan_total" required>
                        <option selected="selected" class="chalan">-চালান-</option>
                        @foreach($chalans as $chalan)
                        <option value="{{$chalan->last_total}}" class="chalan">{{$chalan->last_total}}</option>
                        @endforeach
                    </select>
                    </div>
                    <label for="input-13" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                    </div>
                </div>

                <div class="form-group row">
                  <label for="input-13" class="col-sm-2 col-form-label">খরচ বাদ</label>
                  <div class="col-sm-4">  
                    <input type="text" class="form-control khoros_bad" id="Ekhoros_bad" readonly>
                  </div>
                  <label for="input-13" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-4">
                  </div>
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