<div class="pt-4 pb-5 px-5 border-bottom booking-review">
    <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-2">
        <?php echo e(__("Your Information")); ?>

    </h5>
    <!-- Fact List -->
    <ul class="list-unstyled font-size-1 mb-0 font-size-16">
        <li class="info-first-name d-flex justify-content-between py-2">
            <div class="label"><?php echo e(__('First name')); ?></div>
            <div class="val"><?php echo e($booking->first_name); ?></div>
        </li>
        <li class="info-last-name d-flex justify-content-between py-2">
            <div class="label"><?php echo e(__('Last name')); ?></div>
            <div class="val"><?php echo e($booking->last_name); ?></div>
        </li>
        <li class="info-email d-flex justify-content-between py-2">
            <div class="label"><?php echo e(__('Email')); ?></div>
            <div class="val"><?php echo e($booking->email); ?></div>
        </li>
        <li class="info-phone d-flex justify-content-between py-2">
            <div class="label"><?php echo e(__('Phone')); ?></div>
            <div class="val"><?php echo e($booking->phone); ?></div>
        </li>
        <li class="info-address d-flex justify-content-between py-2">
            <div class="label"><?php echo e(__('Address line 1')); ?></div>
            <div class="val"><?php echo e($booking->address); ?></div>
        </li>
        <li class="info-address2 d-flex justify-content-between py-2">
            <div class="label"><?php echo e(__('Address line 2')); ?></div>
            <div class="val"><?php echo e($booking->address2); ?></div>
        </li>
        <li class="info-city d-flex justify-content-between py-2">
            <div class="label"><?php echo e(__('City')); ?></div>
            <div class="val"><?php echo e($booking->city); ?></div>
        </li>
        <li class="info-state d-flex justify-content-between py-2">
            <div class="label"><?php echo e(__('State/Province/Region')); ?></div>
            <div class="val"><?php echo e($booking->state); ?></div>
        </li>
        <li class="info-zip-code d-flex justify-content-between py-2">
            <div class="label"><?php echo e(__('ZIP code/Postal code')); ?></div>
            <div class="val"><?php echo e($booking->zip_code); ?></div>
        </li>
        <li class="info-country d-flex justify-content-between py-2">
            <div class="label"><?php echo e(__('Country')); ?></div>
            <div class="val"><?php echo e(get_country_name($booking->country)); ?></div>
        </li>
        <li class="info-notes d-flex justify-content-between py-2">
            <div class="label"><?php echo e(__('Special Requirements')); ?></div>
            <div class="val"><?php echo e($booking->customer_notes); ?></div>
        </li>
    </ul>
    <!-- End Fact List -->
</div><?php /**PATH C:\xampp\htdocs\mytravel\modules/Booking/Views/frontend/booking/booking-customer-info.blade.php ENDPATH**/ ?>