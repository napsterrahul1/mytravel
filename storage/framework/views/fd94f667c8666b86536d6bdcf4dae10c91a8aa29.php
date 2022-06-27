<?php if(setting_item($row->type."_enable_review")): ?>
    <div class="bravo-reviews">
        <div class="border-bottom py-4">
            <h5 id="scroll-reviews" class="font-size-21 font-weight-bold text-dark mb-4">
                <?php echo e(__("Reviews")); ?>

            </h5>
            <?php if($review_score): ?>
                <div class="row">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="border rounded flex-content-center py-5 border-width-2">
                            <div class="text-center">
                                <h2 class="font-size-50 font-weight-bold text-primary mb-0 text-lh-sm">
                                    <?php echo e($review_score['score_total']); ?><span class="font-size-20">/5</span>
                                </h2>
                                <div class="font-size-25 text-dark mb-3"><?php echo e($review_score['score_text']); ?></div>
                                <div class="text-gray-1"><?php echo e(__("From")); ?>

                                    <?php if($review_score['total_review'] > 1): ?>
                                        <?php echo e(__(":number reviews",["number"=>$review_score['total_review'] ])); ?>

                                    <?php else: ?>
                                        <?php echo e(__(":number review",["number"=>$review_score['total_review'] ])); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <?php if($review_score['rate_score']): ?>
                                <?php $__currentLoopData = $review_score['rate_score']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6 mb-4">
                                        <h6 class="font-weight-normal text-gray-1 mb-1">
                                            <?php echo e($item['title']); ?>

                                        </h6>
                                        <div class="flex-horizontal-center mr-6">
                                            <div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;">
                                                <div class="progress-bar rounded-pill" role="progressbar" style="width: <?php echo e($item['percent']); ?>%;" aria-valuenow="<?php echo e($item['percent']); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="ml-3 text-primary font-weight-bold">
                                                <?php echo e($item['total']); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div id="stickyBlockEndPoint"></div>
        <div class="border-bottom py-4">
            <?php if($review_list->total() > 0): ?>
                <h5 class="font-size-21 font-weight-bold text-dark mb-5 mt-3">
                    <?php echo e(__("Showing :from - :to of :total total",["from"=>$review_list->firstItem(),"to"=>$review_list->lastItem(),"total"=>$review_list->total()])); ?>

                </h5>
            <?php else: ?>
                <h5 class="font-size-21 font-weight-bold text-dark mb-8">
                    <?php echo e(__("No Review")); ?>

                </h5>
            <?php endif; ?>
            <?php if($review_list): ?>
                <?php $__currentLoopData = $review_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $userInfo = $item->author; ?>
                    <div class="media flex-column flex-md-row align-items-center align-items-md-start mb-4">
                        <div class="mr-md-5">
                            <a class="d-block" href="#">
                                <?php if($avatar_url = $userInfo->getAvatarUrl()): ?>
                                    <img class="img-fluid mb-3 mb-md-0 rounded-circle avatar-img" src="<?php echo e($avatar_url); ?>" alt="<?php echo e($userInfo->getDisplayName()); ?>">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="media-body text-center text-md-left">
                            <div class="mb-4">
                                <h6 class="font-weight-bold text-gray-3">
                                    <a href="#"><?php echo e($userInfo->getDisplayName()); ?></a>
                                </h6>
                                <div class="font-weight-normal font-size-14 text-gray-9 mb-2"><?php echo e(display_datetime($item->created_at)); ?></div>
                                <div class="d-flex align-items-center flex-column flex-md-row mb-2">
                                    <?php if($item->rate_number): ?>
                                        <button type="button" class="btn btn-xs btn-primary rounded-xs font-size-14 py-1 px-2 mr-2 mb-2 mb-md-0"><?php echo e($item->rate_number); ?> /5 </button>
                                    <?php endif; ?>
                                    <span class="font-weight-bold font-italic text-gray-3"><?php echo e($item->title); ?></span>
                                </div>
                                <p class="text-lh-1dot6 mb-0 pr-lg-5"><?php echo e($item->content); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <?php if($review_list->total() > 0): ?>
                <div class="bravo-pagination">
                    <?php echo e($review_list->appends(request()->query())->fragment('review-list')->links()); ?>

                </div>
            <?php endif; ?>
        </div>
        <div class="py-4">
            <?php if($row->check_enable_review_after_booking() and Auth::id()): ?>
                <h5 class="font-size-21 font-weight-bold text-dark mb-6">
                    <?php echo e(__("Write a review")); ?>

                </h5>
                <div class="form-wrapper">

                    <form action="<?php echo e(route('review.store')); ?>" class="needs-validation sfeedbacks_form" novalidate method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-5 mb-lg-0">
                            <div class="col-sm-12">
                                <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <?php if($tour_review_stats = setting_item($row->type."_review_stats")): ?>
                                        <?php $tour_review_stats = json_decode($tour_review_stats) ?>
                                        <?php $__currentLoopData = $tour_review_stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-4 mb-6">
                                                <h6 class="font-weight-bold text-dark mb-1">
                                                    <?php echo e($item->title); ?>

                                                </h6>
                                                <input class="review_stats" type="hidden" name="review_stats[<?php echo e($item->title); ?>]">
                                                <span class="font-size-20 letter-spacing-3 sspd_review">
                                                    <small class="fa fa-smile-o font-weight-normal"></small>
                                                    <small class="fa fa-smile-o font-weight-normal"></small>
                                                    <small class="fa fa-smile-o font-weight-normal"></small>
                                                    <small class="fa fa-smile-o font-weight-normal"></small>
                                                    <small class="fa fa-smile-o font-weight-normal"></small>
                                                </span>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="col-md-4 mb-6">
                                            <h6 class="font-weight-bold text-dark mb-1">
                                                <?php echo e(__("Review rate")); ?>

                                            </h6>
                                            <input class="review_stats" type="hidden" name="review_rate">
                                            <span class="font-size-20 letter-spacing-3 sspd_review">
                                                <small class="fa fa-smile-o font-weight-normal"></small>
                                                <small class="fa fa-smile-o font-weight-normal"></small>
                                                <small class="fa fa-smile-o font-weight-normal"></small>
                                                <small class="fa fa-smile-o font-weight-normal"></small>
                                                <small class="fa fa-smile-o font-weight-normal"></small>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-5">
                                <div class="js-form-message">
                                    <input type="text" class="form-control" name="review_title" placeholder="<?php echo e(__("Title")); ?>" required data-error-class="u-has-error" data-msg="<?php echo e(__('Review title is required')); ?>" data-success-class="u-has-success">
                                    <div class="invalid-feedback"><?php echo e(__('Review title is required')); ?></div>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-5">
                                <div class="js-form-message">
                                    <div class="input-group">
                                        <textarea class="form-control" rows="6" cols="77" name="review_content" placeholder="<?php echo e(__("Review content")); ?>" required data-msg="<?php echo e(__('Review content has at least 10 character')); ?>" data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
                                        <div class="invalid-feedback"><?php echo e(__('Review content has at least 10 character')); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-center justify-content-lg-start">
                                <button type="submit" id="submit" name="submit" class="btn rounded-xs bg-blue-dark-1 text-white p-2 height-51 width-190 transition-3d-hover"><?php echo e(__("Leave a Review")); ?></button>
                                <input type="hidden" name="review_service_id" value="<?php echo e($row->id); ?>">
                                <input type="hidden" name="review_service_type" value="<?php echo e($row->type); ?>">
                            </div>
                        </div>

                    </form>
                </div>
            <?php endif; ?>
            <?php if(!Auth::id()): ?>
                <div class="review-message">
                    <?php echo __("You must <a href='#login' data-toggle='modal' data-target='#login'>log in</a> to write review"); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mytravel\modules/Review/Views/frontend/form.blade.php ENDPATH**/ ?>