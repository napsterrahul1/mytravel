<?php if($row->banner_image_id): ?>
    <?php
        $data = [
            'bg_image_url'  =>  get_file_url($row->banner_image_id,'full'),
            'title'         =>  $translation->name,
            'sub_title'     =>  $translation->sub_title
        ];
    ?>
    <?php echo $__env->make('Template::frontend.blocks.form-search-all-service.style_1',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\mytravel\modules/Location/Views/frontend/layouts/details/location-banner.blade.php ENDPATH**/ ?>