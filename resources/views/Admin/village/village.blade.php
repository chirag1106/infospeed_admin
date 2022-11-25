@extends('Admin.layouts.user_type.auth')

@section('content')
<div class="row">
  <div class="cart px-0">
    <div class="d-flex justify-content-between align-items-center align-content-center ">
      <button type="button" class="btn add_btn text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size:20px; font-weight:900;background: #7D6F6C; box-shadow: 2px 2px 14px 2px rgba(0, 0, 0, 0.25); border-radius: 16px;">
        Add Village
      </button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content p-3" style="border-radius: 20px;">

          <div class="modal-header d-flex justify-content-center align-items-center align-content-center btn-primary" style="border-bottom: none; border-top-left-radius: none; border-top-right-radius: none ">
            <h5 class="modal-title text-center ps-4 text-white" id="exampleModalLabel" style="font-weight: 700; ">Add Ward-Village</h5>
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close" style="margin-right:20px; font-weight:700;"></button>
          </div>
          @csrf
          <hr>
          <div class="modal-body">
            <div class="card" style="border:none; box-shadow:none !important;">
              <div class="col-xl-12 mx-auto">
                <form method="post" action="{{url('ward-village')}}" class="form">
                  @csrf
                  <div class="listings-container  px-3 my-2">
                    <div class="desgin-form d-flex flex-row setting">
                      <h5 class="form_heading modal-text w-25">Choose Lok Sabha</h5>
                      <select name="ls_name" id="ls_name" class="form-control ls_name w-75" data-type="lok" required>
                        <option value>Select Lok Sabha</option>
                        @foreach($data as $key => $loksabha)
                        <option value="{{$loksabha->id ?? ''}}">{{$loksabha->ls_name ?? ''}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="desgin-form d-flex setting flex-row modal-text my-4">
                      <h5 class="form_heading modal-text w-25">Vidhan Sabha Name</h5>
                      <select name="vs_name" id="vs_name" class="form-control vs_name ls_name w-75" data-type="vidhan" required>
                        <option value="">choose vidhan</option>
                      </select>
                    </div>
                    <div class="desgin-form d-flex setting flex-row modal-text my-4">
                      <h5 class="form_heading modal-text w-25">Block Name</h5>
                      <select name="block_name" id="block_container" class="form-control block_container ls_name w-75" data-type="block" required>
                        <option value="">Choose Block</option>
                      </select>
                    </div>
                    <div class="desgin-form d-flex setting flex-row modal-text my-4">
                      <h5 class="form_heading modal-text w-25">Mahanagar/Panchayat Name</h5>
                      <select name="panchayat_name" id="panchayat_container" class="form-control panchayat_container ls_name w-75" data-type="mahanagar-panchayat" required>
                        <option value="">Choose Mahanagar/Panchayat</option>
                      </select>
                    </div>
                    <div class="desgin-form d-flex setting flex-row modal-text my-4">
                      <h5 class="form_heading modal-text w-25">Ward/Village choose</h5>
                      <select name="ward_village" id="ward_village" class="form-control ward_village w-75" required>
                        <option value="">Choose Ward/Village </option>

                      </select>
                    </div>
                    <div class="desgin-form d-flex setting flex-row modal-text my-4">
                      <h5 class="form_heading modal-text w-25">Ward/Village Name</h5>
                      <input type="text" name="village_name" id="village" class="form-control custom-input form_input modal-text w-75" required>
                    </div>
                    <div class="modal-footer mx-auto " style="justify-content:center!important; ">
                      <button type="submit" class="btn btn-primary btn-primary-2 w-25 mb-0" style="font-size:18px; padding:10px;">Save changes</button>
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
</div>
<div class="row">
  <div class="col-lg-12 px-lg-0">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6 style="font-size: 1.5rem;font-weight:bold;">Ward / Village Table</h6>
      </div>
      <div class="card-body pt-0 pb-2">
        <div class="" style="overflow-x:auto !important;">
          <table class="table align-items-center justify-content-center mb-0">
            <thead style="background: #7D6F6C;">
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25 text-center text-white" style="border-top-left-radius: 16px; border-bottom-left-radius: 16px;">Lok Sabha Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25 text-center text-white">Vidhan Sabha Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25 text-center text-white">Block Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25 text-center text-white">Mahanagar/Panchayat Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25 text-center text-white">Village/Ward Choosing</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25 text-center text-white">Village name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25 text-center text-white">Action</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25 text-center text-white" style="border-top-right-radius: 16px; border-bottom-right-radius: 16px;">Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($village as $key=> $item)
              <tr class="table-form">
                <form method="post" action="{{url('edit-village').'/'.$item->id}}" class="form-id">
                  @csrf
                  <td class="text-center">
                    <div class=" px-2">
                      <div class="my-auto">
                        <a href="{{url('lok-vidhan').'/'.$item->loksabha_id}}" target="_blank"><label class="input_label pointer">{{ $item->get_loksabha->ls_name ?? ''}}</label></a>
                      </div>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="{{url('vidhan-block').'/'.$item->vidhansabha_id}}" target="blank"> <label class="input_label pointer">{{ $item->get_vidhansabha->vs_name ?? ''}}</label></a>
                  </td>
                  <td class="text-center">
                    <a href="{{url('block-panchayat').'/'.$item->block_id}}" target="blank"><label class="input_label pointer">{{ $item->get_block->block_name ?? ''}}</label></a>
                  </td>
                  <td class="text-center">
                    <a href="{{url('panchayat-village').'/'.$item->panchayat_id}}" target="blank"><label class="input_label pointer">{{ $item->get_panchayat->panchayat_name ?? ''}}</label></a>

                  </td>
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
                    <a href="{{url('village-booth').'/'.$item->id}}" target="blank"><label class="input_label pointer">{{ $item->village_name ?? ''}}</label></a>
                    <input type="text" name="village_name" class="form-control form_input d-none" value="{{ $item->village_name ?? ''}}" required>
                  </td>
                  <td class="actions text-center">
                    <div class="form-action" style="display: none;">
                      <button type="submit" class="edit_submit btn-primary-2 text-center mx-1 img-fluid position-relative text-white" style="border-radius:50%"><i class="fa-solid fa-floppy-disk" style="margin: 4px; margin-top: 5px;"></i></button>
                      <button type="button" class="edit_cancel btn-primary-2 text-center mx-1 img-fluid position-relative text-white" style="border-radius:50%"><i class="fa-solid fa-xmark" style="margin: 4px; margin-top: 5px;"></i></button>
                    </div>
                    <div class="table-action" style="display: block;">
                      <a href="javascript:;" class="list_edit" data-toggle="tooltip" data-placement="bottom" title="Edit"><img src="{{ asset('/assets/img/edit.png') }}" alt="" class="img-fluid mx-1"></a>
                      <a href="{{url('village-delete').'/'.$item->id}}" class="emp_delete" data-toggle="tooltip" data-placement="bottom" title="Delete"><img src="{{ asset('/assets/img/delete.png') }}" alt="" class="img-fluid mx-1"></a>
                    </div>
                </form>
                </td>
                @if($item->village_status==2)
                <td class="text-center">
                  <form method="GET" action="{{url('village-active').'/'.$item->id}}">
                    <input type="checkbox" data-toggle="toggle" data-on=" " data-off=" " data-style="ios" data-key="check{{ $key }}" checked>
                  </form>
                </td>
                @else($item->village_status==1)
                <td class="text-center">
                  <form method="GET" action="{{url('village-deactive').'/'.$item->id}}">
                    <input type="checkbox" data-toggle="toggle" data-on=" " data-off=" " data-style="ios" data-key="check{{ $key }}">
                  </form>
                </td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="d-flex flex-column justify-content-center align-items-center align-content-center mb-1 mt-1 mx-auto">
        {{$village->links('pagination::bootstrap-4')}}
        <!-- {{ $village->links('pagination::simple-tailwind') }} -->
        <!-- {{ $village->links('pagination::semantic-ui') }}
              {{ $village->links('pagination::simple-tailwind') }} -->
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection