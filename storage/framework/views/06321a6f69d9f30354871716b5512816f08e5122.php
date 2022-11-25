<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="cart px-0">
    <div class="d-flex justify-content-between align-items-center align-content-center ">
      <button type="button" class="btn add_btn text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size:20px; font-weight:900;background: #7D6F6C; box-shadow: 2px 2px 14px 2px rgba(0, 0, 0, 0.25); border-radius: 16px;">
        Add Block
      </button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content p-3" style="border-radius: 20px;">

          <div class="modal-header d-flex justify-content-center align-items-center align-content-center btn-primary" style="border-bottom: none; border-top-left-radius: none; border-top-right-radius: none ">
            <h5 class="modal-title text-center ps-4 text-white" id="exampleModalLabel" style="font-weight: 700; ">Add Block</h5>
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close" style="margin-right:20px; font-weight:700; "></button>
          </div>
          <?php echo csrf_field(); ?>
          <hr>
          <div class="modal-body">
            <div class="card" style="border:none; box-shadow: none !important;">
              <div class="col-xl-12 mx-auto">
                <form method="post" action="<?php echo e(url('block')); ?>" class="form">
                  <?php echo csrf_field(); ?>
                  <div class="listings-container  px-3 my-2">
                    <div class="desgin-form d-flex align-items-center flex-row setting">
                      <h5 class="form_heading modal-text w-25">Choose Lok Sabha</h5>
                      <select name="ls_name" id="ls_name" class="form-control form-select custom-input form_input modal-text ls_name w-75" data-type="lok" required>
                        <option value>Select Lok Sabha</option>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $loksabha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($loksabha->id ?? ''); ?>"><?php echo e($loksabha->ls_name ?? ''); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    <div class="desgin-form d-flex align-items-center setting flex-row modal-text my-4">
                      <h5 class="form_heading modal-text w-25">Vidhan Sabha Name</h5>
                      <select name="vs_name" id="vs_name" class="form-control vs_name w-75" required>
                        <option value="">choose vidhan</option>
                      </select>
                    </div>
                    <div class="desgin-form d-flex align-items-center setting flex-row modal-text my-4">
                      <h5 class="form_heading modal-text w-25">Block Name</h5>
                      <input type="text" name="block_name" class="form-control custom-input form_input modal-text w-75" placeholder="Enter Block Name" value="" required>
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
</div>

<div class="row">
  <div class="col-lg-12 p-lg-0">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6 style="font-size: 1.5rem;font-weight:bold;">Block Table</h6>
      </div>
      <div class="card-body pt-0 pb-2">
        <div class="" style="overflow-x:auto !important;">
          <table class="table align-items-center justify-content-center mb-0">
            <thead style="background: #7D6F6C;">
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-20 text-white" style="border-top-left-radius: 16px; border-bottom-left-radius: 16px;">Lok Sabha Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-white w-20">Vidhan Sabha Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-white w-20">Block Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center text-white w-20">Action</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center text-white w-20" style="border-top-right-radius: 16px; border-bottom-right-radius: 16px;">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $block; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr class="table-form">
                <form method="post" action="<?php echo e(url('edit-block').'/'.$item->id); ?>" class="form-id">
                  <?php echo csrf_field(); ?>
                  <td>
                    <div class=" px-2">
                      <div class="my-auto">
                        <a href="<?php echo e(url('lok-vidhan').'/'.$item->loksabha_id); ?>" target="blank" class="input_label pointer"><label class=" input_label pointer"><?php echo e($item->get_loksabha->ls_name ?? ''); ?></label></a>
                      </div>
                    </div>
                  </td>
                  <td>
                    <a href="<?php echo e(url('vidhan-block').'/'.$item->vidhansabha_id); ?>" target="blank"><label class="input_label pointer"><?php echo e($item->get_vidhansabha->vs_name ?? ''); ?></label></a>
                  </td>
                  <td>
                    <a href="<?php echo e(url('block-panchayat').'/'.$item->id); ?>" target="blank"><label class="input_label pointer"><?php echo e($item->block_name ?? ''); ?></label></a>
                    <input type="text" class=" form-control text-sm font-weight-bold mb-0 form_input text-capitalize  d-none <?php $__errorArgs = ['block_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" style="width:100%; text-transform: capatilize!important;" name="block_name" value="<?php echo e($item->block_name ?? ''); ?>" required>
                  </td>
                  <td class="actions">
                    <div class="form-action text-center" style="display: none;">
                      <button type="submit" class="edit_submit btn-primary-2 text-center mx-1 img-fluid position-relative text-white" style="border-radius:50%"><i class="fa-solid fa-floppy-disk" style="margin: 4px; margin-top: 5px;"></i></button>
                      <button type="button" class="edit_cancel btn-primary-2 text-center mx-1 img-fluid position-relative text-white" style="border-radius:50%"><i class="fa-solid fa-xmark" style="margin: 4px; margin-top: 5px;"></i></button>
                    </div>
                    <div class="table-action text-center" style="display: block;">
                      <a href="javascript:;" class="list_edit mb-0" data-toggle="tooltip" data-placement="bottom" title="Edit"><img src="<?php echo e(asset('/assets/img/edit.png')); ?>" alt="" class="img-fluid mx-1"></a>
                      <a href="<?php echo e(url('delete-block').'/'.$item->id); ?>" class="emp_delete mb-0" data-toggle="tooltip" data-placement="bottom" title="Delete"><img src="<?php echo e(asset('/assets/img/delete.png')); ?>" alt="" class="img-fluid mx-1"></a>
                    </div>
                </form>
                </td>
                <?php if($item->block_status==2): ?>
                <td class="text-center">
                  <form method="GET" action="<?php echo e(url('/')); ?>/block-active/<?php echo e($item->id ?? ''); ?>">
                    <input type="checkbox" data-toggle="toggle" data-on=" " data-off=" " data-style="ios" data-key="check<?php echo e($key); ?>" checked>
                  </form>
                </td>
                <?php else: ?>
                <td class="text-center">
                  <form method="GET" action="<?php echo e(url('/')); ?>/block-deactive/<?php echo e($item->id ?? ''); ?>">
                    <input type="checkbox" data-toggle="toggle" data-on=" " data-off=" " data-style="ios" data-key="check<?php echo e($key); ?>">
                  </form>
                </td>
                <?php endif; ?>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="d-flex flex-column justify-content-center align-items-center align-content-center mb-1 mt-1 mx-auto">
        <?php echo e($block->links('pagination::bootstrap-4')); ?>

        <!-- <?php echo e($block->links('pagination::simple-tailwind')); ?> -->
        <!-- <?php echo e($block->links('pagination::semantic-ui')); ?>

            <?php echo e($block->links('pagination::simple-tailwind')); ?> -->
      </div>
    </div>
  </div>
</div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layouts.user_type.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chiraggupta/Sites/localhost/chirag/srchout/infospeed_admin/resources/views/Admin/block/block.blade.php ENDPATH**/ ?>