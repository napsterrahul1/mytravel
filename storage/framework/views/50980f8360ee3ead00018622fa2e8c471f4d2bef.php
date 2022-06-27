<?php if(count($tour_related) > 0): ?>
    <div class="bravo-list-tour-related product-card-carousel-block product-card-carousel-v5">
        <div class="space-1">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mt-3">
                <h2 class="section-title text-black font-size-30 font-weight-bold mb-0"><?php echo e(__("You might also like...")); ?></h2>
            </div>
            <div class="travel-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3"
                 data-slides-show="4"
                 data-slides-scroll="1"
                 data-arrows-classes="d-none d-xl-inline-block u-slick__arrow-classic v1 u-slick__arrow-classic--v1 u-slick__arrow-centered--y rounded-circle"
                 data-arrow-left-classes="fa fa-chevron-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left shadow-5"
                 data-arrow-right-classes="fa fa-chevron-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right shadow-5"
                 data-pagi-classes="text-center d-xl-none u-slick__pagination mt-4"
                 data-responsive='[{
                            "breakpoint": 1025,
                            "settings": {
                            "slidesToShow": 3
                            }
                            }, {
                            "breakpoint": 992,
                            "settings": {
                            "slidesToShow": 2
                            }
                            }, {
                            "breakpoint": 768,
                            "settings": {
                            "slidesToShow": 1
                            }
                            }, {
                            "breakpoint": 554,
                            "settings": {
                            "slidesToShow": 1
                            }
                            }]'>
                <?php $__currentLoopData = $tour_related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $translation = $item->translateOrOrigin(app()->getLocale());
                    ?>
                    <div class="js-slide mt-5">
                        <div class="card transition-3d-hover shadow-hover-2 w-100 h-100">
                            <div class="position-relative">
                                <a href="<?php echo e($item->getDetailUrl()); ?>" class="d-block gradient-overlay-half-bg-gradient-v5">
                                    <img class="card-img-top" src="<?php echo e($item->image_url); ?>" alt="<?php echo clean($translation->title); ?>">
                                </a>
                                <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                    <button type="button" class="p-0 btn btn-sm btn-icon text-white rounded-circle service-wishlist <?php echo e($item->isWishList()); ?>" data-id="<?php echo e($item->id); ?>" data-type="<?php echo e($item->type); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__("Save for later")); ?>">
                                        <span class="flaticon-valentine-heart font-size-20"></span>
                                    </button>
                                </div>
                                <div class="position-absolute bottom-0 left-0 right-0">
                                    <div class="px-4 pb-3">
                                        <?php if(!empty($item->location->name)): ?>
                                            <?php $location =  $item->location->translateOrOrigin(app()->getLocale()) ?>
                                            <a href="<?php echo e($item->getDetailUrl()); ?>" class="d-block">
                                                <div class="d-flex align-items-center font-size-14 text-white">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> <?php echo e($location->name ?? ''); ?>

                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-4 py-3">
                                <a href="<?php echo e($item->getDetailUrl()); ?>" class="card-title font-size-17 font-weight-medium text-dark">
                                    <?php echo clean($translation->title); ?>

                                </a>
                                <?php if(setting_item('tour_enable_review')): ?>
                                    <?php
                                    $reviewData = $item->getScoreReview();
                                    ?>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-warning text-white py-1 px-2 font-size-14 border-radius-3 font-weight-normal">4.6/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">
                                            <?php if($reviewData['total_review'] > 1): ?>
                                                <?php echo e(__("(:number Reviews)",["number"=>$reviewData['total_review'] ])); ?>

                                            <?php else: ?>
                                                <?php echo e(__("(:number Review)",["number"=>$reviewData['total_review'] ])); ?>

                                            <?php endif; ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                                <div class="mb-0">
                                    <span class="mr-1 font-size-14 text-gray-1"><?php echo e(__("From")); ?></span>
                                    <span class="font-weight-bold"><?php echo e($item->display_sale_price); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\mytravel\modules/Tour/Views/frontend/layouts/details/tour-related.blade.php ENDPATH**/ ?>