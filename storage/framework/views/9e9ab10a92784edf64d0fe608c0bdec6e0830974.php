<?php
$minValue = 0;
;?>
<div class="item">
	<div class="dropdown-custom px-0 mb-4 custom-select-dropdown-parent">
		<span class="d-block text-gray-1 text-left font-weight-normal"><?php echo e($field['title'] ?? ""); ?></span>
		<div class="flex-horizontal-center border-bottom-1  py-2 d-flex  dropdown-toggle" data-toggle="dropdown">
			<i class="flaticon-plus d-flex align-items-center mr-2 text-primary font-weight-semi-bold"></i>
			<?php
				$seatTypeGet = request()->query('seat_type',[]);
			?>
			<div class="text-black font-size-16 font-weight-semi-bold mr-auto height-40 d-flex align-items-center overflow-hidden">
				<div class="render">
					<?php $__currentLoopData = $seatType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $inputRender = 'seat_type_'.$type->code.'_render';
                        $inputValue = $seatTypeGet[$type->code] ?? $minValue;
                        ;?>
						<span class="" id="<?php echo e($inputRender); ?>">
                            <span class="one <?php if($inputValue > $minValue): ?> d-none <?php endif; ?>"><?php echo e(__( ':min :name',['min'=>$minValue,'name'=>$type->name])); ?></span>
                            <span class="<?php if($inputValue <= $minValue): ?> d-none <?php endif; ?> multi" data-html="<?php echo e(__(':count '.$type->name)); ?>"><?php echo e(__(':count'.$type->name,['count'=>$inputValue??$minValue])); ?></span>
                        </span>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
		<div class="dropdown-menu custom-select-dropdown">
			<?php $__currentLoopData = $seatType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php
                $inputName = 'seat_type_'.$type->code;
                $inputValue = $seatTypeGet[$type->code] ?? $minValue;
                ;?>
			
				<div class="dropdown-item-row">
					<div class="label"><?php echo e(__('Adults :type',['type'=>$type->name])); ?></div>
					<div class="val">
						<span class="btn-minus" data-input="<?php echo e($inputName); ?>" data-input-attr="id"><i class="icon ion-md-remove"></i></span>
						<span class="count-display"><input id="<?php echo e($inputName); ?>" type="number" name="seat_type[<?php echo e($type->code); ?>]" value="<?php echo e($inputValue); ?>" min="<?php echo e($minValue); ?>"></span>
						<span class="btn-add" data-input="<?php echo e($inputName); ?>" data-input-attr="id"><i class="icon ion-ios-add"></i></span>
					</div>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</div><?php /**PATH C:\APPS\htdocs\mytravel\modules/Flight/Views/frontend/layouts/search/fields/seat_type.blade.php ENDPATH**/ ?>