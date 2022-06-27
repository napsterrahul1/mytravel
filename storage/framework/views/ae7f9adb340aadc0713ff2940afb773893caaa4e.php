<form action="<?php echo e(route("flight.search")); ?>" class="form bravo_form d-flex mb-1 py-2" method="get">
    <div class="g-field-search">
        <div class="row ">
            <?php $flight_search_fields = setting_item_array('flight_search_fields');
    $flight_search_fields = array_values(\Illuminate\Support\Arr::sort($flight_search_fields, function ($value) {
        return $value['position'] ?? 0;
    }));
            ?>
            <?php if(!empty($flight_search_fields)): ?>
                <?php $__currentLoopData = $flight_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" ?>
                    <div class="col-md-<?php echo e($field['size'] ?? "6"); ?> mb-4 mb-xl-0 ">
                        <?php switch($field['field']):
                            case ('service_name'): ?>
                            <?php echo $__env->make('Flight::frontend.layouts.search.fields.service_name', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>
                            <?php case ('location'): ?>
                            <?php echo $__env->make('Flight::frontend.layouts.search.fields.location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>
                            <?php case ('date'): ?>
                            <?php echo $__env->make('Flight::frontend.layouts.search.fields.date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>
                            <?php case ('guests'): ?>
                            <?php echo $__env->make('Flight::frontend.layouts.search.fields.guests', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>
                            <?php case ('seat_type'): ?>
                            <?php echo $__env->make('Flight::frontend.layouts.search.fields.seat_type', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>
                            <?php case ('from_where'): ?>
                            <?php echo $__env->make('Flight::frontend.layouts.search.fields.from-where', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>
                            <?php case ('to_where'): ?>
                            <?php echo $__env->make('Flight::frontend.layouts.search.fields.to-where', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>
                        <?php endswitch; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="g-button-submit align-self-lg-end">
        <button class="btn btn-blue-1 width-lg-200 text-white border-radius-2 font-weight-bold btn-md mb-xl-0 mb-lg-1 transition-3d-hover w-100 w-md-auto" type="submit"><i class="flaticon-magnifying-glass mr-2"></i> <?php echo e(__("Search")); ?></button>
    </div>
</form>
<?php /**PATH C:\APPS\htdocs\mytravel\modules/Flight/Views/frontend/layouts/search/form-search.blade.php ENDPATH**/ ?>