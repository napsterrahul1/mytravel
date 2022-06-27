<?php if(auth()->check() && $booking->status == 'draft' && empty(setting_item('wallet_module_disable'))): ?>
    <hr/>
    <div class="form-group-item">
        <h5 class="form-section-title font-size-17 font-weight-bold"><?php echo e(__("Credit want to pay?")); ?></h5>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text border-width-1"><?php echo e(__('Credit')); ?> <?php echo e(!empty(auth()->user()) ? auth()->user()->balance : 0); ?></span>
            </div>
            <input type="number" class="form-control deposit_amount border-width-1" value="0" name="credit">
            <div class="input-group-append">
                <span class="input-group-text convert_deposit_amount border-width-1"><?php echo e(format_money(0)); ?></span>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <h5 class="form-section-title font-size-17 font-weight-bold"><?php echo e(__("Pay now")); ?>:</h5>
            <div class="val convert_pay_now"><?php echo e(format_money(floatval($booking->deposit == null ? $booking->total : $booking->deposit))); ?></div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\APPS\htdocs\mytravel\modules/Booking/Views/frontend/booking/checkout-deposit-amount.blade.php ENDPATH**/ ?>