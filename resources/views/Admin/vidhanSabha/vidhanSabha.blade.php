@extends('Admin.layouts.user_type.auth')

@section('content')
<div class="row">
  <div class="cart px-0">
    <div class="d-flex justify-content-between align-items-center align-content-center ">
      <button type="button" class="btn add_btn text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size:20px; font-weight:900;background: #7D6F6C; box-shadow: 2px 2px 14px 2px rgba(0, 0, 0, 0.25); border-radius: 16px;">
        Add Vidhan Sabha
      </button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content p-3" style="border-radius: 20px;">

          <div class="modal-header d-flex justify-content-center align-items-center align-content-center btn-primary" style="border-bottom: none; border-top-left-radius: none; border-top-right-radius: none ">
            <h5 class="modal-title text-center ps-4 text-white" id="exampleModalLabel" style="font-weight: 700; ">Add Vidhan Sabha</h5>
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close" style="margin-right:20px; font-weight:700; "></button>
          </div>
          @csrf
          <hr>
          <div class="modal-body">
            <div class="card" style="border:none; box-shadow: none !important;">
              <div class="col-xl-12 mx-auto">
                <form method="post" action="{{ url('vidhansabha') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="listings-container  px-3 my-2">
                    <div class="desgin-form d-flex align-items-center flex-row setting">
                      <h5 class="form_heading modal-text w-25">Choose Lok Sabha</h5>
                      <select name="ls_name" id="ls_name" class="form-control form-select custom-input form_input w-75" required>
                        <option value="">Choose</option>
                        @foreach($data as $key => $loksabha)
                        <option value="{{$loksabha->id ?? ''}}">{{$loksabha->ls_name ?? ''}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="desgin-form d-flex align-items-center setting flex-row modal-text my-4">
                      <h5 class="form_heading modal-text w-25">Vidhan Sabha Name</h5>
                      <input type="text" name="vs_name" class="form-control custom-input form_input modal-text w-75" placeholder="Enter VidhanSabha Name" required>
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
</div>

<div class="row">
  <div class="col-lg-12 p-lg-0">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6 style="font-size: 1.5rem;font-weight:bold;"> Vidhan Sabha Table</h6>
      </div>
      <div class="card-body pt-0 pb-2">
        <div class="" style="overflow-x:auto !important;">
          <table class="table align-items-center justify-content-center mb-0">
            <thead style="background: #7D6F6C;">
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25 text-white" style="border-top-left-radius: 16px; border-bottom-left-radius: 16px;">Lok Sabha Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-white w-25">Vidhan Sabha Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-white text-center w-25">Action</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-white text-center w-25" style="border-top-right-radius: 16px; border-bottom-right-radius: 16px;">Status</th>
              </tr>
            </thead>
            <tbody>
              {{-- {{dd($vidhansabha->toArray())}} --}}
              @foreach($vidhansabha as $key=> $item)
              <tr class="table-form">
                <form method="post" action="{{url('edit-vidhansabha').'/'.$item->id}}" id="form-id">
                  @csrf
                  <td>
                    <div class=" px-2">
                      {{-- <input type="text" value="{{$item->get_loksabha->id ?? ''}}" name="id" hidden> --}}
                      <div class="my-auto">
                        {{-- {{dd($item->get_loksabha->toArray())}} --}}
                        <a href="{{url('lok-vidhan').'/'.$item->loksabha_id}}" target="blank"> <label class="input_label pointer">{{ $item->get_loksabha->ls_name ?? ''}}</label></a>
                      </div>
                    </div>
                  </td>
                  <td>
                    <a href="{{url('vidhan-block').'/'.$item->id}}" target="blank"><label class="input_label pointer">{{ $item->vs_name ?? ''}}</label></a>
                    <input type="text" class="form-control form_input d-none text-capitalize" style="width:100%" name="vs_name" value="{{$item->vs_name ?? ''}}" required>
                  </td>

                  <td class="actions">
                    <div class="form-action text-center" style="display: none;">
                      <button type="submit" class="edit_submit btn-primary-2 text-center mx-1 img-fluid position-relative text-white" style="border-radius:50%"><i class="fa-solid fa-floppy-disk" style="margin: 4px; margin-top: 5px;"></i></button>
                      <button type="button" class="edit_cancel btn-primary-2 text-center mx-1 img-fluid position-relative text-white" style="border-radius:50%"><i class="fa-solid fa-xmark" style="margin: 4px; margin-top: 5px;"></i></button>
                    </div>
                    <div class="table-action text-center" style="display: block;">
                      <a href="javascript:;" class="list_edit mb-0 text-center" data-toggle="tooltip" data-placement="bottom" title="Edit"><img src="{{ asset('/assets/img/edit.png') }}" alt="" class="img-fluid mx-1"></a>
                      <a href="{{url('delete-vidhansabha').'/'.$item->id}}" class="emp_delete mb-0 text-center" data-toggle="tooltip" data-placement="bottom" title="Delete"><img src="{{ asset('/assets/img/delete.png') }}" alt="" class="img-fluid mx-1"></a>
                    </div>
                  </td>
                </form>
                @if($item->vidhan_status==2)
                <td class="text-center">
                  <form method="GET" action="{{url('/')}}/vidhansabha-active/{{$item->id ?? ''}}">
                    <input type="checkbox" data-toggle="toggle" data-on=" " data-off=" " data-style="ios" data-key="check{{ $key }}" checked>
                  </form>
                </td>
                @else($item->vidhan_status==1)
                <td class="text-center">
                  <form method="GET" action="{{url('/')}}/vidhansabha-deactive/{{$item->id ?? ''}}">
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
        {{$vidhansabha->links('pagination::bootstrap-4')}}
        <!-- {{ $vidhansabha->links('pagination::simple-tailwind') }} -->
        <!-- {{ $vidhansabha->links('pagination::semantic-ui') }}
            {{ $vidhansabha->links('pagination::simple-tailwind') }} -->
      </div>
    </div>
  </div>
</div>
</div>
</div>

@endsection