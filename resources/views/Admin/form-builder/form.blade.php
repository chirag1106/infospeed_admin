@extends('Admin.layouts.user_type.auth')
@section('content')

	<body>
		<div class="form-dhruvi">
			<form method="post" action="{{ url('form-builder') }}">
				@csrf
				<div class="row">
					<div class="col-lg-9 ">
						<div class="input-groups">
							<div class="input-inner"><input type="text" placeholder="Untitled Form" name="form_title" required
									class="title" />
							</div>
							<div class="input-outer">
								<input type="text" placeholder="Description" name="form_description" required class="description" />
							</div>
						</div>
					</div>
				</div>
				<div class="question-container">
					<div class="col-lg-9 col-sm-12 que-js-container" data-count="0">
						<div class="card mb-4 check-status">
							<div class="card-header pb-0">
								<div class="table-responsive  p-0">
									<input type="text" name="section[0][question]" placeholder="Question" required>
								</div>
							</div>
							<div class="m-20">
								<select name="section[0][check_radio]" class="custom-input form_input select-value">
									<option value="1">Checkboxes</option>
									<option value="2">Multiple Choice</option>
									<option value="3">Long Answer</option>
								</select>
							</div>
							<div class="long-answer display-hide">
								<div class="card-header pb-0">
									<textarea name="longanswer" class="form-control" disabled></textarea>
								</div>
							</div>
							<div class="card-body px-0 pt-0 pb-2">
								<div class="table-responsive p-0">
									<div class="paragraph">
										<div class="check-active">
											<div class="add-count">
												<div class="check-container1">
													<div class="d-flex flex-row">
														<div class="p-2"> <input type="checkbox" class="check-input" disabled><input type="radio"
																class="radio-input display-hide" disabled></div>
														<div class="p-2 w-100"> <input type="text" name="section[0][option][0]" placeholder="Option 1">
														</div>
														<div class="p-2 option-first display-hide"> <span class="removeNode"><i class="fa fa-trash"
																	style="color:gray;cursor:pointer;"></i></span></div>
													</div>
												</div>
											</div>
										</div>
										<div class="d-flex flex-row mb-3 adding">
											<div class="p-2"> <input type="checkbox" class="check-input" disabled><input type="radio"
													class="radio-input display-hide" disabled></div>
											<div class="p-2"> <a href="javascript:;" class="addMore">Add More +</a></div>
										</div>
									</div>
									<hr>
									<div class="d-flex flex-row">
										<div class="p-2 trashcenter">
											<label class="switch">
												<input type="checkbox" name="section[0][required]">
												<span class="slider round"></span>
											</label>
											<p>Required</p>
											<span class="removeQuestion">
												<i class="fa fa-trash" style="color:rgb(71, 59, 59);cursor:pointer;"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 mt-3">
					<div class="add_new_brand py-5 text-center new-button">
						<a href="javascript:;" class="addQuestion"><i class="color-gray material-icons">add_circle</i>

						</a>
					</div>
				</div>
				<div class="modal-footer mx-auto " style="justify-content:center!important; ">
					<button type="submit" class="btn btn-primary w-25 mb-0" style="font-size:15px; padding:10px;">Save
						changes</button>
				</div>
			</form>
		</div>
	</body>
@endsection
