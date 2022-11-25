@extends('Admin.layouts.user_type.auth')
@section('content')
	<div class="row">
		<div class="col-lg-12 p-lg-0">
			<div class="card mb-4">
				<div class="card-header pb-0">
					<h6 style="font-size: 1.5rem;font-weight:bold;">Form Table</h6>
				</div>
				<div class="card-body pt-0 pb-2">
					<div class="" style="overflow-x:auto !important;">
						<table class="table align-items-center justify-content-center mb-0">
							<thead style="background: #7D6F6C;">
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5 text-white"
										style="border-top-left-radius: 16px; border-bottom-left-radius: 16px;">Sr.No</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center text-white w-37">Form
										Title</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-white w-38">Create Date</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center text-white w-20">
										Action</th>

								</tr>
							</thead>
							<tbody>
								@foreach ($form_list as $key => $item)
									<tr class="table-form">
										<td>
											<div class=" px-2">
												<div class="my-auto">
													<label class="pointer">{{ $key + 1 ?? '' }}</label>
												</div>
										</td>
										<td class="text-center">
	                                        <label class="input_label"> <label class="pointer">{{ $item->form_title ?? '' }}</label></a>
										</td>
										<td>
											<label class="input_label pointer">{{ $item->created_at ?? '' }}</label>
										</td>
										<td class="text-center">
									      <div class="edit-preview" style="display:flex; justify-content:center; align-items:center;"><a href="{{ url('preview') . '/' . $item->form_id }}"><i class="fa-solid fa-eye input_label pointer" style="height:33px; margin-right:8px;"></i></a>
											<a href="{{ url('update-form') . '/' . $item->form_id }}"><img src="{{ asset('/assets/img/edit.png') }}" class="img-fluid mx-1"></a></div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				{{-- <div class="d-flex flex-column justify-content-center align-items-center align-content-center mb-1 mt-1 mx-auto">
            {{$block->links('pagination::bootstrap-4')}}
            <!-- {{ $block->links('pagination::simple-tailwind') }} -->
            <!-- {{ $block->links('pagination::semantic-ui') }}
            {{ $block->links('pagination::simple-tailwind') }} -->
          </div> --}}
			</div>
		</div>
	</div>
@endsection
