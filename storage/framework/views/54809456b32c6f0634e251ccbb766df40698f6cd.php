<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>
<div class="card transition-3d-hover shadow-hover-2 mt-2 item-loop <?php echo e($wrap_class ?? ''); ?>">
    <div class="position-relative">
        <a href="<?php echo e($row->getDetailUrl(false)); ?>" class="d-block gradient-overlay-half-bg-gradient-v5">
            <?php if($row->image_url): ?>
                <?php if(!empty($disable_lazyload)): ?>
                    <img class="card-img-top" src="<?php echo e($row->image_url); ?>" alt="<?php echo e($translation->title); ?>">
                <?php else: ?>
                    <?php echo get_image_tag($row->image_id,'thumb',['class'=>'img-responsive card-img-top','alt'=>$translation->title]); ?>

                <?php endif; ?>
            <?php endif; ?>
        </a>
        <div class="position-absolute top-0 right-0 pt-3 pr-3">
            <button type="button" class="btn btn-sm btn-icon text-white rounded-circle"  data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('Save for later')); ?>">
                <span class="service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
                    <span class="flaticon-heart-1 font-size-20"></span>
                </span>
            </button>
        </div>
        <?php if($translation->address): ?>
            <div class="position-absolute bottom-0 left-0 right-0">
                <div class="px-4 pb-3">
                    <a href="<?php echo e($row->getDetailUrl(false)); ?>" class="d-block">
                        <div class="d-flex align-items-center font-size-14 text-white">
                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i> <?php echo e($translation->address); ?>

                        </div>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="card-body px-4 pt-2 pb-3">
        <?php if($row->star_rate): ?>
            <div class="mb-2 hotel-star">
                <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                    <div class="green-lighter">
                        <?php for($star = 1 ;$star <= $row->star_rate ; $star++): ?>
                            <small class="fa fa-star"></small>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <a href="<?php echo e($row->getDetailUrl(false)); ?>" class="card-title font-size-17 font-weight-medium text-dark"><?php echo e($translation->title); ?></a>
            <?php if(setting_item('hotel_enable_review')): ?>
            <?php
                $reviewData = $row->getScoreReview();
            ?>
            <?php if($reviewData): ?>
                <div class="mt-2 mb-3">
                    <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal"><?php echo e($reviewData['score_total']); ?>/5</span>
                    <span class="font-size-14 text-gray-1 ml-2">(
                        <?php if($reviewData['total_review'] > 1): ?>
                            <?php echo e(__(":number reviews",["number"=>$reviewData['total_review'] ])); ?>

                        <?php else: ?>
                            <?php echo e(__(":number review",["number"=>$reviewData['total_review'] ])); ?>

                        <?php endif; ?> )
                    </span>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="mb-0">
            <span class="mr-1 font-size-14 text-gray-1"><?php echo e(__("From")); ?></span>
            <span class="font-weight-bold"><?php echo e($row->display_price); ?></span>
            <span class="font-size-14 text-gray-1"><?php echo e(__("/night")); ?></span>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel\modules/Hotel/Views/frontend/layouts/search/loop-grid.blade.php ENDPATH**/ ?>