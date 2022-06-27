<?php if(!empty($translation->specs)): ?>
    <div class="g-specs">
        <h3> <?php echo e(__("Specs & Details")); ?> </h3>
        <div class="list-item">
            <?php $__currentLoopData = $translation->specs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <div class="text">
                        <i class="fa fa-dot-circle-o" aria-hidden="true"></i> <?php echo e($item['title']); ?>: <strong><?php echo e($item['content']); ?></strong>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\APPS\htdocs\mytravel\modules/Boat/Views/frontend/layouts/details/specs.blade.php ENDPATH**/ ?>