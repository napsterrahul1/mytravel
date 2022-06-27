<?php if($translation->faqs): ?>
    <div class="border-bottom py-4">
        <h5 class="font-size-21 font-weight-bold text-dark mb-4">
            <?php echo e(__("FAQs")); ?>

        </h5>
        <div id="FAQs">
            <?php $__currentLoopData = $translation->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card border-0 mb-4 pb-1">
                    <div class="card-header border-bottom-0 p-0" >
                        <h5 class="mb-0">
                            <button type="button" class="collapse-link btn btn-link btn-block d-flex align-items-md-center p-0" data-toggle="collapse" data-target="#FAQs_<?php echo e($key); ?>" <?php if($key == 0 ): ?> aria-expanded="true" <?php else: ?> aria-expanded="false" <?php endif; ?> aria-controls="FAQs_<?php echo e($key); ?>">
                                <div class="border border-color-8 rounded-xs border-width-2 p-2 mb-3 mb-md-0 mr-4">
                                    <figure id="rectangle" class="minus">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="2px" class="injected-svg js-svg-injector mb-0" data-parent="#rectangle">
                                            <path fill-rule="evenodd" fill="rgb(59, 68, 79)" d="M-0.000,-0.000 L15.000,-0.000 L15.000,2.000 L-0.000,2.000 L-0.000,-0.000 Z"></path>
                                        </svg>
                                    </figure>
                                    <figure id="plus1" class="plus">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" class="injected-svg js-svg-injector mb-0" data-parent="#plus1">
                                            <path fill-rule="evenodd" fill="rgb(59, 68, 79)" d="M16.000,9.000 L9.000,9.000 L9.000,16.000 L7.000,16.000 L7.000,9.000 L-0.000,9.000 L-0.000,7.000 L7.000,7.000 L7.000,-0.000 L9.000,-0.000 L9.000,7.000 L16.000,7.000 L16.000,9.000 Z"></path>
                                        </svg>
                                    </figure>
                                </div>
                                <h6 class="font-weight-bold text-gray-3 mb-0"><?php echo e($item['title']); ?></h6>
                            </button>
                        </h5>
                    </div>
                    <div id="FAQs_<?php echo e($key); ?>" class="collapse <?php if($key == 0 ): ?> show <?php endif; ?>" data-parent="#FAQs">
                        <div class="card-body">
                            <p class="mb-0 text-gray-1 text-lh-lg">
                                <?php echo clean($item['content']); ?>

                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\APPS\htdocs\mytravel\modules/Tour/Views/frontend/layouts/details/tour-faqs.blade.php ENDPATH**/ ?>