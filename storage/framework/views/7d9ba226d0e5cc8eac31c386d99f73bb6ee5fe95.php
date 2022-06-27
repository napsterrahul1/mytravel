<div class="position-relative">
    <div class="row">
        <?php if($translation->include): ?>
            <div class="col-md-6 mb-4">
                <div class="font-weight-bold text-dark mb-3"><?php echo e(__("Price Includes")); ?></div>
                <?php $__currentLoopData = $translation->include; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex-horizontal-center mb-3 text-gray-1">
                        <i class="flaticon-tick mr-3 font-size-16 text-primary"></i>
                        <?php echo e($item['title']); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <?php if($translation->exclude): ?>
            <div class="col-md-6 mb-4">
                <div class="font-weight-bold text-dark mb-3"><?php echo e(__("Price Excludes")); ?></div>
                <?php $__currentLoopData = $translation->exclude; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex-horizontal-center mb-3 text-gray-1">
                        <i class="flaticon-close mr-3 font-size-16 text-danger"></i>
                        <?php echo e($item['title']); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\xampp\htdocs\mytravel\modules/Tour/Views/frontend/layouts/details/tour-include-exclude.blade.php ENDPATH**/ ?>