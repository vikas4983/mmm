<?php $__env->startSection('title', 'Approvals | Admin'); ?>
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

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"> <a href="<?php echo e(url('dashboard')); ?>">Home</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Approval</li>
                        </ol>
                    </nav>
                    
                </div>
            </div>

            <div class="card card-default">
                <div class="card-header">
                    <?php if(count($approvals) > 0): ?>
                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Review</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Account</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Matri Id</th>


                                    
                                    
                                    

                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = ($approvals->currentPage() - 1) * $approvals->perPage() + 1;
                                ?>

                                <?php $__currentLoopData = $approvals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <span class="mr-1 btn-sm btn btn-icon btn-outline facebook btn-rounded-circle"
                                                data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-eye"></i>
                                            </span>

                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header d-flex justify-content-center">
                                                            <h5 class="modal-title" id="exampleModalLabel">Approvals</h5>
                                                            <button type="button" class="close position-absolute"
                                                                style="right: 1rem;" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container">

                                                            </div>
                                                        </div>


                                                        <form action="<?php echo e(route('approvals.update', $approval ?? '')); ?>"
                                                            method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('PATCH'); ?>
                                                            <div class="container">
                                                                <div class="mb-3">
                                                                    <label
                                                                        class="switch switch-text switch-primary switch-pill form-control-label">
                                                                        <input type="checkbox"
                                                                            class="switch-input form-check-input"
                                                                            value="off">
                                                                        <span class="switch-label" data-on="All"
                                                                            data-off="Off"></span>
                                                                        <span class="switch-handle"></span>
                                                                    </label>
                                                                </div>
                                                                <div>
                                                                    <span>
                                                                        <label
                                                                            class="switch switch-icon switch-primary form-control-label">
                                                                            <input type="checkbox"
                                                                                class="switch-input form-check-input individual-switch"
                                                                                value="<?php echo e('123'); ?>" name="about_me">
                                                                            <span class="switch-label"></span>
                                                                            <span class="switch-handle"></span>
                                                                        </label>
                                                                        <label class="ml-2 ">About Me</label>
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <textarea class="col-lg-12 mb-3"  ></textarea>
                                                                </div>
                                                                <div>
                                                                    <span>
                                                                        <label
                                                                            class="switch switch-icon switch-primary form-control-label">
                                                                            <input type="checkbox"
                                                                                class="switch-input form-check-input individual-switch"
                                                                                value="off">
                                                                            <span class="switch-label"></span>
                                                                            <span class="switch-handle"></span>
                                                                        </label>
                                                                        <label class="ml-2">About Education</label>
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <textarea class="col-lg-12 mb-3"  ></textarea>
                                                                </div>
                                                                <div>
                                                                    <span>
                                                                        <label
                                                                            class="switch switch-icon switch-primary form-control-label">
                                                                            <input type="checkbox"
                                                                                class="switch-input form-check-input individual-switch"
                                                                                value="off">
                                                                            <span class="switch-label"></span>
                                                                            <span class="switch-handle"></span>
                                                                        </label>
                                                                        <label class="ml-2">About Occupation</label>
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <textarea class="col-lg-12 mb-3"  name="aboutMe"></textarea>
                                                                </div>
                                                                <div>
                                                                    <span>
                                                                        <label
                                                                            class="switch switch-icon switch-primary form-control-label">
                                                                            <input type="checkbox"
                                                                                class="switch-input form-check-input individual-switch"
                                                                                value="off">
                                                                            <span class="switch-label"></span>
                                                                            <span class="switch-handle"></span>
                                                                        </label>
                                                                        <label class="ml-2 ">About Family</label>
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <textarea class="col-lg-12 mb-3"  name="aboutMe"></textarea>
                                                                </div>

                                                                <div>
                                                                    <span>
                                                                        <label
                                                                            class="switch switch-icon switch-primary form-control-label">
                                                                            <input type="checkbox"
                                                                                class="switch-input form-check-input individual-switch"
                                                                                value="off">
                                                                            <span class="switch-label"></span>
                                                                            <span class="switch-handle"></span>
                                                                        </label>
                                                                        <label class="ml-2">Read Carefully</label>
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <textarea class="col-lg-12 mb-3"  name="aboutMe"></textarea>
                                                                </div>
                                                                <div>
                                                                    <span>
                                                                        <label
                                                                            class="switch switch-icon switch-primary form-control-label">
                                                                            <input type="checkbox"
                                                                                class="switch-input form-check-input individual-switch"
                                                                                value="off">
                                                                            <span class="switch-label"></span>
                                                                            <span class="switch-handle"></span>
                                                                        </label>
                                                                        <label class="ml-2">Success Story</label>
                                                                    </span>
                                                                </div>
                                                                <?php $__currentLoopData = $approval->user->successStories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $successStory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    
                                                                    <div>
                                                                        <div class="col-md-4 mb-3">
                                                                            <div class="card">
                                                                                <div class="container">
                                                                                    <div>
                                                                                        <h3 style="color:#9E6DE0">
                                                                                            <?php echo e($successStory->groom_name ?? ''); ?>

                                                                                            &
                                                                                            <?php echo e($successStory->bride_name ?? ''); ?>

                                                                                        </h3>
                                                                                    </div>
                                                                                    <div> <i
                                                                                            class="mdi mdi-calendar-heart"></i>
                                                                                        <?php echo e($successStory->wedding_date ?? ''); ?>

                                                                                    </div>
                                                                                </div>

                                                                                <?php if($successStory->status == 'Active' ?? ''): ?>
                                                                                    <div class="card-img-top"
                                                                                        style="border-top-left-radius: 2px; border-top-right-radius: 2px; background-color: #0ACB8E; height: 5px;">
                                                                                    </div>
                                                                                <?php else: ?>
                                                                                    <div class="card-img-top"
                                                                                        style="border-top-left-radius: 2px; border-top-right-radius: 2px; background-color: #ec0c0c; height: 5px;">
                                                                                    </div>
                                                                                <?php endif; ?>

                                                                                <img class="card-img-top"
                                                                                    src="<?php echo e(asset('storage/admin/successStory/' . ($successStory ? $successStory->wedding_image : ''))); ?>"
                                                                                    alt="Success Story Image">
                                                                                <div class="card-body">
                                                                                    <!-- Apply text-center class here -->
                                                                                    
                                                                                    <p class="card-text pb-3">
                                                                                        <?php echo e($successStory->description ?? ''); ?>

                                                                                    <p>

                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                            </div>
                                                            <div class="text-center mb-3">
                                                                <button type="submit"
                                                                    class="btn btn-lg btn-outline-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td> <?php if (isset($component)) { $__componentOriginalc706a4c5a6dba5c17dd67cf6ade65984 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc706a4c5a6dba5c17dd67cf6ade65984 = $attributes; } ?>
<?php $component = App\View\Components\StatusComponent::resolve(['status' => $approval->status] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php endif; ?><?php echo e($approval->user->name); ?></td>
                                        <td><?php echo e($planStatus); ?></td>
                                        <td><?php echo e($approval->user->created_at); ?></td>
                                        <?php $__currentLoopData = $profilePrefixes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profilePrefixe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                <?php echo e($profilePrefixe->name); ?>

                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                                    </tr>
                                    <?php
                                        $count++;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            <span><?php echo e($approvals->links()); ?></span>

                        </div>
                    <?php else: ?>
                        <h3 class="text-center text-danger">No Approvals found</h3>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
    <script></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\approvals\index.blade.php ENDPATH**/ ?>