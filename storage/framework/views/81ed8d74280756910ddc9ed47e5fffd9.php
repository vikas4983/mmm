
<?php $__env->startSection('title', 'Banners | Admin'); ?>
<?php $__env->startSection('styles'); ?>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <script src="http://datatables.net/release-datatables/media/js/jquery.js"></script>
    <script src="http://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
    <script src="http://datatables.net/release-datatables/extensions/Scroller/js/dataTables.scroller.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="<?php echo e(asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')); ?>"
        rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"> <a href="<?php echo e(url('dashboard')); ?>">Home</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Banner</li>
                        </ol>
                    </nav>

                    <span> <?php if (isset($component)) { $__componentOriginal7f54ab6e47174806226d9218422bf2aa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7f54ab6e47174806226d9218422bf2aa = $attributes; } ?>
<?php $component = App\View\Components\CreateButtonComponent::resolve(['createRoute' => ''.e(url('admin/banners/create')).'','activeRoute' => ''.e(url('admin/banners-active')).'','deleteAllRoute' => ''.e(url('admin/banners-destroy')).'','inActiveRoute' => ''.e(url('admin/banners-inActive')).'','countAll' => ''.e($countAll).'','active' => ''.e($active).'','inActive' => ''.e($inActive).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('create-button-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\CreateButtonComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7f54ab6e47174806226d9218422bf2aa)): ?>
<?php $attributes = $__attributesOriginal7f54ab6e47174806226d9218422bf2aa; ?>
<?php unset($__attributesOriginal7f54ab6e47174806226d9218422bf2aa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f54ab6e47174806226d9218422bf2aa)): ?>
<?php $component = $__componentOriginal7f54ab6e47174806226d9218422bf2aa; ?>
<?php unset($__componentOriginal7f54ab6e47174806226d9218422bf2aa); ?>
<?php endif; ?></span>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <?php if(count($banners) > 0): ?>
                        <table class="table table-striped" id="employees" class="display nowrap" width="100%">

                            <thead>
                            </thead>
                            <tbody>
                                <button type="button" class="mb-3 btn btn-lg btn-outline-primary" data-toggle="modal"
                                    data-target="#exampleModalForm"><i class="mdi mdi-star-outline"></i> New Banner
                                </button>

                                <div class="modal fade" id="exampleModalForm" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalFormTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalFormTitle">Add New Banner</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <?php if($errors->any()): ?>
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><?php echo e($error); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                            <div class="modal-body">
                                                <form action="<?php echo e(route('banners.store')); ?>" id="bannerModalForm"
                                                    method="post" enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-group">
                                                        <label> Upload Banner</label>
                                                        <input type="file" class="form-control" name="banner"
                                                            id="input">
                                                        <p class="text-primary small mt-1"></i>Jpg, Jpeg, Png and Gif Files
                                                            Supported, Max Size 1MB.</p>
                                                        <div id="bannerNull" class="invalid-feedback"></div>
                                                        <div id="bannerFill" class="valid-feedback"></div>
                                                    </div>
                                                    <div><label>Status</label></div>
                                                    <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                        <input type="radio" id="customRadio1" name="status"
                                                            class="custom-control-input" value="1">
                                                        <label class="custom-control-label"
                                                            for="customRadio1">Active</label>
                                                    </div>
                                                    <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                        <input type="radio" id="customRadio2" name="status"
                                                            class="custom-control-input" checked="checked" value="0">
                                                        <label class="custom-control-label"
                                                            for="customRadio2">InActive</label>
                                                    </div>
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
                                    </div>
                                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-3">
                    <div class="card">

                        <?php if($banner->status == 'Active' ?? ''): ?>
                            <div class="card-img-top"
                                style="border-top-left-radius: 2px; border-top-right-radius: 2px; background-color: #0ACB8E; height: 5px;">
                            </div>
                        <?php else: ?>
                            <div class="card-img-top"
                                style="border-top-left-radius: 2px; border-top-right-radius: 2px; background-color: #ec0c0c; height: 5px;">
                            </div>
                        <?php endif; ?>

                        <img class="card-img-top"
                            src="<?php echo e(asset('storage/admin/banners/' . ($banner ? $banner->name : ''))); ?>"
                            alt="Banner Image">
                        <div class="card-body text-center"> <!-- Apply text-center class here -->
                            
                            <p class="card-text pb-3"><i class = "mdi mdi-alert-decagram" style="color: #FEC400"></i> jpg
                                &
                                jpeg files supported.Max Size
                                1MB. </p>
                            <p class="card-text pb-3"><i class = "mdi mdi-alert-decagram"
                                    style="color: #FEC400"></i>Press
                                Control + f5 if banner not
                                reflecting after upload.. </p>
                            <div class="d-flex justify-content-center">
                                <?php if (isset($component)) { $__componentOriginald29b659bc6900e31e979f54fae6a42b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald29b659bc6900e31e979f54fae6a42b8 = $attributes; } ?>
<?php $component = App\View\Components\EditActionButtonComponent::resolve(['editRoute' => route('banners.edit', $banner->id),'id' => $banner->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('edit-action-button-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\EditActionButtonComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald29b659bc6900e31e979f54fae6a42b8)): ?>
<?php $attributes = $__attributesOriginald29b659bc6900e31e979f54fae6a42b8; ?>
<?php unset($__attributesOriginald29b659bc6900e31e979f54fae6a42b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald29b659bc6900e31e979f54fae6a42b8)): ?>
<?php $component = $__componentOriginald29b659bc6900e31e979f54fae6a42b8; ?>
<?php unset($__componentOriginald29b659bc6900e31e979f54fae6a42b8); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginaldf8dad82159d82b8495c6758fc5363ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8dad82159d82b8495c6758fc5363ec = $attributes; } ?>
<?php $component = App\View\Components\DestroyActionButtonComponent::resolve(['destroyRoute' => route('banners.destroy', $banner->id),'id' => $banner->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('destroy-action-button-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\DestroyActionButtonComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8dad82159d82b8495c6758fc5363ec)): ?>
<?php $attributes = $__attributesOriginaldf8dad82159d82b8495c6758fc5363ec; ?>
<?php unset($__attributesOriginaldf8dad82159d82b8495c6758fc5363ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8dad82159d82b8495c6758fc5363ec)): ?>
<?php $component = $__componentOriginaldf8dad82159d82b8495c6758fc5363ec; ?>
<?php unset($__componentOriginaldf8dad82159d82b8495c6758fc5363ec); ?>
<?php endif; ?>
                       
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        </tbody>

        </table>
        <div class="d-flex justify-content-center">
            <span><?php echo e($banners->links()); ?></span>
        </div>
    <?php else: ?>
        <h3 class="text-center text-danger">No Banner found</h3>
        <?php endif; ?>
    </div>
    </div>

    </div>
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\banners\index.blade.php ENDPATH**/ ?>