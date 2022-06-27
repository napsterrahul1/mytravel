


<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="mb-8">
        <div class="container">
            <div class="row mb-5 mb-md-7 mb-lg-0">
                <div class="col-lg-5 col-xl-3dot5">
                    <div class="space-lg-1 space-xl-3 mt-xl-2 mb-5 mb-md-7 mb-lg-0">
                        <div class="font-weight-bold font-size-xs-160 font-size-lg-120 font-size-200 text-gray-3 text-md-center text-lg-left"><?php echo $__env->yieldContent('code', __('Oh no')); ?></div>
                        <h6 class="font-size-21 font-weight-bold text-gray-3 mb-3 mt-n3 mt-xl-n5 text-center text-lg-left">
                            <?php echo $__env->yieldContent('title'); ?>
                        </h6>
                        <p class="text-gray-1 mb-3 mb-lg-5 pb-lg-1 text-center text-lg-left">
                            <?php echo $__env->yieldContent('message'); ?>
                        </p>
                        <a href="<?php echo e(url('/')); ?>" class="btn btn-primary rounded-xs transition-3d-hover font-weight-bold min-width-190 min-height-60 d-inline-flex flex-content-center">
                            <?php echo e(__("Back to Home")); ?>

                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-8dot5">
                    <div class="space-lg-2 space-xl-3 mt-lg-5 mt-xl-7 mb-xl-4">
                        <img src="<?php echo $__env->yieldContent('image'); ?>" alt="<?php echo $__env->yieldContent('code', __('Oh no')); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\APPS\htdocs\mytravel\resources\views/errors/illustrated-layout.blade.php ENDPATH**/ ?>