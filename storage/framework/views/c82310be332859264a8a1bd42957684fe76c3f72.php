<?php if($paginator->hasPages()): ?>
    <nav>
        <ul class="list-pagination-1 pagination border border-color-4 rounded-sm overflow-auto overflow-xl-visible justify-content-md-center align-items-center py-2 mb-0">
            
            <?php if($paginator->onFirstPage()): ?>
                <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                    <span class="page-link border-right rounded-0 text-gray-5" aria-label="Previous">
                        <i class="flaticon-left-direction-arrow font-size-10 font-weight-bold"></i>
                        <span class="sr-only"><?php echo app('translator')->get('pagination.previous'); ?></span>
                    </span>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link border-right rounded-0 text-gray-5" href="<?php echo e($paginator->previousPageUrl()); ?>" aria-label="Previous">
                        <i class="flaticon-left-direction-arrow font-size-10 font-weight-bold"></i>
                        <span class="sr-only"><?php echo app('translator')->get('pagination.previous'); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if(is_string($element)): ?>
                    <li class="page-item disabled"><a class="page-link font-size-14" href="#"><?php echo e($element); ?></a></li>
                <?php endif; ?>

                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="page-item active"><a class="page-link font-size-14 active" href="#"><?php echo e($page); ?></a></li>
                        <?php else: ?>
                            <li class="page-item"><a class="page-link font-size-14" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <li class="page-item">
                    <a class="page-link border-left rounded-0 text-gray-5" href="<?php echo e($paginator->nextPageUrl()); ?>" aria-label="Next">
                        <i class="flaticon-right-thin-chevron font-size-10 font-weight-bold"></i>
                        <span class="sr-only"><?php echo app('translator')->get('pagination.next'); ?></span>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                    <a class="page-link border-left rounded-0 text-gray-5" href="#" aria-label="Next">
                        <i class="flaticon-right-thin-chevron font-size-10 font-weight-bold"></i>
                        <span class="sr-only"><?php echo app('translator')->get('pagination.next'); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
<?php /**PATH C:\APPS\htdocs\mytravel\resources\views/vendor/pagination/default.blade.php ENDPATH**/ ?>