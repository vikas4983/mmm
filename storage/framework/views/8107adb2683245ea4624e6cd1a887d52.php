
<?php $__env->startSection('title', 'Logo & Favicons | Admin'); ?>
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
                            <li class="breadcrumb-item active" aria-current="page">Logo</li>
                        </ol>
                    </nav>

                    <span> <?php if (isset($component)) { $__componentOriginal7f54ab6e47174806226d9218422bf2aa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7f54ab6e47174806226d9218422bf2aa = $attributes; } ?>
<?php $component = App\View\Components\CreateButtonComponent::resolve(['createRoute' => ''.e(url('admin/logos/create')).'','activeRoute' => ''.e(url('admin/logos-active')).'','deleteAllRoute' => ''.e(url('admin/logos-destroy')).'','inActiveRoute' => ''.e(url('admin/logos-inActive')).'','countAll' => ''.e($countAll).'','active' => ''.e($active).'','inActive' => ''.e($inActive).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                    <?php if(count($logos) > 0): ?>
                        <table class="table table-striped" id="employees" class="display nowrap" width="100%">

                            <thead>
                                
                            </thead>

                            <tbody>
                                <?php
                                    $count = ($logos->currentPage() - 1) * $logos->perPage() + 1;
                                ?>

                                
                                <?php $__currentLoopData = $logos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card-deck col-lg-6">
                                        <div class="card">
                                            <div class="text-left mt-3 m-3">
                                                    <button type="button" class="btn  btn-outline-primary" data-toggle="modal"
                                                        data-target="#exampleModalForm">
                                                        <i class="mdi mdi-star-outline"></i> New Logo
                                                    </button>
                                                </div>
                                            


                                            <div class="modal fade" id="exampleModalForm" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalFormTitle" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalFormTitle">Add New
                                                                Logo</h5>
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
                                                            <form action="<?php echo e(route('logos.store')); ?>"
                                                                id="bannerModalForm" method="post"
                                                                enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="form-group">
                                                                    <label> Upload Logo</label>
                                                                    <input type="file" class="form-control"
                                                                        name="logo" id="input">
                                                                        <p class="text-primary small mt-1"></i>Jpg, Jpeg, Png and Gif Files Supported, Max Size 1MB.</p>
                                                                    <div id="bannerNull" class="invalid-feedback"></div>
                                                                    <div id="bannerFill" class="valid-feedback"></div>
                                                                </div>
                                                                <div><label>Status</label></div>
                                                                <div
                                                                    class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                                    <input type="radio" id="customRadio1" name="status"
                                                                        class="custom-control-input" value="1">
                                                                    <label class="custom-control-label"
                                                                        for="customRadio1">Active</label>
                                                                </div>
                                                                <div
                                                                    class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                                    <input type="radio" id="customRadio2" name="status"
                                                                        class="custom-control-input" checked="checked"
                                                                        value="0">
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
                                            <div class="text-center mt-3">
                                                <img width="500px" class="mt-3" height="100px"
                                                    src="<?php echo e(asset('storage/admin/logo-favicon/logos/' . ($logo ? $logo->name : ''))); ?>"
                                                    alt="Card image cap">
                                            </div>
                                            <br><br>
                                            <div class="card-body">
                                                
                                                <p class="card-text pb-3"><i class = "mdi mdi-alert-decagram"
                                                        style="color: #FEC400"></i> jpg
                                                    &
                                                    jpeg files supported.Max Size
                                                    1MB. </p>
                                                <p class="card-text pb-3"><i class = "mdi mdi-alert-decagram"
                                                        style="color: #FEC400"></i>Press
                                                    Control + f5 if logo not
                                                    reflecting after upload.. </p>
                                                <div class="d-flex justify-content-center mt-3">
                                                    <!-- Wrap all buttons in a div -->
                                                    
                                                    
                                                    <a href="<?php echo e(route('logos.edit', $logo->id ?? '')); ?>"
                                                        class="mr-1 btn-sm btn btn-icon btn-outline facebook btn-rounded-circle"><i class="fa fa-edit"></i></a>
                                                    <form action="<?php echo e(route('logos.destroy', $logo->id ?? '')); ?>"
                                                        method="POST" class="mt-1">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" onclick="DeleteFunction();"
                                                            class="mr-1 btn-sm btn btn-icon btn-outline facebook btn-rounded-circle"><i class="fa fa-trash"
                                                                style="color: red"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php $__currentLoopData = $favicons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favicon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card-deck col-lg-6">
                                        <div class="card">
                                            <div class="text-left mt-3 m-3">
                                                    <button type="button" class="btn  btn-outline-primary" data-toggle="modal"
                                                        data-target="#exampleModalForm">
                                                        <i class="mdi mdi-star-outline"></i> New Facicon
                                                    </button>
                                                </div>
                                            


                                            <div class="modal fade" id="exampleModalForm" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalFormTitle" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalFormTitle">Add New
                                                                Facicon</h5>
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
                                                            <form action="<?php echo e(route('favicons.store')); ?>"
                                                                id="bannerModalForm" method="post"
                                                                enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="form-group">
                                                                    <label> Upload Favicons</label>
                                                                    <input type="file" class="form-control"
                                                                        name="favicon" id="input">
                                                                        <p class="text-primary small mt-1"></i>Jpg, Jpeg, Png and Gif Files Supported, Max Size 1MB.</p>
                                                                    <div id="bannerNull" class="invalid-feedback"></div>
                                                                    <div id="bannerFill" class="valid-feedback"></div>
                                                                </div>
                                                                <div><label>Status</label></div>
                                                                <div
                                                                    class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                                    <input type="radio" id="customRadio1" name="status"
                                                                        class="custom-control-input" value="1">
                                                                    <label class="custom-control-label"
                                                                        for="customRadio1">Active</label>
                                                                </div>
                                                                <div
                                                                    class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                                    <input type="radio" id="customRadio2" name="status"
                                                                        class="custom-control-input" checked="checked"
                                                                        value="0">
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
                                            <div class="text-center mt-3"><img class="mt-3" width="200px"
                                                    height="100px"
                                                    src="<?php echo e(asset('storage/admin/logo-favicon/favicons/' . ($favicon ? $favicon->name : ''))); ?>"
                                                    alt="Card image cap"></div>
                                            <br><br>
                                            <div class="card-body">
                                                
                                                <p class="card-text pb-3"><i class = "mdi mdi-alert-decagram"
                                                        style="color: #FEC400"></i> jpg
                                                    &
                                                    jpeg files supported.Max Size
                                                    1MB. </p>
                                                <p class="card-text pb-3"><i class = "mdi mdi-alert-decagram"
                                                        style="color: #FEC400"></i>Press
                                                    Control + f5 if favicon not
                                                    reflecting after upload.. </p>
                                                <div class="d-flex justify-content-center mt-3">
                                                    <!-- Wrap all buttons in a div -->
                                                    
                                                    
                                                    <a href="<?php echo e(route('favicons.edit', $favicon->id ?? '')); ?>"
                                                        class="mr-1 btn-sm btn btn-icon btn-outline facebook btn-rounded-circle"><i class="fa fa-edit"></i></a>
                                                    <form action="<?php echo e(route('favicons.destroy', $favicon->id ?? '')); ?>"
                                                        method="POST" class="mt-1">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" onclick="DeleteFunction();"
                                                            class="mr-1 btn-sm btn btn-icon btn-outline facebook btn-rounded-circle"><i class="fa fa-trash"
                                                                style="color: red"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center">
                            <span><?php echo e($logos->links()); ?></span>
                        </div>
                    <?php else: ?>
                        <h3 class="text-center text-danger">No Logo & Favicons Type found</h3>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

    <script>
        document.getElementById("selectAll").addEventListener("change", function() {
            var checkboxes = document.getElementsByClassName("checkbox");
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
                console.log(checkboxes[i]);
            }
        });

        var checkboxes = document.getElementsByClassName("checkbox");
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].addEventListener("change", function() {
                var allChecked = true;
                for (var j = 0; j < checkboxes.length; j++) {
                    console.log(checkboxes[j]);
                    if (!checkboxes[j].checked) {
                        allChecked = false;
                        break;

                    }
                }
                document.getElementById("selectAll").checked = allChecked;
            });
        }
    </script>


    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\logos\index.blade.php ENDPATH**/ ?>