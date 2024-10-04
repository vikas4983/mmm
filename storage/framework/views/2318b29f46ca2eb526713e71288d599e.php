
<?php $__env->startSection('title', 'Success Stories | Admin'); ?>
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
                            <li class="breadcrumb-item active" aria-current="page">Success Story</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card card-default">
                <div class="card-header">

                    <?php if(count($successStories) > 0): ?>
                        <table class="table table-striped" id="successStories" class="display nowrap" width="100%">
                            <thead>
                            </thead>
                            <tbody>
                                <a href="<?php echo e(route('successStories.create')); ?>">
                                    <button type="submit" class="mb-3 btn-lg btn-outline-primary"><i class="mdi mdi-star-outline"></i> New Success Story
                                </button>
                                </a>

                </div>
            </div>
        </div>

        <div class="row">
            <?php $__currentLoopData = $successStories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $successStory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="container">
                            <div>
                                <h3 style="color:#9E6DE0"><?php echo e($successStory->groom_name ?? ''); ?> &
                                    <?php echo e($successStory->bride_name ?? ''); ?></h3>
                            </div>
                            <div> <i class="mdi mdi-calendar-heart"></i> <?php echo e($successStory->wedding_date ?? ''); ?></div>
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
                            alt="Success Story Image" >
                        <div class="card-body"> <!-- Apply text-center class here -->
                            
                            <p class="card-text pb-3"> <?php echo e($successStory->description ?? ''); ?>

                            <p>

                            <div class="d-flex justify-content-center">
                                <a href="<?php echo e(route('successStories.edit', $successStory->id)); ?>"
                                    class="mr-1 mt-5 btn-sm btn btn-icon btn-outline facebook btn-rounded-circle"><i
                                        class="fa fa-edit"></i></a>
                                <form action="<?php echo e(route('successStories.destroy', $successStory->id)); ?>" method="POST"
                                    class="mt-1">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" onclick="DeleteFunction();"
                                        class="mr-1 mt-5 btn-sm btn btn-icon btn-outline facebook btn-rounded-circle"><i
                                            class="fa fa-trash" style="color: red"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        </tbody>

        </table>
        <div class="d-flex justify-content-center">
            <span><?php echo e($successStories->links()); ?></span>
        </div>
    <?php else: ?>
        <h3 class="text-center text-danger">No Success Stories found</h3>
        <?php endif; ?>
    </div>
    </div>

    </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\successStories\index.blade.php ENDPATH**/ ?>