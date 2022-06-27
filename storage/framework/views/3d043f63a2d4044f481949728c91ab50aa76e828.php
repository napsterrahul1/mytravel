<div class="item">
    <span class="d-block text-gray-1 text-left font-weight-normal">
        <?php echo e($field['title'] ?? ""); ?>

    </span>
    <div class="border-bottom-1 mb-4 form-content">
        <div class="u-datepicker input-group py-2 flex-nowrap form-date-search">
            <div class="input-group-prepend">
                    <span class="d-flex align-items-center mr-2">
                      <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                    </span>
            </div>
            <div class="date-wrapper height-40 font-size-16 ml-1 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 flatpickr-input p-0">
                <div class="render check-in-render"><?php echo e(Request::query('start',display_date(strtotime("today")))); ?></div>
                <span> - </span>
                <div class="render check-out-render"><?php echo e(Request::query('end',display_date(strtotime("+7 day")))); ?></div>
            </div>
            <input type="hidden" class="check-in-input" value="<?php echo e(Request::query('start',display_date(strtotime("today")))); ?>" name="start">
            <input type="hidden" class="check-out-input" value="<?php echo e(Request::query('end',display_date(strtotime("+7 day")))); ?>" name="end">
            <input type="text" class="check-in-out" name="date" value="<?php echo e(Request::query('date',date("Y-m-d")." - ".date("Y-m-d",strtotime("+7 day")))); ?>">
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\mytravel\modules/Flight/Views/frontend/layouts/search/fields/date.blade.php ENDPATH**/ ?>