@extends('Admin.layouts.user_type.auth')

@section('content')
<div class="row">
  <div class="cart px-0">
    <div class="d-flex justify-content-between align-items-center align-content-center ">
      <button type="button" class="btn add_btn text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size:20px; font-weight:900;background: #7D6F6C; box-shadow: 2px 2px 14px 2px rgba(0, 0, 0, 0.25); border-radius: 16px;">
        Add Lok Sabha
      </button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content p-3" style="border-radius: 20px;">

          <div class="modal-header d-flex justify-content-center align-items-center align-content-center btn-primary text-white" style="border-bottom: none; border-top-left-radius: none; border-top-right-radius: none ">
            <h5 class="modal-title text-center ps-4 text-white" id="exampleModalLabel" style="font-weight: 700; ">Add Lok Sabha</h5>
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close" style="margin-right:20px; font-weight:bolder;"></button>
          </div>
          @csrf
          <hr>
          <div class="modal-body">
            <div class="card" style="border:none; box-shadow:none !important;">
              <div class="col-xl-12 mx-auto">
                <form method="post" action="{{ url('loksabha') }}">
                  @csrf
                  <div class="listings-container  px-3 my-2">
                    <div class="desgin-form d-flex align-items-center setting flex-row modal-text my-4">
                      <h5 class="form_heading modal-text w-25">Lok Sabha Name</h5>
                      <input type="text" name="ls_name" class="form-control form_input modal-text w-75" placeholder="Enter Lok Sabha Name" value="" required>
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
<!-- </div> -->
<div class="row">
  <div class="col-lg-12 p-lg-0">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6 style="font-size: 1.5rem;font-weight:bold;"> Lok Sabha Table</h6>
      </div>
      <div class="card-body pt-0 pb-2">
        <div class="" style="overflow-x:auto !important ;">
          <table class="table align-items-center justify-content-center mb-0">
            <thead style="background: #7D6F6C;">
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25 text-white" style="border-top-left-radius: 16px; border-bottom-left-radius: 16px;">Lok Sabha Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-white text-center w-25">Action</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-white text-center w-25" style="border-top-right-radius: 16px; border-bottom-right-radius: 16px;">Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($loksabha as $key=> $item)
              <tr class="table-form">
                <form method="post" action="{{url('loksabha_edit').'/'.$item->id}}" id="form-id">
                  @csrf
                  <td>
                    <div class="d-flex align-items-center px-2">
                      <div class="my-auto">
                        <a href="{{url('lok-vidhan').'/'.$item->id}}" target="_blank"><label class="input_label pointer">{{ $item->ls_name ?? ''}}</label></a>
                        <input type="text" class="form-control form_input d-none text-capitalize" name="ls_name" style="width:100%" type="text" id="ls_name" value="{{ $item->ls_name ?? ''}}" required>
                      </div>
                    </div>
                  </td>
                  <td class="actions">
                    <div class="form-action text-center" style="display: none;">
                      <button type="submit" class="edit_submit btn-primary-2 text-center mx-1 img-fluid position-relative text-white" style="border-radius:50%"><i class="fa-solid fa-floppy-disk" style="margin: 4px; margin-top: 5px;"></i></button>
                      <button type="button" class="edit_cancel btn-primary-2 text-center mx-1 img-fluid position-relative text-white" style="border-radius:50%"><i class="fa-solid fa-xmark" style="margin: 4px; margin-top: 5px;"></i></button>
                    </div>
                    <div class="table-action text-center" style="display: block;">
                      <a href="javascript:0;" class="list_edit mb-0" data-toggle="tooltip" data-placement="bottom" title="Edit"><img src="{{ asset('/assets/img/edit.png') }}" alt="" class="img-fluid mx-1"></a>
                      <a href="{{url('delete_loksabha').'/'.$item->id}}" class="emp_delete mb-0" data-toggle="tooltip" data-placement="bottom" title="Delete"><img src="{{ asset('/assets/img/delete.png') }}" alt="" class="img-fluid mx-1"></a>
                    </div>
                  </td>
                </form>
                @if($item->status==2)
                <td class="text-center">
                  <form method="GET" action="{{ url('loksabha-active').'/'.$item->id }}">
                    <input type="checkbox" data-toggle="toggle" data-on=" " data-off=" " data-style="ios" data-key="check{{ $key }}" checked>
                  </form>
                </td>
                @else($item->status==1)
                <td class="text-center">
                  <form method="GET" action="{{ url('loksabha-deactive').'/'.$item->id }}">
                    <input type="checkbox" data-toggle="toggle"  data-on=" " data-off=" " data-style="ios" data-key="check{{ $key }}">
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
        {{$loksabha->links('pagination::bootstrap-4')}}
        <!-- {{ $loksabha->links('pagination::simple-tailwind') }} -->
        <!-- {{ $loksabha->links('pagination::semantic-ui') }}
            {{ $loksabha->links('pagination::simple-tailwind') }} -->
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
@endsection