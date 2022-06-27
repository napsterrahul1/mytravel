<div class="list-brands">
    <div class="container space-1">
        <div class="row justify-content-between pb-lg-1 text-center text-md-left">
            <?php if(!empty($list_item)): ?>
                <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-md mb-5">
                        <img class="img-fluid" src="<?php echo e(get_file_url($item['image_id'],'full')); ?>" alt="Image Description">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\APPS\htdocs\ALL\mytravel\modules/Template/Views/frontend/blocks/brands-list/index.blade.php ENDPATH**/ ?>