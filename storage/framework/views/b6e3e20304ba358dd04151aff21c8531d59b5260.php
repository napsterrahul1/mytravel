<?php
    /**
    * @var $row \Modules\Location\Models\Location
    * @var $to_location_detail bool
    * @var $service_type string
    */
    $translation = $row->translateOrOrigin(app()->getLocale());
    $link_location = false;
    if(is_string($service_type)){
        $link_location = $row->getLinkForPageSearch($service_type);
    }
?>

<div class="<?php echo e($min_height ?? 'min-height-350'); ?> bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient transition-3d-hover shadow-hover-2 border-0 dropdown"
     style="background-image: url(<?php echo e($row->getImageUrl()); ?>);cursor:pointer" onclick="location.href='<?php echo e($row->getDetailUrl()); ?>'">
    <div class="w-100 d-flex justify-content-between mb-2">
        <div class="position-relative">
            <a href="<?php echo e($row->getDetailUrl()); ?>" class="destination text-white font-weight-bold font-size-21 pb-3 mb-3 text-lh-1 d-block">
                <?php echo e($translation->name); ?>

            </a>
            <div class="destination-dropdown v1">
                <?php if(is_array($service_type)): ?>
                    <div class="desc">
                        <?php $__currentLoopData = $service_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $count = $row->getDisplayNumberServiceInLocation($type) ?>
                            <?php if(!empty($count)): ?>
                                <?php if(empty($link_location)): ?>
                                    <a class="dropdown-item" href="<?php echo e($row->getLinkForPageSearch( $type )); ?>" target="_blank">
                                        <?php echo e($count); ?>

                                    </a>
                                <?php else: ?>
                                    <span><?php echo e($count); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <?php if(!empty($text_service = $row->getDisplayNumberServiceInLocation($service_type))): ?>
                        <a href="#"><?php echo e($text_service); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php /**PATH C:\xampp\htdocs\mytravel\modules/Location/Views/frontend/blocks/list-locations/loop.blade.php ENDPATH**/ ?>