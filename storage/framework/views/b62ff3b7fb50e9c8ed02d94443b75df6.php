<?php $__env->startSection('title', ' Occupations | Admin'); ?>
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
                            <li class="breadcrumb-item active" aria-current="page">Occupation</li>
                        </ol>
                    </nav>
                   <span> <?php if (isset($component)) { $__componentOriginal7f54ab6e47174806226d9218422bf2aa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7f54ab6e47174806226d9218422bf2aa = $attributes; } ?>
<?php $component = App\View\Components\CreateButtonComponent::resolve(['createRoute' => ''.e(url('admin/occupations/create')).'','activeRoute' => ''.e(url('admin/occupations-active')).'','deleteAllRoute' => ''.e(url('admin/occupations-destroy')).'','inActiveRoute' => ''.e(url('admin/occupations-inActive')).'','countAll' => ''.e($countAll).'','active' => ''.e($active).'','inActive' => ''.e($inActive).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                    

                    <?php if(count($occupations) > 0): ?>
                        <table class="table table-striped" id="occupations" class="display nowrap" width="100%">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><input type="checkbox" id="selectAllCheckbox"></th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Occupation</th>
                                    <th scope="col">Employee Type</th>
                                    
                                   
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $count = ($occupations->currentPage() - 1) * $occupations->perPage() + 1;
                                ?>
                                <?php $__currentLoopData = $occupations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($count); ?></td>
                                        <td><input type="checkbox" class="selectCheckbox" name="selectedIds[]"
                                                value="<?php echo e($occupation->id); ?>"></td>
                                        
                                             <td> 
                                            <?php if (isset($component)) { $__componentOriginale9eefe50b390207aad69b8e237e3dc7d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale9eefe50b390207aad69b8e237e3dc7d = $attributes; } ?>
<?php $component = App\View\Components\ActionButton::resolve(['destroyRoute' => ''.e(route('occupations.destroy', $occupation->id)).'','editRoute' => ''.e(route('occupations.edit', $occupation->id)).'','id' => '$occupation->id','entityType' => '\'occupation\''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                                        </td>
                                            
                                          <td> <?php if (isset($component)) { $__componentOriginalc706a4c5a6dba5c17dd67cf6ade65984 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc706a4c5a6dba5c17dd67cf6ade65984 = $attributes; } ?>
<?php $component = App\View\Components\StatusComponent::resolve(['status' => $occupation->status] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php endif; ?><?php echo e($occupation->occupation); ?></td>
                                        <td><?php echo e($occupation->employee->employee); ?></td>
                                        
                                       
                                    </tr>
                                     <?php
                                        $count++;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center">
                            <span><?php echo e($occupations->links()); ?></span>

                        </div>
                    <?php else: ?>
                        <h3 class="text-center text-danger">No Occupations found</h3>
                    <?php endif; ?>
                </div>


            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\employees\occupations\index.blade.php ENDPATH**/ ?>