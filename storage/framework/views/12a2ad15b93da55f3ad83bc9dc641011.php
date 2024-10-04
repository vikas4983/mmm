

<?php $__env->startSection('title', 'Email Templates | Admin'); ?>

<?php $__env->startSection('styles'); ?>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Email Templates</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    
                    <button type="button" class="mb-3 btn btn-lg btn-outline-primary" data-toggle="modal"
                        data-target="#emailTemplateCreate">
                        <i class="mdi mdi-star-outline"></i> New Email Template
                    </button>
                    <?php if (isset($component)) { $__componentOriginal63ea63b012557e2eb1313dadf7291623 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal63ea63b012557e2eb1313dadf7291623 = $attributes; } ?>
<?php $component = App\View\Components\EmailTemplateCreateComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('email-template-create-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\EmailTemplateCreateComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal63ea63b012557e2eb1313dadf7291623)): ?>
<?php $attributes = $__attributesOriginal63ea63b012557e2eb1313dadf7291623; ?>
<?php unset($__attributesOriginal63ea63b012557e2eb1313dadf7291623); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal63ea63b012557e2eb1313dadf7291623)): ?>
<?php $component = $__componentOriginal63ea63b012557e2eb1313dadf7291623; ?>
<?php unset($__componentOriginal63ea63b012557e2eb1313dadf7291623); ?>
<?php endif; ?>


                    <?php if(count($emailTemplates) > 0): ?>
                        <table class="table table-striped" id="emailTemplates" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Actions</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Body</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = ($emailTemplates->currentPage() - 1) * $emailTemplates->perPage() + 1; ?>
                                <?php $__currentLoopData = $emailTemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emailTemplat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($count); ?></td>
                                        <td>
                                            <?php if (isset($component)) { $__componentOriginale9eefe50b390207aad69b8e237e3dc7d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale9eefe50b390207aad69b8e237e3dc7d = $attributes; } ?>
<?php $component = App\View\Components\ActionButton::resolve(['destroyRoute' => ''.e(route('emailTemplates.destroy', $emailTemplat->id)).'','editRoute' => ''.e(route('emailTemplates.edit', $emailTemplat->id)).'','id' => ''.e($emailTemplat->id).'','entityType' => 'emailTemplat'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                                        <td>
                                            <?php if (isset($component)) { $__componentOriginalc706a4c5a6dba5c17dd67cf6ade65984 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc706a4c5a6dba5c17dd67cf6ade65984 = $attributes; } ?>
<?php $component = App\View\Components\StatusComponent::resolve(['status' => $emailTemplat->status] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php endif; ?><?php echo e($emailTemplat->name); ?>

                                        </td>
                                        <td><?php echo e($emailTemplat->action ?? ''); ?></td>
                                        <td><?php echo e($emailTemplat->subject ?? ''); ?></td>
                                        <td><?php echo e(Str::limit($emailTemplat->body ?? '', 15)); ?></td>


                                    </tr>
                                    <?php $count++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            <span><?php echo e($emailTemplates->links()); ?></span>
                        </div>
                    <?php else: ?>
                        <div class="row text-center">
                            <h3 class="text-danger">No Email Templates found!</h3>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\emailTemplates\index.blade.php ENDPATH**/ ?>