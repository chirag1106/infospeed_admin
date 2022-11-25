@extends('Admin.layouts.user_type.auth')
@section('content')
<div class="row">
  <div class="cart px-0">
    <div class="d-flex justify-content-between align-items-center align-content-center ">
      <button type="button" class="btn add_btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size:20px; font-weight:900;">
        Add Village
      </button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content p-3" style="border-radius: 20px;">

          <div class="modal-header d-flex justify-content-center align-items-center align-content-center btn-primary text-white" style="border-bottom: none; border-top-left-radius: none; border-top-right-radius: none ">
            <h5 class="modal-title text-center ps-4 text-white" style="text-transform:capitalize;" id="exampleModalLabel" style="font-weight: 700; ">{{$panchayat->panchayat_name ?? ''}}</h5>
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close" style="margin-right:20px; font-weight:bolder;"></button>
          </div>
          @csrf
          <hr>
          <div class="modal-body">
            <div class="card" style="border:none; box-shadow:none !important;">
              <div class="col-xl-12 mx-auto">
                <form method="post" action="{{ url('panchayat-village') }}">
                  @csrf
                  <div class="listings-container  px-3 my-2">
                    <input type="hidden" name="loksabha_id" value="{{$panchayat->loksabha_id ?? ''}}">
                    <input type="hidden" name="vidhansabha_id" value="{{$panchayat->vidhansabha_id ?? ''}}">
                    <input type="hidden" name="block_id" value="{{$panchayat->block_id ?? ''}}">
                    <input type="hidden" name="panchayat_id" value="{{$panchayat->id?? ''}}">

                    <div class="desgin-form d-flex setting flex-row modal-text my-4">
                      <h5 class="form_heading modal-text w-25">Ward/Village choose</h5>
                      <select name="ward_village" id="ward_village" class="form-control ward_village w-75" required>
                        <option value="">Choose Ward/Village </option>
                        @if(!empty($village))
                        <option value="{{$village['id'] ?? ''}}" selected>{{$village['name'] ?? ''}}</option>
                        @endif
                      </select>
                    </div>
                    <div class="desgin-form d-flex setting flex-row modal-text my-4">
                      <h5 class="form_heading modal-text w-25">Ward/Village Name</h5>
                      <input type="text" name="village_name" id="village" class="form-control custom-input form_input modal-text w-75" required>
                    </div>
                  </div>
                  <div class="modal-footer mx-auto " style="justify-content:center!important; ">
                    <button type="submit" class="btn btn-primary btn-primary-2 w-25 mb-0" style="font-size:15px; padding:10px;">Save changes</button>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>

<div class="row">
  <div class="col-lg-12 px-0">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6 style="font-size: 1.5rem;font-weight:bold; text-transform: capitalize"> {{$panchayat->panchayat_name ?? ''}}</h6>
      </div>
      <div class="card-body pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table table-responsive align-items-center justify-content-center mb-0">
            <thead style="background: #7D6F6C;">
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center text-white w-25" style="border-top-left-radius: 16px; border-bottom-left-radius: 16px;">Ward/Village</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center text-white w-25">Village Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center text-white w-25" style="border-top-right-radius: 16px; border-bottom-right-radius: 16px;">Action</th>
                {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center w-25">Status</th> --}}
              </tr>
            </thead>
            <tbody>
              @foreach($wards as $key=> $item)
              <tr class="table-form">
                <form method="post" action="{{url('edit-village').'/'.$item->id}}" id="form-id">
                  @csrf
                  {{-- <td>
                        <div class=" px-2">
                          <div class="my-auto">
                            @if($item->panchayat_choosing==1)
                        <label class="">Mahanagar Palika</label>
                        @elseif($item->panchayat_choosing==2)
                        <label class="">Gram Panchayat</label>
                        @else
                        <label class="input_label"></label>
                        @endif
                      
                          </div>
                        </div>
                      </td> --}}
                  <td class="text-center">
                    @if($item->village_choosing==1)
                    <label class="input_label">Ward</label>
                    @elseif($item->village_choosing==2)
                    <label class="input_label">Village</label>
                    @else
                    <label class="input_label"></label>
                    @endif

                  </td>
                  <td class="text-center">
                    <div class=" px-2">
                      <div class="my-auto">
                        <a href="{{url('village-booth').'/'.$item->id}}" target="blank"><label class="input_label pointer">{{ $item->village_name ?? ''}}</label></a>
                        <input type="text" class="form-control form_input d-none text-capitalize" name="village_name" style="width:100%" value="{{ $item->village_name ?? '' }}" required>
                      </div>
                    </div>
                  </td>
                  <td class="actions text-center">
                    <div class="form-action text-center" style="display: none;">
                      <button type="submit" class="edit_submit btn-primary-2 text-center mx-1 img-fluid position-relative text-white" style="border-radius:50%"><i class="fa-solid fa-floppy-disk" style="margin: 4px; margin-top: 5px;"></i></button>
                      <button type="button" class="edit_cancel btn-primary-2 text-center mx-1 img-fluid position-relative text-white" style="border-radius:50%"><i class="fa-solid fa-xmark" style="margin: 4px; margin-top: 5px;"></i></button>
                    </div>
                    <div class="table-action text-center" style="display: block;">
                      <a href="javascript:;" class="list_edit mb-0 text-center"><img src="{{ asset('/assets/img/edit.png') }}" alt="" class="img-fluid mx-1"></a>
                      <a href="{{url('village-delete').'/'.$item->id}}" class="emp_delete mb-0 text-center"><img src="{{ asset('/assets/img/delete.png') }}" alt="" class="img-fluid mx-1"></a>
                    </div>
                  </td>
                </form>
                {{-- @if($item->status==2)
                    <td class="text-center">
                      <a href="{{url('loksabha-active').'/'.$item->id}}" class="btn btn-success mx-1 mb-0 col-lg-5" >&nbsp;&nbsp;Active&nbsp;&nbsp;</a>
                </td>
                @else($item->status==1)
                <td class="text-center">
                  <a href="{{url('loksabha-deactive').'/'.$item->id}}" class="btn btn-danger mx-1 mb-0 col-lg-5">Deactive</a>
                </td>
                @endif --}}
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="d-flex flex-column justify-content-center align-items-center align-content-center mb-1 mt-1 mx-auto">
        {{$wards->links('pagination::bootstrap-4')}}
        {{$wards->links('pagination::simple-tailwind') }}
        {{ $wards->links('pagination::semantic-ui') }}
        {{ $wards->links('pagination::simple-tailwind') }}
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
@endsection