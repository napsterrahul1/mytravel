<div class="bravo-list-locations destinantion-block destinantion-v1 border-bottom border-color-8 mt-6">
    <div class="container space-bottom-1">
        <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mt-4">
            <h2 class="section-title text-black font-size-30 font-weight-bold mb-0"><?php echo e($title); ?></h2>
        </div>
        <div class="row mb-1">
            <?php if(!empty($rows)): ?>
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $class = "col-md-6 col-xl-3 mb-3 mb-md-4";
                            if($key == 0){
                                $class = "col-md-6 mb-3 mb-md-4";
                            }
                    ?>
                    <div class="<?php echo e($class); ?>">
                        <?php echo $__env->make('Location::frontend.blocks.list-locations.loop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\APPS\htdocs\mytravel\modules/Location/Views/frontend/blocks/list-locations/style_3.blade.php ENDPATH**/ ?>