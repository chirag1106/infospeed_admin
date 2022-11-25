<?php $__env->startSection('content'); ?>
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
                  <?php echo csrf_field(); ?>
                    <hr>
                    <?php if($message = Session::get('error')): ?>
                    <div class="alert alert-danger alert-block">
                        <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php endif; ?>
                    <div class="modal-body">
                        <div class="card" style="border:none; box-shadow: none !important;">
                          <?php if(session('status')): ?>
                            <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                            </div>
                            <?php endif; ?>
                            <div class="col-xl-12 mx-auto">
                                <form method="post" id="form-validate" action="<?php echo e(url('employee')); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
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
                                           <input type="text" name="emp_name" class="form-control custom-input form_input modal-text w-75 <?php $__errorArgs = ['emp_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Employee Name" value="" required>
                                           <?php $__errorArgs = ['emp_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                          <div class="alert alert-danger mt-1 mb-1"><?php echo e($message); ?></div>
                                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
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
                  <?php $__currentLoopData = $Employe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                    <tr class="table-form">
                      <form method="post" action="<?php echo e(url('emp_edit').'/'.$item->id); ?>" id="form-id">
                        <?php echo csrf_field(); ?>
                      <td>
                        
                        <div class="d-flex px-2">
                          <div class="my-auto">
                            <label class="input_label"><?php echo e($item->emp_name ?? ''); ?></label>
                            <input type="text" class="form-control form_input d-none font-weight-bold" name="emp_name" style="width:100%" type="text" id="emp_name" value="<?php echo e($item->emp_name ?? ''); ?>" required>
                          </div>
                        </div>
                      </td>
                      <td>
                        <label class="input_label"><?php echo e($item->emp_email ?? ''); ?></label>
                        <input type="email" class="form-control form-input text-sm font-weight-bold mb-0 form_input d-none" name="emp_email" style="width:100%" type="text" value="<?php echo e($item->emp_email ?? ''); ?>" required>
                      </td>
                      <td>
                        <label class="input_label"><?php echo e($item->emp_phone ?? ''); ?></label>
                        <input type="text"  class="form-control form-input text-sm font-weight-bold mb-0 form_input d-none" style="width:100%" name="emp_phone" type="text" value="<?php echo e($item->emp_phone ?? ''); ?>" required>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <label class="input_label"><?php echo e($item->emp_type ?? ''); ?></label>
                          <select class="form-control form-input text-sm font-weight-bold mb-0 form_input d-none" style="width:100%" name="emp_type" type="text" value="<?php echo e($item->emp_type ?? ''); ?>" required>
                          <option value="">Select</option>
                          <option value="Full-Time" <?php if($item->emp_type=="Full-Time"): ?> selected <?php endif; ?>>Full Time</option>
                          <option value="Part-Time" <?php if($item->emp_type=="Part-Time"): ?> selected <?php endif; ?>>Part Time</option>
                          <option value="Freelence" <?php if($item->emp_type=="Freelence"): ?> selected <?php endif; ?>>Freelence</option>
                          <option value="Self-Employed" <?php if($item->emp_type=="Self-Employed"): ?> selected <?php endif; ?>>Self Employed</option>
                          <option value="Internship" <?php if($item->emp_type=="Internship"): ?> selected <?php endif; ?>>Internship</option>
                          <option value="Trainee" <?php if($item->emp_type=="Trainee"): ?> selected <?php endif; ?>>Trainee</option>
                          </select>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <label class="input_label"><?php echo e($item->emp_date ?? ''); ?></label>
                          <input type="date" class="form-control form-input text-sm font-weight-bold mb-0 form_input d-none text-capitalize " name="emp_date" style="width:100%" type="text" value="<?php echo e($item->emp_date ?? ''); ?>" required>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <label class="input_label"><?php echo e($item->emp_wages ?? ''); ?></label>
                          <input type="text" class="form-control form-input text-sm font-weight-bold mb-0 form_input d-none text-capitalize " name="emp_wages" style="width:100%" type="text" value="<?php echo e($item->emp_wages ?? ''); ?>" required>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <label class="input_label"><?php echo e($item->emp_address ?? ''); ?></label>
                          <input type="text" class="form-control form-input text-sm font-weight-bold mb-0 form_input d-none text-capitalize " name="emp_address" style="width:100%" type="text" value="<?php echo e($item->emp_address ?? ''); ?>" required>
                        </div>
                      </td>
                      <td class="actions">
                        <div class="form-action text-center" style="display: none;">
                          <button type="submit" class="edit_submit btn-primary-2 text-center mx-1 img-fluid position-relative text-white" style="border-radius:50%"><i class="fa-solid fa-floppy-disk" style="margin: 4px; margin-top: 5px;"></i></button>
                          <button type="button" class="edit_cancel btn-primary-2 text-center mx-1 img-fluid position-relative text-white" style="border-radius:50%"><i class="fa-solid fa-xmark" style="margin: 4px; margin-top: 5px;"></i></button>
                        </div>
                        <div class="table-action text-center" style="display: block;">
                          <a href="javascript:;" class="list_edit  mb-0 text-center" data-toggle="tooltip" data-placement="bottom" title="Edit"><img src="<?php echo e(asset('/assets/img/edit.png')); ?>" alt="" class="img-fluid mx-1"></a>
                          <a href="<?php echo e(url('emp_delete').'/'.$item->id); ?>" class="emp_delete mb-0 text-center" data-toggle="tooltip" data-placement="bottom" title="Delete"><img src="<?php echo e(asset('/assets/img/delete.png')); ?>" alt="" class="img-fluid mx-1"></a>
                        </div>
                      </td>
                      </form>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="d-flex flex-column justify-content-center align-items-center align-content-center mb-1 mt-1 mx-auto">
            <?php echo e($Employe->links('pagination::bootstrap-4')); ?>

            <!-- <?php echo e($Employe->links('pagination::simple-tailwind')); ?> -->
            <!-- <?php echo e($Employe->links('pagination::semantic-ui')); ?>

            <?php echo e($Employe->links('pagination::simple-tailwind')); ?> -->
          </div>
        </div>
      </div>
    </div>
</div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layouts.user_type.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chiraggupta/Sites/localhost/chirag/srchout/infospeed_admin/resources/views/Admin/employe/add_employe.blade.php ENDPATH**/ ?>