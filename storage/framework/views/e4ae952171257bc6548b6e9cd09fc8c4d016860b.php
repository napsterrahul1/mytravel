
<?php $__env->startSection('content'); ?>
<div class="b-container">
    <div class="b-panel">
        <?php echo $content; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Email::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mytravel\modules/User/Views/emails/vendor-registered.blade.php ENDPATH**/ ?>