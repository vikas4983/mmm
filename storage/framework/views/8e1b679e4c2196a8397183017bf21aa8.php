<div class="gt-panel gt-panel-default" id="editContactSection">
    <div class="gt-panel-head">
        <span class="pull-left">
            <i class="fa fa-book"></i>Contact Information
        </span>
        <a class="pull-right btn gt-btn-orange" id="editContactBtn">
            <i class="fa fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">EDIT</font>
        </a>
    </div>

    <div class="gt-panel-body">
        <div class="row">
            <?php
                $fields = config('formFields.contactDetails');
              
            ?>
           <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
               <div class="row">
                   <div class="col-xs-6"><?php echo e($field['label']); ?>:</div>
                   <?php if($field['name'] === 'address'): ?>
                       <div class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16">
                           <b id="<?php echo e($field['id'] ?? null); ?>">
                               <?php
                                   $fieldName = $field['name'];
                               ?>
                               <?php echo e($user->contactDetails->{$fieldName} ?? 'N/A '); ?>

                           </b>
                       </div>
                   <?php else: ?>
                       <div class="col-xs-10">
                           <b id="<?php echo e($field['id'] ?? null); ?>">
                               <?php
                                   $fieldName = $field['name'];
                               ?>
                               <?php echo e($user->contactDetails->{$fieldName} ?? 'N/A'); ?>

                           </b>
                       </div>
                   <?php endif; ?>
               </div>
           </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       


        </div>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/view-contact-details-component.blade.php ENDPATH**/ ?>