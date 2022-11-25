<?php $__env->startSection('content'); ?>
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
								<?php $__currentLoopData = $form_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="table-form">
										<td>
											<div class=" px-2">
												<div class="my-auto">
													<label class="pointer"><?php echo e($key + 1 ?? ''); ?></label>
												</div>
										</td>
										<td class="text-center">
	                                        <label class="input_label"> <label class="pointer"><?php echo e($item->form_title ?? ''); ?></label></a>
										</td>
										<td>
											<label class="input_label pointer"><?php echo e($item->created_at ?? ''); ?></label>
										</td>
										<td class="text-center">
									      <div class="edit-preview" style="display:flex; justify-content:center; align-items:center;"><a href="<?php echo e(url('preview') . '/' . $item->form_id); ?>"><i class="fa-solid fa-eye input_label pointer" style="height:33px; margin-right:8px;"></i></a>
											<a href="<?php echo e(url('update-form') . '/' . $item->form_id); ?>"><img src="<?php echo e(asset('/assets/img/edit.png')); ?>" class="img-fluid mx-1"></a></div>
										</td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layouts.user_type.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chiraggupta/Sites/localhost/chirag/srchout/infospeed_admin/resources/views/Admin/form-builder/form_list.blade.php ENDPATH**/ ?>