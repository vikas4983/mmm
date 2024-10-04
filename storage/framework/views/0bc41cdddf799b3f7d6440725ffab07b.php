<?php $__env->startSection('title', 'Menus | Admin'); ?>
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
                            <li class="breadcrumb-item active" aria-current="page">Menu</li>
                        </ol>
                    </nav>
                    <span> <?php if (isset($component)) { $__componentOriginal7f54ab6e47174806226d9218422bf2aa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7f54ab6e47174806226d9218422bf2aa = $attributes; } ?>
<?php $component = App\View\Components\CreateButtonComponent::resolve(['createRoute' => ''.e(url('admin/menus/create')).'','activeRoute' => ''.e(url('admin/menus-active')).'','deleteAllRoute' => ''.e(url('admin/menus-destroy')).'','inActiveRoute' => ''.e(url('admin/menus-inActive')).'','countAll' => ''.e($countAll).'','active' => ''.e($active).'','inActive' => ''.e($inActive).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
            <div class="row">
                <div class="card card-default col-lg-6">
                    <div class="card-header">
                        <div class="text-center col-lg-12">
                            <h6 class="btn btn-primary btn-sm mb-3">Header Menu</h6>
                        </div>
                        <?php if(count($headers) > 0): ?>
                            
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"><input type="checkbox" id="allCheckbox"></th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Menu Name</th>
                                        

                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = ($headers->currentPage() - 1) * $headers->perPage() + 1;
                                    ?>

                                    <?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="width: 15px"><?php echo e($count); ?></td>
                                            <td style="width: 15px">
                                                <input type="checkbox" class="selectCheckbox" name="selectedHeadersIds[]"
                                                    value="<?php echo e($header->id); ?>"></td>
                                            <td class="d-flex flex-row">
                                                <?php if (isset($component)) { $__componentOriginale9eefe50b390207aad69b8e237e3dc7d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale9eefe50b390207aad69b8e237e3dc7d = $attributes; } ?>
<?php $component = App\View\Components\ActionButton::resolve(['destroyRoute' => ''.e(route('menus.destroy', $header->id)).'','editRoute' => ''.e(route('menus.edit', $header->id)).'','id' => '$header->id','entityType' => '\'headers\''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('action-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ActionButton::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale9eefe50b390207aad69b8e237e3dc7d)): ?>
<?php $attributes = $__attributesOriginale9eefe50b390207aad69b8e237e3dc7d; ?>
<?php unset($__attributesOriginale9eefe50b390207aad69b8e237e3dc7d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale9eefe50b390207aad69b8e237e3dc7d)): ?>
<?php $component = $__componentOriginale9eefe50b390207aad69b8e237e3dc7d; ?>
<?php unset($__componentOriginale9eefe50b390207aad69b8e237e3dc7d); ?>
<?php endif; ?>
                                                <a href="<?php echo e(route('menus.show', $header->id)); ?>"
                                                    class="mr-1 mb-3 btn-sm btn btn-icon btn-outline facebook btn-rounded-circle"><i
                                                        class="fa fa-eye" style="color:#04C7E0"></i></a>
                                            </td>
                                            <td>
                                                <?php if (isset($component)) { $__componentOriginalc706a4c5a6dba5c17dd67cf6ade65984 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc706a4c5a6dba5c17dd67cf6ade65984 = $attributes; } ?>
<?php $component = App\View\Components\StatusComponent::resolve(['status' => $header->status] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('status-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\StatusComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc706a4c5a6dba5c17dd67cf6ade65984)): ?>
<?php $attributes = $__attributesOriginalc706a4c5a6dba5c17dd67cf6ade65984; ?>
<?php unset($__attributesOriginalc706a4c5a6dba5c17dd67cf6ade65984); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc706a4c5a6dba5c17dd67cf6ade65984)): ?>
<?php $component = $__componentOriginalc706a4c5a6dba5c17dd67cf6ade65984; ?>
<?php unset($__componentOriginalc706a4c5a6dba5c17dd67cf6ade65984); ?>
<?php endif; ?>
                                                <?php echo e($header->name); ?>

                                            </td>
                                        </tr>
                                        <?php
                                            $count++;
                                        ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                <span><?php echo e($headers->links()); ?></span>

                            </div>
                        <?php else: ?>
                            <h3 class="text-center text-danger">No Header found</h3>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="card card-default col-lg-6">
                    <div class="card-header">
                        <div class="text-center col-lg-12">
                            <h6 class="btn btn-primary btn-sm mb-3">Footer Menu</h6>
                        </div>
                        <?php if(count($footers) > 0): ?>
                            
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        
                                        <th scope="col">Action</th>
                                        <th scope="col">Menu Name</th>
                                        

                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = ($footers->currentPage() - 1) * $footers->perPage() + 1;
                                    ?>
                                    <?php $__currentLoopData = $footers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($count); ?></td>
                                            
                                            <td>
                                                <?php if (isset($component)) { $__componentOriginale9eefe50b390207aad69b8e237e3dc7d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale9eefe50b390207aad69b8e237e3dc7d = $attributes; } ?>
<?php $component = App\View\Components\ActionButton::resolve(['destroyRoute' => ''.e(route('menus.destroy', $footer->id)).'','editRoute' => ''.e(route('menus.edit', $footer->id)).'','id' => '$footer->id','entityType' => '\'footers\''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('action-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ActionButton::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale9eefe50b390207aad69b8e237e3dc7d)): ?>
<?php $attributes = $__attributesOriginale9eefe50b390207aad69b8e237e3dc7d; ?>
<?php unset($__attributesOriginale9eefe50b390207aad69b8e237e3dc7d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale9eefe50b390207aad69b8e237e3dc7d)): ?>
<?php $component = $__componentOriginale9eefe50b390207aad69b8e237e3dc7d; ?>
<?php unset($__componentOriginale9eefe50b390207aad69b8e237e3dc7d); ?>
<?php endif; ?>
                                                <a href="<?php echo e(route('menus.show', $footer->id)); ?>"
                                                    class="mr-1 btn-sm btn btn-icon btn-outline facebook btn-rounded-circle"><i
                                                        class="fa fa-eye " style="color:#04C7E0"></i></a>
                                            </td>
                                            
                                            
                                            <td><?php if (isset($component)) { $__componentOriginalc706a4c5a6dba5c17dd67cf6ade65984 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc706a4c5a6dba5c17dd67cf6ade65984 = $attributes; } ?>
<?php $component = App\View\Components\StatusComponent::resolve(['status' => $footer->status] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('status-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\StatusComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc706a4c5a6dba5c17dd67cf6ade65984)): ?>
<?php $attributes = $__attributesOriginalc706a4c5a6dba5c17dd67cf6ade65984; ?>
<?php unset($__attributesOriginalc706a4c5a6dba5c17dd67cf6ade65984); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc706a4c5a6dba5c17dd67cf6ade65984)): ?>
<?php $component = $__componentOriginalc706a4c5a6dba5c17dd67cf6ade65984; ?>
<?php unset($__componentOriginalc706a4c5a6dba5c17dd67cf6ade65984); ?>
<?php endif; ?>
                                                <?php echo e($footer->name); ?></td>
                                            

                                            

                                        </tr>
                                        <?php
                                            $count++;
                                        ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                <span><?php echo e($footers->links()); ?></span>

                            </div>
                        <?php else: ?>
                            <h3 class="text-center text-danger">No Footer found</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\menus\index.blade.php ENDPATH**/ ?>