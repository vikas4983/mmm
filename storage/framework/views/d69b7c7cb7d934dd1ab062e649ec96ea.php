<?php $__env->startSection('title', 'Plans | Admin'); ?>
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
                            <li class="breadcrumb-item active" aria-current="page">Plan</li>
                        </ol>
                    </nav>
                    <span> <?php if (isset($component)) { $__componentOriginal7f54ab6e47174806226d9218422bf2aa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7f54ab6e47174806226d9218422bf2aa = $attributes; } ?>
<?php $component = App\View\Components\CreateButtonComponent::resolve(['createRoute' => ''.e(url('admin/plans/create')).'','activeRoute' => ''.e(url('admin/plans-active')).'','deleteAllRoute' => ''.e(url('admin/plans-destroy')).'','inActiveRoute' => ''.e(url('admin/plans-inActive')).'','countAll' => ''.e($countAll).'','active' => ''.e($active).'','inActive' => ''.e($inActive).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                    <?php if(count($plans) > 0): ?>
                        <table class="table table-striped" id="plans">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><input type="checkbox" id="selectAllCheckbox"></th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Plan</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Offer</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Chat</th>
                                    <th scope="col">Video</th>
                                    <th scope="col">Message</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = ($plans->currentPage() - 1) * $plans->perPage() + 1;
                                ?>
                                <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($count); ?></td>
                                        <td><input type="checkbox" class="selectCheckbox" name="selectedIds[]"
                                                value="<?php echo e($plan->id); ?>"></td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <?php if (isset($component)) { $__componentOriginald29b659bc6900e31e979f54fae6a42b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald29b659bc6900e31e979f54fae6a42b8 = $attributes; } ?>
<?php $component = App\View\Components\EditActionButtonComponent::resolve(['editRoute' => route('plans.edit', $plan->id),'id' => $plan->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php $component = App\View\Components\DestroyActionButtonComponent::resolve(['destroyRoute' => route('plans.destroy', $plan->id),'id' => $plan->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                                        </td>
                                        <td><?php if (isset($component)) { $__componentOriginalc706a4c5a6dba5c17dd67cf6ade65984 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc706a4c5a6dba5c17dd67cf6ade65984 = $attributes; } ?>
<?php $component = App\View\Components\StatusComponent::resolve(['status' => $plan->status] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                                            <?php echo e($plan->name); ?></td>
                                        <td><?php echo e($plan->duration); ?></td>
                                        <td><?php echo e($plan->price); ?></td>
                                        <td><?php echo e($plan->offer); ?></td>
                                        <td><?php echo e($plan->allow_contact); ?></td>
                                        <td><?php echo e($plan->chat); ?></td>
                                        <td><?php echo e($plan->video_call); ?></td>
                                        <td><?php echo e($plan->message); ?></td>
                                    </tr>
                                    <?php
                                        $count++;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            <span><?php echo e($plans->links()); ?></span>

                        </div>
                    <?php else: ?>
                        <h3 class="text-center text-danger">No Plane found</h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/auth/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#plans').DataTable();
            $(".dataTables_wrapper").css("width", "100%");
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\plans\index.blade.php ENDPATH**/ ?>