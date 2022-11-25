@extends('Admin.layouts.user_type.auth')
@section('content')

	<body>
		<div class="row">
			<div class="cart px-0">
				<div class="d-flex justify-content-between align-items-center align-content-center ">
					<button type="button" class="btn add_btn text-white" data-bs-toggle="modal" data-bs-target="#exampleModal"
						style="font-size:20px; font-weight:900;background: #7D6F6C; box-shadow: 2px 2px 14px 2px rgba(0, 0, 0, 0.25); border-radius: 16px;">
						Share
					</button>
				</div>
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-xl">
						<div class="modal-content p-3" style="border-radius: 20px;">

							<div class="modal-header d-flex justify-content-center align-items-center align-content-center btn-primary">
								<h5 class="modal-title text-center" id="exampleModalLabel" style="font-weight: 700; ">Add editors to "Untitled
									form"</h5>
								<button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"
									style="margin-right:20px; font-weight:700; "></button>
							</div>
							<hr>
							<div class="modal-body">
								<div class="card" style="border:none; box-shadow: none !important;">
									<div class="col-xl-12 mx-auto">
										<form method="post" action="{{ url('preview') }}">
											@csrf
											<div class="listings-container  px-3 my-2">
												<div class="desgin-form d-flex align-items-center flex-row setting">
													<div class="container">
														<input type="hidden" name="form_id" value="{{ $value['form_id'] ?? '' }}" hidden>
														<select type="email" class="js-select2" multiple="multiple" name="emp_email[]"
															placeholder="Add people and group">
															@foreach ($emp as $email)
																<option value="{{ $email->id }}" data-badge="">{{ $email->emp_email ?? '' }}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>
											<div class="modal-footer mx-auto " style="justify-content:center!important; ">
												<button type="submit" class="btn btn-primary w-25 mb-0" style="font-size:15px; padding:10px;">
													Send</button>
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

		<div class="form-dhruvi">
			<div class="row">
				<div class="col-lg-9 ">
					<div class="input-groups">
						<input type="hidden" name="form_id" value="{{ $value['form_id'] ?? '' }}" hidden>
						<div class="input-inner"><input type="text" placeholder="Untitled Form" name="form_title"
								value="{{ $value->form_title ?? '' }}" required class="title" disabled style="border-bottom:0px !important;" />
						</div>
						<div class="input-outer">
							<input type="text" placeholder="Description" name="form_description"
								value="{{ $value->form_description ?? '' }}" disabled class="description"
								style="border-bottom:0px !important;" />
						</div>
						<hr>
					</div>
				</div>
			</div>
			<div class="question-container">
				@foreach ($infospeed as $sekey => $infodata)
					<div class="col-lg-9 col-sm-12 que-js-container" data-count="0">
						<div class="card mb-4 check-status">
							<div class="card-header pb-0" style="padding: 0px !important;">
								<div class="table-responsive p-0">
									<input type="hidden" name="section[{{ $sekey }}][question_id]"
										value="{{ $infodata['question_id'] ?? '' }}" hidden>
									<input type="text" name="section[{{ $sekey }}][question]" value="{{ $infodata['question'] ?? '' }}"
										placeholder="Question" disabled style="border-bottom:0px !important; margin-bottom:0px !important;" />
								</div>
							</div>
							@if ($infodata['check_radio'] == 3)
									<div class="long-answer">
										<div class="card-header pb-0">
											<textarea name="longanswer" class="form-control" disabled></textarea>
										</div>
									</div>
								@else
							<div class="card-body px-0 pt-0 pb-2">
								<div class="table-responsive p-0">
								  <div class="paragraph">
									<div class="check-active">
										<div class="add-count">
											@foreach ($infodata['answer'] as $key => $option)
												<div class="check-container1">
													<div class="d-flex flex-row">
														<div class="p-2">
															@if ($infodata['check_radio'] == 1)
																<input type="checkbox" class="check-input" disabled>
															@elseif($infodata['check_radio'] == 2)
																<input type="radio" class="radio-input" disabled>
															@endif
														</div>
														<input type="hidden" name="section[{{ $sekey }}][anwser_id][{{ $key }}]"
															value="{{ $option->answer_id ?? '' }}" hidden>
														<div class="p-2 w-100"> <input type="text"
																name="section[{{ $sekey }}][option][{{ $key }}]" placeholder="Option 1"
																value="{{ $option->answer ?? '' }}" disabled style="border-bottom:0px !important;"></div>
													</div>
												</div>
											@endforeach
										</div>
									</div>
								  </div>
									@endif
									<hr>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</body>
@endsection
