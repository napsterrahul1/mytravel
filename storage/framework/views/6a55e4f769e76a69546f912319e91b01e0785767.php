<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>

<div class="item mb-4">
    <a class="d-block rounded-xs overflow-hidden mb-3" href="<?php echo e($row->getDetailUrl()); ?>">
        <?php if($row->image_id): ?>
            <?php if(!empty($disable_lazyload)): ?>
                <img src="<?php echo e(get_file_url($row->image_id,'medium')); ?>" class="img-fluid w-100" alt="<?php echo e($translation->name ?? ''); ?>">
            <?php else: ?>
                <?php echo get_image_tag($row->image_id,'medium',['class'=>'img-fluid w-100','alt'=>$row->title]); ?>

            <?php endif; ?>
        <?php endif; ?>
    </a>
    <h6 class="font-size-17 pt-xl-1 font-weight-bold font-weight-bold mb-1 text-gray-6">
        <a href="<?php echo e($row->getDetailUrl()); ?>">
            <?php echo clean($translation->title); ?>

        </a>
    </h6>
    <a class="text-gray-1" href="<?php echo e($row->getDetailUrl()); ?>">
        <span> <?php echo get_exceprt($translation->content,70,"..."); ?></span>
    </a>
</div>
<?php /**PATH C:\APPS\htdocs\mytravel\modules/News/Views/frontend/blocks/list-news/loop.blade.php ENDPATH**/ ?>