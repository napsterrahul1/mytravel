<div class="<?php echo e((!empty($bg_gradient)) ? str_replace('_','-',$bg_gradient) : ''); ?> bravo-call-to-action banner-block banner-v1 bg-img-hero space-3 <?php echo e($style); ?>" <?php if(!empty($bg_image_url)): ?> style="background-image: url(<?php echo e($bg_image_url ?? ""); ?>) !important;" <?php endif; ?>>
    <div class="container">
        <div class="mx-auto text-center mt-xl-5 mb-xl-2 px-3 px-md-0">
            <h6 class="text-white font-size-40 font-weight-bold mb-1"><?php echo e($title); ?></h6>
            <p class="text-white font-size-18 font-weight-normal mb-4 pb-1 px-md-3 px-lg-0">
                <?php echo e($sub_title); ?>

            </p>
            <?php if($link_title): ?>
                <a class="btn btn-outline-white border-width-2 rounded-xs min-width-200 font-weight-normal transition-3d-hover" href="<?php echo e($link_more); ?>">
                    <?php echo e($link_title); ?>

                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel\modules/Template/Views/frontend/blocks/call-to-action/style_1.blade.php ENDPATH**/ ?>