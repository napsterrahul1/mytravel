<div class="bg-img-hero text-center mb-1" style="background-image: url('<?php echo e($bg_image_url); ?>');">
    <div class="container space-top-xl-3 py-6 py-xl-0">
        <div class="row justify-content-center py-xl-4">
            <div class="py-xl-10 py-5">
                <h1 class="font-size-40 font-size-xs-30 text-white font-weight-bold mb-0"><?php echo e($title ?? ""); ?></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter justify-content-center mb-0">
                        <li class="breadcrumb-item font-size-14"> <a class="text-white" href="<?php echo e(url("/")); ?>"><?php echo e(__("Home")); ?></a> </li>
                        <li class="breadcrumb-item custom-breadcrumb-item font-size-14 text-white active" aria-current="page">
                            <?php echo e($sub_title ?? ""); ?>

                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\mytravel\modules/Template/Views/frontend/blocks/box-hero.blade.php ENDPATH**/ ?>