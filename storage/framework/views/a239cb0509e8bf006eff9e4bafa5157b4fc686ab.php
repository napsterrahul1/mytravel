<?php if($list_item): ?>
    <div class="bravo-featured-item <?php echo e($style ?? ''); ?>">
        <div class="container text-center space-top-lg-2">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto pb-1 pt-5 pb-md-6">
                <h2 class="section-title text-black font-size-30 font-weight-bold"><?php echo e($title ?? ""); ?></h2>
            </div>
            <div class="mb-6">
                <div class="row">
                    <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $image_url = get_file_url($item['icon_image'], 'full') ?>
                        <div class="col-lg-4 pb-4 pb-lg-0">
                            <img class="img-fluid pb-5" src="<?php echo e($image_url); ?>" alt="<?php echo e($item['title']); ?>">
                            <div class="text-lg-left  w-lg-80 mx-auto">
                                <h5 class="font-size-21 text-dark font-weight-bold mb-2">
                                    <a href="<?php echo e($item['link'] ?? '#'); ?>">
                                        <?php echo e($item['title']); ?>

                                    </a>
                                </h5>
                                <p class="text-gray-1">
                                    <?php echo clean($item['sub_title']); ?>

                                </p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mytravel\modules/Template/Views/frontend/blocks/list-featured-item/style_1.blade.php ENDPATH**/ ?>