<div class="<?php echo e(str_replace('_','-',$bg_gradient)); ?> bg-img-hero space-3 space-top-lg-4 space-bottom-lg-3" <?php if(!empty($bg_image)): ?> style="background-image: url(<?php echo e(get_file_url($bg_image,'full')); ?>);" <?php endif; ?>>
    <div class="text-center mt-xl-2">
        <h5 class="text-white font-size-41 font-weight-bold mb-2"><?php echo e($title ?? ''); ?></h5>
        <h6 class="text-white font-size-21 font-weight-bold mb-3 mb-lg-5 opacity-7"><?php echo e($sub_title ?? ''); ?></h6>
        <?php if(!empty($youtube)): ?>
        <!-- Fancybox -->
        <a class="travel-fancybox d-inline-block u-media-player" href="javascript:;" data-src="<?php echo e(handleVideoUrl($youtube)); ?>" data-speed="700" data-animate-in="zoomIn" data-animate-out="zoomOut" data-caption="MyTravel - Responsive Website Template">
            <span class="u-media-player__icon u-media-player__icon--lg bg-transparent text-white">
                <span class="flaticon-multimedia font-size-60 u-media-player__icon-inner"></span>
            </span>
        </a>
        <!-- End Fancybox -->
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel\modules/Template/Views/frontend/blocks/video-player.blade.php ENDPATH**/ ?>