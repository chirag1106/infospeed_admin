@extends('Admin.layouts.user_type.auth')
@section('content')

	<body>
		<div class="form-dhruvi">
			<form method="post" action="{{ url('update-form') }}">
				@csrf
				<div class="row">
					<div class="col-lg-9 ">
						<div class="input-groups">
							<input type="hidden" name="form_id" value="{{ $value['form_id'] ?? '' }}" hidden>
							<div class="input-inner"><input type="text" placeholder="Untitled Form" name="form_title"
									value="{{ $value->form_title ?? '' }}" required class="title" />
							</div>
							<div class="input-outer">
								<input type="text" placeholder="Description" name="form_description"
									value="{{ $value->form_description ?? '' }}" required class="description" />
							</div>
						</div>
					</div>
				</div>
				<div class="question-container">
					@foreach ($infospeed as $sekey => $infodata)
						<div class="col-lg-9 col-sm-12 que-js-container" data-count="0">
							<div class="card mb-4 check-status">
								<div class="card-header pb-0">
									<div class="table-responsive p-0">
										<input type="hidden" name="section[{{ $sekey }}][question_id]"
											value="{{ $infodata['question_id'] ?? '' }}" hidden>
										<input type="text" name="section[{{ $sekey }}][question]" value="{{ $infodata['question'] ?? '' }}"
											placeholder="Question" required>
									</div>
								</div>
								<div class="m-20">
									<select name="section[{{ $sekey }}][check_radio]" class="custom-input form_input select-value">
										<option value="1" @if ($infodata['check_radio'] == '1') selected @endif>Checkboxes</option>
										<option value="2" @if ($infodata['check_radio'] == '2') selected @endif>Multiple Choice</option>
										<option value="3" @if ($infodata['check_radio'] == '3') selected @endif>Long Answer</option>
									</select>
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
																			<input type="radio" class="radio-input " disabled>
																		@endif
																	</div>
																	<input type="hidden" name="section[{{ $sekey }}]['anwser_id'][{{ $key }}]"
																		value="{{ $option->answer_id ?? '' }}" hidden>
																	<div class="p-2 w-100"> <input type="text"
																			name="section[{{ $sekey }}][option][{{ $key }}]" placeholder="Option 1"
																			value="{{ $option->answer ?? '' }}" required></div>
																	<div class="p-2 option-first display-hide"> <span class="removeNode">
																			<i class="fa fa-trash" style="color:gray;cursor:pointer;"></i></span></div>
																</div>
															</div>
														@endforeach
													</div>
												</div>
											</div>
											{{-- <div class="d-flex flex-row mb-3 adding">
                                    <div class="p-2">@if ($infodata['check_radio'] == 1)<input type="checkbox" class="check-input" disabled>
                                        @elseif($infodata['check_radio']==2)<input type="radio" class="radio-input" disabled>@endif</div>
                                    <div class="p-2"> <a href="javascript:;" class="addMore">Add More +</a></div>
                                </div> --}}
								@endif
								<hr>
								<div class="d-flex flex-row">
									<div class="p-2 trashcenter">
										<label class="switch">
											<input type="checkbox" name="section[{{ $sekey }}][required]"
												@if ($infodata['required'] == '1') checked @endif>
											<span class="slider round"></span>
										</label>
										<p>Required</p>
										{{-- <span class="removeQuestion">
                                            <i class="fa fa-trash" style="color:rgb(71, 59, 59);cursor:pointer;"></i>
                                        </span> --}}
									</div>
								</div>
							</div>
						</div>
				</div>
		</div>
		@endforeach
		</div>
		{{-- <div class="col-md-12 mt-3">
                <div class="add_new_brand py-5 text-center new-button">
                    <a href="javascript:;" class="addQuestion"><i class="color-gray material-icons">add_circle</i>

                    </a>
                </div>
            </div> --}}
		<div class="modal-footer mx-auto " style="justify-content:center!important; ">
			<button type="submit" class="btn btn-primary w-25 mb-0" style="font-size:15px; padding:10px;">Save
				changes</button>
		</div>
		</form>
		</div>
	</body>
@endsection
