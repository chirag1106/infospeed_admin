@extends('Admin.layouts.user_type.auth')

@section('content')
<div class="row">
  <div class="cart px-0">
    <div class="d-flex justify-content-between align-items-center align-content-center ">
      <button type="button" class="btn add_btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size:20px; font-weight:900;">
        Add Vidhan Sabha
      </button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content p-3" style="border-radius: 20px;">

          <div class="modal-header d-flex justify-content-center align-items-center align-content-center btn-primary text-white" style="border-bottom: none; border-top-left-radius: none; border-top-right-radius: none ">
            <h5 class="modal-title text-center ps-4 text-white" style="text-transform: capitalize;" id="exampleModalLabel" style="font-weight: 700; ">{{$loksabha->ls_name ?? ''}}</h5>
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close" style="margin-right:20px; font-weight:bolder;"></button>
          </div>
          @csrf
          <hr>
          <div class="modal-body">
            <div class="card" style="border:none; box-shadow:none !important; ">
              <div class="col-xl-12 mx-auto">
                <form method="post" action="{{ url('lok-vidhan') }}">
                  @csrf
                  <div class="listings-container  px-3 my-2">
                    <input type="hidden" name="loksabha_id" value="{{$loksabha->id ?? ''}}">
                    <div class="desgin-form d-flex align-items-center setting flex-row modal-text my-4">
                      <h5 class="form_heading modal-text w-25">Vidhan Sabha Name</h5>
                      <input type="text" name="vs_name" class="form-control form_input modal-text w-75" placeholder="Enter vidhan Sabha Name" value="" required>
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
  <div class="col-lg-12 p-0">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6 style="font-size: 1.5rem;font-weight:bold; text-transform: capitalize;"> {{$loksabha->ls_name ?? ''}}</h6>
      </div>
      <div class="card-body  pt-0 pb-2">
        <div class="" style="overflow-x:auto !important ;">
          <table class="table align-items-center justify-content-center mb-0">
            <thead style="background: #7D6F6C;">
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25 text-center text-white" style="border-top-left-radius: 16px; border-bottom-left-radius: 16px;">Vidan Sabha Name</th>
                 <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center w-25 text-center text-white" style="border-top-right-radius: 16px; border-bottom-right-radius: 16px;">Action</th>
                 {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center w-50">Status</th> --}}
              </tr>
            </thead>
            <tbody>
              @foreach($vidhan as $key=> $item)
              <tr class="table-form">
                <form method="post" action="{{url('edit-vidhansabha').'/'.$item->id}}" id="form-id">
                  @csrf
                  <td class="text-center">
                    <div class=" px-2">
                      <div class="my-auto">
                        <a href="{{url('vidhan-block').'/'.$item->id}}" target="blank"><label class="input_label pointer">{{ $item->vs_name ?? ''}}</label></a>
                        <input type="text" class="form-control form_input d-none text-capitalize" name="vs_name" style="width:100%" type="text" id="ls_name" value="{{ $item->vs_name ?? ''}}" required>
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
                      <a href="{{url('delete-vidhansabha').'/'.$item->id}}" class="emp_delete mb-0 text-center"><img src="{{ asset('/assets/img/delete.png') }}" alt="" class="img-fluid mx-1"></a>
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
        {{$vidhan->links('pagination::bootstrap-4')}}
        <!-- {{ $vidhan->links('pagination::simple-tailwind') }} -->
        <!-- {{ $vidhan->links('pagination::semantic-ui') }}
            {{ $vidhan->links('pagination::simple-tailwind') }} -->
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
@endsection