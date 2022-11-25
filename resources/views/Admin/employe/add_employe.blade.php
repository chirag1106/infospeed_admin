@extends('Admin.layouts.user_type.auth')

@section('content')
<div class="row">
  <div class="cart px-0">
    <div class="d-flex justify-content-between align-items-center align-content-center ">
      <button type="button" class="btn add_btn text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size:20px; font-weight:900;background: #7D6F6C; box-shadow: 2px 2px 14px 2px rgba(0, 0, 0, 0.25); border-radius: 16px;">
        Add Employee
      </button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content p-3" style="border-radius: 20px;">
          <div class="modal-header d-flex justify-content-center align-items-center align-content-center btn-primary" style="border-bottom: none; border-top-left-radius: none; border-top-right-radius: none ">
            <h5 class="modal-title text-center ps-4 text-white text-capitalize" id="exampleModalLabel" style="font-weight: 700; ">Add Employee</h5>
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close" style="margin-right:20px; font-weight:700;"></button>
               </div>
                  @csrf
                    <hr>
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <div class="modal-body">
                        <div class="card" style="border:none; box-shadow: none !important;">
                          @if(session('status'))
                            <div class="alert alert-success">
                            {{ session('status') }}
                            </div>
                            @endif
                            <div class="col-xl-12 mx-auto">
                                <form method="post" id="form-validate" action="{{ url('employee') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="listings-container  px-3 my-2">
                                        <input type="text" value="" name="id" hidden>
                                        <div class="desgin-form d-flex align-items-center flex-row setting">
                                            <h5 class="form_heading modal-text w-25">Choose Employee Type</h5>
                                            <select name="emp_type" class="form-control form-select custom-input form_input modal-text w-75">
                                              <option value="">Select</option>
                                              <option value="Full-Time">Full Time</option>
                                              <option value="Part-Time">Part Time</option>
                                              <option value="Freelence">Freelence</option>
                                              <option value="Self-Employed">Self Employed</option>
                                              <option value="Internship">Internship</option>
                                              <option value="Trainee">Trainee</option>
                                            </select>
                                        </div>
                                        <div class="desgin-form d-flex align-items-center setting flex-row modal-text my-4">
                                            <h5 class="form_heading modal-text w-25">Employee Name</h5>
                                           <input type="text" name="emp_name" class="form-control custom-input form_input modal-text w-75 @error('emp_name') is-invalid @enderror" placeholder="Enter Employee Name" value="" required>
                                           @error('emp_name')
                                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                          @enderror 
                                        </div>
                                       
                                        <div class="desgin-form d-flex align-items-center setting flex-row my-4">
                                            <h5 class="form_heading modal-text w-25">Employee Email</h5>
                                            <input type="email" name="emp_email" class="form-control custom-input form_input modal-text w-75" placeholder="Enter Employee Email" value="" required>
                                        </div>
        
                                        <div class="desgin-form d-flex align-items-center setting flex-row my-4">
                                            <h5 class="form_heading modal-text w-25">Employee Phone</h5>
                                            <input type="tel" name="emp_phone" class="form-control custom-input form_input modal-text w-75" placeholder="Enter Employee Phone Number" value="" required>
                                        </div>
                                        <div class="desgin-form d-flex align-items-center setting flex-row my-4">
                                          <h5 class="form_heading modal-text w-25">Employee Address</h5>
                                          <input type="text" name="emp_address" class="form-control custom-input form_input modal-text w-75" placeholder="Enter Employee Address" value="" required>
                                      </div>
                                      <div class="desgin-form d-flex align-items-center setting flex-row my-4">
                                        <h5 class="form_heading modal-text w-25">Employee Per Day Wages</h5>
                                        <input type="text" name="emp_wages" class="form-control custom-input form_input modal-text w-75" placeholder="Employee Per Day Wages ex. 500" value="" required>
                                    </div>
                                        <div class="desgin-form d-flex align-items-center setting flex-row my-4">
                                            <h5 class="form_heading modal-text w-25">Enter Date Of Joining</h5>
                                            <input type="date" name="emp_date" class="form-control custom-input form_input modal-text w-75" placeholder="date" value="" required>
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
      <div class="col-lg-12 p-lg-0 ">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6 style="font-size: 1.5rem;font-weight:bold;"> Employees Table</h6>
          </div>
          <div class="card-body pt-0 pb-2">
            <div class="" style="overflow-x: auto !important;">
              <table class="table align-items-center justify-content-center mb-0" id="tabledit">
                <thead style="background: #7D6F6C;">
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center text-white opacity-7 w-25" style="border-top-left-radius: 16px; border-bottom-left-radius: 16px;">Employee Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center text-white opacity-7 w-25">Employee Email</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center text-white opacity-7 w-25">Employee Number</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center text-white opacity-7 w-25">Employee Type</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center text-white opacity-7 w-25">Employee Joining Date</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center text-white opacity-7 w-25">Employee Address</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center text-white opacity-7 w-25">Employee Wages</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center text-white opacity-7 w-25" style="border-top-right-radius: 16px; border-bottom-right-radius: 16px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($Employe as $key=> $item)  
                    <tr class="table-form">
                      <form method="post" action="{{url('emp_edit').'/'.$item->id}}" id="form-id">
                        @csrf
                      <td>
                        
                        <div class="d-flex px-2">
                          <div class="my-auto">
                            <label class="input_label">{{ $item->emp_name ?? ''}}</label>
                            <input type="text" class="form-control form_input d-none font-weight-bold" name="emp_name" style="width:100%" type="text" id="emp_name" value="{{ $item->emp_name ?? ''}}" required>
                          </div>
                        </div>
                      </td>
                      <td>
                        <label class="input_label">{{ $item->emp_email ?? ''}}</label>
                        <input type="email" class="form-control form-input text-sm font-weight-bold mb-0 form_input d-none" name="emp_email" style="width:100%" type="text" value="{{$item->emp_email ?? ''}}" required>
                      </td>
                      <td>
                        <label class="input_label">{{ $item->emp_phone ?? ''}}</label>
                        <input type="text"  class="form-control form-input text-sm font-weight-bold mb-0 form_input d-none" style="width:100%" name="emp_phone" type="text" value="{{$item->emp_phone ?? ''}}" required>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <label class="input_label">{{ $item->emp_type ?? ''}}</label>
                          <select class="form-control form-input text-sm font-weight-bold mb-0 form_input d-none" style="width:100%" name="emp_type" type="text" value="{{$item->emp_type ?? ''}}" required>
                          <option value="">Select</option>
                          <option value="Full-Time" @if($item->emp_type=="Full-Time") selected @endif>Full Time</option>
                          <option value="Part-Time" @if($item->emp_type=="Part-Time") selected @endif>Part Time</option>
                          <option value="Freelence" @if($item->emp_type=="Freelence") selected @endif>Freelence</option>
                          <option value="Self-Employed" @if($item->emp_type=="Self-Employed") selected @endif>Self Employed</option>
                          <option value="Internship" @if($item->emp_type=="Internship") selected @endif>Internship</option>
                          <option value="Trainee" @if($item->emp_type=="Trainee") selected @endif>Trainee</option>
                          </select>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <label class="input_label">{{ $item->emp_date ?? ''}}</label>
                          <input type="date" class="form-control form-input text-sm font-weight-bold mb-0 form_input d-none text-capitalize " name="emp_date" style="width:100%" type="text" value="{{$item->emp_date ?? ''}}" required>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <label class="input_label">{{ $item->emp_wages ?? ''}}</label>
                          <input type="text" class="form-control form-input text-sm font-weight-bold mb-0 form_input d-none text-capitalize " name="emp_wages" style="width:100%" type="text" value="{{$item->emp_wages ?? ''}}" required>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <label class="input_label">{{ $item->emp_address ?? ''}}</label>
                          <input type="text" class="form-control form-input text-sm font-weight-bold mb-0 form_input d-none text-capitalize " name="emp_address" style="width:100%" type="text" value="{{$item->emp_address ?? ''}}" required>
                        </div>
                      </td>
                      <td class="actions">
                        <div class="form-action text-center" style="display: none;">
                          <button type="submit" class="edit_submit btn-primary-2 text-center mx-1 img-fluid position-relative text-white" style="border-radius:50%"><i class="fa-solid fa-floppy-disk" style="margin: 4px; margin-top: 5px;"></i></button>
                          <button type="button" class="edit_cancel btn-primary-2 text-center mx-1 img-fluid position-relative text-white" style="border-radius:50%"><i class="fa-solid fa-xmark" style="margin: 4px; margin-top: 5px;"></i></button>
                        </div>
                        <div class="table-action text-center" style="display: block;">
                          <a href="javascript:;" class="list_edit  mb-0 text-center" data-toggle="tooltip" data-placement="bottom" title="Edit"><img src="{{ asset('/assets/img/edit.png') }}" alt="" class="img-fluid mx-1"></a>
                          <a href="{{url('emp_delete').'/'.$item->id}}" class="emp_delete mb-0 text-center" data-toggle="tooltip" data-placement="bottom" title="Delete"><img src="{{ asset('/assets/img/delete.png') }}" alt="" class="img-fluid mx-1"></a>
                        </div>
                      </td>
                      </form>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="d-flex flex-column justify-content-center align-items-center align-content-center mb-1 mt-1 mx-auto">
            {{$Employe->links('pagination::bootstrap-4')}}
            <!-- {{ $Employe->links('pagination::simple-tailwind') }} -->
            <!-- {{ $Employe->links('pagination::semantic-ui') }}
            {{ $Employe->links('pagination::simple-tailwind') }} -->
          </div>
        </div>
      </div>
    </div>
</div>
  </div>
</div>
@endsection