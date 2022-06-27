
<?php $__env->startSection('title',__("Looks like you're lost")); ?>
<?php $__env->startSection('message',!empty($exception->getMessage())? $exception->getMessage() :__("We can’t seem to find the page you’re looking for")); ?>
<?php $__env->startSection('code',404); ?>
<?php $__env->startSection('image',asset('images/404.svg')); ?>

<?php echo $__env->make('errors.illustrated-layout',['title'=>__('Page not found')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mytravel\resources\views/errors/404.blade.php ENDPATH**/ ?>