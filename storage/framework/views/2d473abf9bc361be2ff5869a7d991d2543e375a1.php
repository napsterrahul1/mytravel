<?php $booking_why_book_with_us = setting_item_array('booking_why_book_with_us',[]); ?>
<?php if(!empty($booking_why_book_with_us)): ?>
    <div class="border border-color-7 rounded p-4 mb-5 mt-5">
        <h6 class="font-size-17 font-weight-bold text-gray-3 mx-1 mb-3 pb-1">
            <?php echo e(__("Why Book With Us?")); ?>

        </h6>
        <?php $__currentLoopData = $booking_why_book_with_us; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex align-items-center mt-3">
                <i class="<?php echo e($item['icon'] ?? ""); ?> font-size-25 text-primary mr-3 pr-1"></i>
                <h6 class="mb-0 font-size-14 text-gray-1">
                    <a href="<?php echo e($item['link'] ?? ""); ?>"><?php echo e($item['title'] ?? ""); ?></a>
                </h6>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mytravel\modules/Booking/Views/frontend/booking/booking-why-book-us.blade.php ENDPATH**/ ?>