<div class="d-block d-md-flex flex-center-between align-items-start mb-3">
    <div class="mb-1">
        <div class="mb-2 mb-md-0">
            <h1 class="font-size-23 font-weight-bold mb-1 mr-3"><?php echo clean($translation->title); ?></h1>
        </div>
        <div class="d-block d-xl-flex flex-horizontal-center">
            <div class="d-block d-md-flex flex-horizontal-center font-size-14 text-gray-1 mb-2 mb-xl-0">
                <?php if($translation->address): ?>
                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> <?php echo e($translation->address); ?>

                <?php endif; ?>
                <?php if($row->map_lat && $row->map_lng): ?>
                    <a target="_blank" href="https://www.google.com/maps/place/<?php echo e($row->map_lat); ?>,<?php echo e($row->map_lng); ?>/@<?php echo $row->map_lat ?>,<?php echo e($row->map_lng); ?>,<?php echo e(!empty($row->map_zoom) ? $row->map_zoom : 12); ?>z" class="ml-1 d-block d-md-inline">
                        - <?php echo e(__('View on map')); ?>

                    </a>
                <?php endif; ?>
            </div>
            <?php if(setting_item('tour_enable_review')): ?>
                <?php
                $reviewData = $row->getScoreReview();
                $score_total = $reviewData['score_total'];
                ?>
                <div class="ml-2 service-review review-<?php echo e($score_total); ?>">
                    <div class="d-inline-flex align-items-center font-size-17 text-lh-1 text-primary">
                        <div class="list-star green-lighter mr-2">
                            <ul class="booking-item-rating-stars">
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            <div class="booking-item-rating-stars-active" style="width: <?php echo e($score_total * 2 * 10 ?? 0); ?>%">
                                <ul class="booking-item-rating-stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <span class="text-secondary font-size-14 mt-1">
                        <?php if($reviewData['total_review'] > 1): ?>
                                <?php echo e(__(":number Reviews",["number"=>$reviewData['total_review'] ])); ?>

                            <?php else: ?>
                                <?php echo e(__(":number Review",["number"=>$reviewData['total_review'] ])); ?>

                            <?php endif; ?>
                    </span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <ul class="list-group list-group-horizontal custom-social-share">
        <li class="list-group-item px-1 border-0">
            <span class="height-45 width-45 border rounded border-width-2 flex-content-center service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
                <i class="flaticon-like font-size-18 text-dark"></i>
            </span>
        </li>
        <li class="list-group-item px-1 border-0">
            <a id="shareDropdownInvoker<?php echo e($row->id); ?>"
               class="dropdown-nav-link dropdown-toggle d-flex height-45 width-45 border rounded border-width-2 flex-content-center"
               href="javascript:;" role="button" aria-controls="shareDropdown<?php echo e($row->id); ?>" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover"
               data-unfold-target="#shareDropdown<?php echo e($row->id); ?>" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                <i class="flaticon-share font-size-18 text-dark"></i>
            </a>
            <div id="shareDropdown<?php echo e($row->id); ?>" class="dropdown-menu dropdown-unfold dropdown-menu-right mt-0 px-3 min-width-3" aria-labelledby="shareDropdownInvoker<?php echo e($row->id); ?>">
                <a class="btn btn-icon btn-pill btn-bg-transparent transition-3d-hover  btn-xs btn-soft-dark  facebook mb-3" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" rel="noopener" original-title="<?php echo e(__("Facebook")); ?>">
                    <span class="font-size-15 fa fa-facebook-f btn-icon__inner"></span>
                </a>
                <br/>
                <a class="btn btn-icon btn-pill btn-bg-transparent transition-3d-hover  btn-xs btn-soft-dark  twitter" href="https://twitter.com/share?url=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" rel="noopener" original-title="<?php echo e(__("Twitter")); ?>">
                    <span class="font-size-15 fa fa-twitter btn-icon__inner"></span>
                </a>
            </div>
        </li>
    </ul>
</div>
<div class="py-4 border-top border-bottom mb-4">
    <ul class="list-group list-group-borderless list-group-horizontal row">
        <?php if($row->duration): ?>
            <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2 border-0">
                <i class="flaticon-alarm text-primary font-size-22 mr-2 d-block"></i>
                <div class="ml-1 text-gray-1"> <?php echo e(duration_format($row->duration,true)); ?></div>
            </li>
        <?php endif; ?>
        <?php if($row->duration): ?>
            <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2 border-0">
                <i class="flaticon-social text-primary font-size-22 mr-2 d-block"></i>
                <div class="ml-1 text-gray-1"><?php echo e(__("Max People")); ?> : <?php echo e($row->max_people); ?></div>
            </li>
        <?php endif; ?>
        <?php if($row->wifi_available): ?>
            <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2 border-0">
                <i class="flaticon-wifi-signal text-primary font-size-22 mr-2 d-block"></i>
                <div class="ml-1 text-gray-1"><?php echo e(__("Wifi Available")); ?></div>
            </li>
        <?php endif; ?>
        <?php if($row->date_form_to): ?>
            <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2 border-0">
                <i class="flaticon-month text-primary font-size-22 mr-2 d-block"></i>
                <div class="ml-1 text-gray-1"><?php echo e($row->date_form_to); ?></div>
            </li>
        <?php endif; ?>
        <?php if($row->min_age): ?>
            <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2 border-0">
                <i class="flaticon-user-2 text-primary font-size-22 mr-2 d-block"></i>
                <div class="ml-1 text-gray-1"><?php echo e(__('Min Age:')); ?> <?php echo e($row->min_age); ?></div>
            </li>
        <?php endif; ?>
        <?php if($row->pickup): ?>
            <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2 border-0">
                <i class="flaticon-pin text-primary font-size-22 mr-2 d-block"></i>
                <div class="ml-1 text-gray-1"><?php echo e(__("Pickup:")); ?> <?php echo e(__("$row->pickup")); ?></div>
            </li>
        <?php endif; ?>
    </ul>
</div>
<div class="position-relative">
    <h5 class="font-size-21 font-weight-bold text-dark mb-3">
        <?php echo e(__("Description")); ?>

    </h5>
    <div class="description">
        <?php echo $translation->content ?>
    </div>
</div>
<?php echo $__env->make('Tour::frontend.layouts.details.tour-include-exclude', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Tour::frontend.layouts.details.tour-attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Tour::frontend.layouts.details.tour-itinerary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($row->map_lat && $row->map_lng): ?>
    <div class="border-bottom py-4">
        <h5 class="font-size-21 font-weight-bold text-dark mb-4">
            <?php echo e(__("Location")); ?>

        </h5>
        <div class="location-map">
            <div id="map_content"></div>
        </div>
    </div>
<?php endif; ?>
<?php echo $__env->make('Tour::frontend.layouts.details.tour-faqs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if ($__env->exists("Hotel::frontend.layouts.details.hotel-surrounding")) echo $__env->make("Hotel::frontend.layouts.details.hotel-surrounding", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php /**PATH C:\xampp\htdocs\mytravel\modules/Tour/Views/frontend/layouts/details/tour-detail.blade.php ENDPATH**/ ?>