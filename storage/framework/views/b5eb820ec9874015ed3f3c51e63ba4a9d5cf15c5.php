<div class="bravo-list-space product-card-block product-card-v2 border-bottom border-color-8">
    <div class="container space-1">
        <?php if(!empty($title)): ?>
            <div class="d-flex justify-content-between mb-3 pt-md-3 mt-1 pb-md-3 mb-md-2 align-items-end">
                <div class="font-weight-bold font-size-xs-20 font-size-30 mb-0 text-lh-sm">
                    <?php echo e($title); ?>

                    <small class="font-size-xs-14 font-size-14 mb-0 text-lh-sm d-block mt-1">
                        <?php echo e($desc); ?>

                    </small>
                </div>
                <a href="<?php echo e(route("space.search")); ?>" class="font-weight-bold d-flex text-lh-1 mb-md-2 ml-2"><?php echo e(__("More")); ?>

                    <i class="flaticon-right-arrow ml-2"></i>
                </a>
            </div>
        <?php endif; ?>
        <div class="row">
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-<?php echo e($col ?? 3); ?> col-xl-<?php echo e($col ?? 3); ?> mb-3 mb-md-4 pb-1">
                    <?php echo $__env->make('Space::frontend.layouts.search.loop-grid', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\mytravel\modules/Space/Views/frontend/blocks/list-space/style_1.blade.php ENDPATH**/ ?>