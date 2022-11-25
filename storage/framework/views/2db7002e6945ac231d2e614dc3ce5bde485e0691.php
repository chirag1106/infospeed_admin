<?php $__env->startSection('content'); ?>

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
										<form method="post" action="<?php echo e(url('preview')); ?>">
											<?php echo csrf_field(); ?>
											<div class="listings-container  px-3 my-2">
												<div class="desgin-form d-flex align-items-center flex-row setting">
													<div class="container">
														<input type="hidden" name="form_id" value="<?php echo e($value['form_id'] ?? ''); ?>" hidden>
														<select type="email" class="js-select2" multiple="multiple" name="emp_email[]"
															placeholder="Add people and group">
															<?php $__currentLoopData = $emp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option value="<?php echo e($email->id); ?>" data-badge=""><?php echo e($email->emp_email ?? ''); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
						<input type="hidden" name="form_id" value="<?php echo e($value['form_id'] ?? ''); ?>" hidden>
						<div class="input-inner"><input type="text" placeholder="Untitled Form" name="form_title"
								value="<?php echo e($value->form_title ?? ''); ?>" required class="title" disabled style="border-bottom:0px !important;" />
						</div>
						<div class="input-outer">
							<input type="text" placeholder="Description" name="form_description"
								value="<?php echo e($value->form_description ?? ''); ?>" disabled class="description"
								style="border-bottom:0px !important;" />
						</div>
						<hr>
					</div>
				</div>
			</div>
			<div class="question-container">
				<?php $__currentLoopData = $infospeed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sekey => $infodata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-lg-9 col-sm-12 que-js-container" data-count="0">
						<div class="card mb-4 check-status">
							<div class="card-header pb-0" style="padding: 0px !important;">
								<div class="table-responsive p-0">
									<input type="hidden" name="section[<?php echo e($sekey); ?>][question_id]"
										value="<?php echo e($infodata['question_id'] ?? ''); ?>" hidden>
									<input type="text" name="section[<?php echo e($sekey); ?>][question]" value="<?php echo e($infodata['question'] ?? ''); ?>"
										placeholder="Question" disabled style="border-bottom:0px !important; margin-bottom:0px !important;" />
								</div>
							</div>
							<?php if($infodata['check_radio'] == 3): ?>
									<div class="long-answer">
										<div class="card-header pb-0">
											<textarea name="longanswer" class="form-control" disabled></textarea>
										</div>
									</div>
								<?php else: ?>
							<div class="card-body px-0 pt-0 pb-2">
								<div class="table-responsive p-0">
								  <div class="paragraph">
									<div class="check-active">
										<div class="add-count">
											<?php $__currentLoopData = $infodata['answer']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="check-container1">
													<div class="d-flex flex-row">
														<div class="p-2">
															<?php if($infodata['check_radio'] == 1): ?>
																<input type="checkbox" class="check-input" disabled>
															<?php elseif($infodata['check_radio'] == 2): ?>
																<input type="radio" class="radio-input" disabled>
															<?php endif; ?>
														</div>
														<input type="hidden" name="section[<?php echo e($sekey); ?>][anwser_id][<?php echo e($key); ?>]"
															value="<?php echo e($option->answer_id ?? ''); ?>" hidden>
														<div class="p-2 w-100"> <input type="text"
																name="section[<?php echo e($sekey); ?>][option][<?php echo e($key); ?>]" placeholder="Option 1"
																value="<?php echo e($option->answer ?? ''); ?>" disabled style="border-bottom:0px !important;"></div>
													</div>
												</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div>
									</div>
								  </div>
									<?php endif; ?>
									<hr>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layouts.user_type.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chiraggupta/Sites/localhost/chirag/srchout/infospeed_admin/resources/views/Admin/form-builder/preview.blade.php ENDPATH**/ ?>