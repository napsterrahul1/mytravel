<?php
    $languages = \Modules\Language\Models\Language::getActive();
    $locale = session('website_locale',app()->getLocale());
?>
<?php if(!empty($languages) && setting_item('site_enable_multi_lang')): ?>
    <div class="position-relative px-3 u-header__login-form dropdown-connector-xl u-header__topbar-divider currency-select">
        <div class="d-flex align-items-center text-white py-3 dropdown">
            <span class="d-inline-block font-size-14 mr-1 dropdown-nav-link " data-toggle="dropdown">
                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($locale == $language->locale): ?>
                        <?php if($language->flag): ?>
                            <span class="flag-icon flag-icon-<?php echo e($language->flag); ?>"></span>
                        <?php endif; ?>
                            <?php echo e($language->name); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </span>
            <ul class="dropdown-menu dropdown-menu-user text-left width-auto">
                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($locale != $language->locale): ?>
                        <li>
                            <a href="<?php echo e(get_lang_switcher_url($language->locale)); ?>" class="d-flex">
                                <?php if($language->flag): ?>
                                    <span class="flag-icon flag-icon-<?php echo e($language->flag); ?> mr-2"></span>
                                <?php endif; ?>
                                <?php echo e($language->name); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\APPS\htdocs\mytravel\modules/Language/Views/frontend/switcher.blade.php ENDPATH**/ ?>