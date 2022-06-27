<?php if($list_item): ?>
    <div class="bravo-featured-item <?php echo e($style ?? ''); ?> <?php if(empty($border_none)): ?> border-bottom <?php endif; ?>">
        <div class="container text-center space-1">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto pb-1 pt-3">
                <h2 class="section-title text-black font-size-30 font-weight-bold"><?php echo e($title ?? ''); ?></h2>
            </div>
            <div class="row">
                <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <i class="<?php echo e($item['icon']); ?> text-primary font-size-80 mb-3"></i>
                        <h5 class="font-size-17 text-dark font-weight-bold mb-2">
                            <a href="<?php echo e($item['link'] ?? '#'); ?>"><?php echo e($item['title'] ?? ''); ?></a></h5>
                        <p class="text-gray-1 px-xl-2 px-uw-7"><?php echo e($item['sub_title'] ?? ''); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mytravel\modules/Template/Views/frontend/blocks/list-featured-item/style_2.blade.php ENDPATH**/ ?>