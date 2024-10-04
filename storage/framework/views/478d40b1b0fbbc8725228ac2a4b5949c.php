 ;
 <?php $__env->startSection('title', 'Banner - Edit | Admin'); ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     <link rel="stylesheet" href="<?php echo e(asset('css/custom-css/previouseLogo.css')); ?>">
 </head>

 <body>

     <?php $__env->startSection('content'); ?>
         <div class="content-wrapper">
             <div class="content">
                 <div class="card card-default">
                     <div class="card-header">
                         <nav aria-label="breadcrumb">
                             <ol class="breadcrumb">
                                  <li class="breadcrumb-item"> <a href="<?php echo e(url('dashboard')); ?>">Home</a> </li>
                                 <li class="breadcrumb-item"> <a href="<?php echo e(route('banners.index')); ?>">Banner</a> </li>
                                 <li class="breadcrumb-item active" aria-current="page">Edit Banner
                                 </li>
                             </ol>
                         </nav>
                     </div>
                 </div>

                 <?php if($banner): ?>
                     <div class="card card-default">
                         <div class="card-body">
                             
                             <?php if($errors->any()): ?>
                                 <div class="alert alert-danger">
                                     <ul>
                                         <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <li><?php echo e($error); ?></li>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     </ul>
                                 </div>
                             <?php endif; ?>
                             
                             

                             
                             <form action="<?php echo e(route('banners.update', $banner->id)); ?>" method="post"
                                 enctype="multipart/form-data">
                                 <?php echo csrf_field(); ?>
                                 <?php echo method_field('PATCH'); ?>

                                 <div class="form-group">

                                     <img src="<?php echo e(asset('storage/admin/banners/' . ($banner->name ?? ''))); ?>" alt=""
                                        
                                         style="margin-left: 604px;
                                                padding:;
                                               
                                                max-width: 200px;
                                                margin-top: -16px;
                                                margin-bottom: -39px;
                                                ">
                                 </div>
                                 <div class="form-group">
                                     <label>Upload New Banner</label>
                                     <input type="file" class="form-control" name="banner">
                                 </div>
                                 
                                 <div><label>Status</label></div>
                        <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                            <input type="radio" id="customRadio1" name="status" class="custom-control-input"
                                value="1" <?php echo e($banner->status == 'Active' ? 'checked' : ''); ?>>
                            <label class="custom-control-label" for="customRadio1">Active</label>
                        </div>

                        <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                            <input type="radio" id="customRadio2" name="status" class="custom-control-input"
                                value="0" <?php echo e($banner->status == 'Inactive' ? 'checked' : ''); ?>>
                            <label class="custom-control-label" for="customRadio2">Inactive</label>
                        </div>
                                 
                                 <div class="text-center">
                            
                             <?php if (isset($component)) { $__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd = $attributes; } ?>
<?php $component = App\View\Components\SubmitButtonComponent::resolve(['buttonStyle' => '$buttonStyle->buttonStyle','content' => 'Upload Banner'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('submit-button-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubmitButtonComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd)): ?>
<?php $attributes = $__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd; ?>
<?php unset($__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd)): ?>
<?php $component = $__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd; ?>
<?php unset($__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd); ?>
<?php endif; ?>
                             </form>

                         </div>
                     </div>
                 <?php endif; ?>

             </div>
         </div>
     <?php $__env->stopSection(); ?>

 </body>

 </html>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\banners\edit.blade.php ENDPATH**/ ?>