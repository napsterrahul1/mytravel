<?php
    $actives = \App\Currency::getActiveCurrency();
    $current = \App\Currency::getCurrent('currency_main');
?>
<?php if(!empty($actives) and count($actives) > 1): ?>
    <div class="position-relative px-3 u-header__login-form dropdown-connector-xl u-header__topbar-divider currency-select">
        <div class="d-flex align-items-center text-white py-3 dropdown">
            <span class="d-inline-block font-size-14 mr-1 dropdown-nav-link " data-toggle="dropdown">
                <?php $__currentLoopData = $actives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($current == $currency['currency_main']): ?>
                        <?php echo e(strtoupper($currency['currency_main'])); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </span>
            <ul class="dropdown-menu text-left width-auto min-width-100">
                <?php $__currentLoopData = $actives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($current != $currency['currency_main']): ?>
                        <li>
                            <a href="<?php echo e(get_currency_switcher_url($currency['currency_main'])); ?>">
                                <?php echo e(strtoupper($currency['currency_main'])); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\mytravel\modules/Core/Views/frontend/currency-switcher.blade.php ENDPATH**/ ?>