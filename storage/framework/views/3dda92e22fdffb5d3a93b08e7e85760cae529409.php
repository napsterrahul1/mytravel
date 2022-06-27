<div class="b-panel">
    <div class="b-panel-title"><?php echo e(__('Customer information')); ?></div>
    <div class="b-table-wrap">
        <div class="b-table b-table-div">
            <div class="info-first-name b-tr">
                <div class="label"><?php echo e(__('First name')); ?></div>
                <div class="val"><?php echo e($booking->first_name); ?></div>
            </div>
            <div class="info-last-name b-tr" style="clear: both">
                <div class="label"><?php echo e(__('Last name')); ?></div>
                <div class="val"><?php echo e($booking->last_name); ?></div>
            </div>
            <div class="info-email b-tr">
                <div class="label"><?php echo e(__('Email')); ?></div>
                <div class="val"><?php echo e($booking->email); ?></div>
            </div>
            <div class="info-phone b-tr">
                <div class="label"><?php echo e(__('Phone')); ?></div>
                <div class="val"><?php echo e($booking->phone); ?></div>
            </div>
            <div class="info-address b-tr">
                <div class="label"><?php echo e(__('Address line 1')); ?></div>
                <div class="val"><?php echo e($booking->address); ?></div>
            </div>
            <div class="info-address2 b-tr">
                <div class="label"><?php echo e(__('Address line 2')); ?></div>
                <div class="val"><?php echo e($booking->address2); ?></div>
            </div>
            <div class="info-city b-tr">
                <div class="label"><?php echo e(__('City')); ?></div>
                <div class="val"><?php echo e($booking->city); ?></div>
            </div>
            <div class="info-state b-tr">
                <div class="label"><?php echo e(__('State/Province/Region')); ?></div>
                <div class="val"><?php echo e($booking->state); ?></div>
            </div>
            <div class="info-zip-code b-tr">
                <div class="label"><?php echo e(__('ZIP code/Postal code')); ?></div>
                <div class="val"><?php echo e($booking->zip_code); ?></div>
            </div>
            <div class="info-country b-tr">
                <div class="label"><?php echo e(__('Country')); ?></div>
                <div class="val"><?php echo e(get_country_name($booking->country)); ?></div>
            </div>
            <div class="info-notes b-tr">
                <div class="label"><?php echo e(__('Special Requirements')); ?></div>
                <div class="val"><?php echo e($booking->customer_notes); ?></div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel\modules/Booking/Views/emails/parts/panel-customer.blade.php ENDPATH**/ ?>