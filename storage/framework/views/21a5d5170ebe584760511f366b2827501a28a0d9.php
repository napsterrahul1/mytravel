
<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<div class="d-flex justify-content-between mb20">
			<h1 class="title-bar"><?php echo e(!empty($recovery) ? __('Recovery') : __("All Flight")); ?></h1>
			<div class="title-actions">
				<?php if(empty($recovery)): ?>
					<a href="<?php echo e(route('flight.admin.create')); ?>" class="btn btn-primary"><?php echo e(__("Add new flight")); ?></a>
				<?php endif; ?>
			</div>
		</div>
		<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="filter-div d-flex justify-content-between ">
			<div class="col-left">
				<?php if(!empty($rows)): ?>
					<form method="post" action="<?php echo e(route('flight.admin.bulkEdit')); ?>" class="filter-form filter-form-left d-flex justify-content-start">
						<?php echo e(csrf_field()); ?>

						<select name="action" class="form-control">
							<option value=""><?php echo e(__(" Bulk Actions ")); ?></option>
							
							<?php if(!empty($recovery)): ?>
								<option value="recovery"><?php echo e(__(" Recovery ")); ?></option>
								<option value="permanently_delete"><?php echo e(__("Permanently delete")); ?></option>
							<?php else: ?>
								<option value="publish"><?php echo e(__(" Publish ")); ?></option>
								<option value="draft"><?php echo e(__(" Move to Draft ")); ?></option>
								<option value="pending"><?php echo e(__("Move to Pending")); ?></option>
								<option value="delete"><?php echo e(__(" Delete ")); ?></option>
							<?php endif; ?>
						</select>
						<button data-confirm="<?php echo e(__("Do you want to delete?")); ?>" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button"><?php echo e(__('Apply')); ?></button>
					</form>
				<?php endif; ?>
			</div>
			<div class="col-left">
				<form method="get" action="<?php echo e(!empty($recovery) ? route('flight.admin.recovery') : route('flight.admin.index')); ?>" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
					<?php if(!empty($rows) and $flight_manage_others): ?>
                        <?php
                        $user = !empty(Request()->vendor_id) ? App\User::find(Request()->vendor_id) : false;
                        \App\Helpers\AdminForm::select2('vendor_id', [
                            'configs' => [
                                'ajax'        => [
                                    'url'      => url('/admin/module/user/getForSelect2'),
                                    'dataType' => 'json',
                                    'data'     => array("user_type" => "vendor")
                                ],
                                'allowClear'  => true,
                                'placeholder' => __('-- Vendor --')
                            ]
                        ], !empty($user->id) ? [
                            $user->id,
                            $user->name_or_email.' (#'.$user->id.')'
                        ] : false)
                        ?>
					<?php endif; ?>
					<input type="text" name="s" value="<?php echo e(Request()->s); ?>" placeholder="<?php echo e(__('Search by name')); ?>" class="form-control">
					<button class="btn-info btn btn-icon btn_search" type="submit"><?php echo e(__('Search')); ?></button>
				</form>
			</div>
		</div>
		<div class="text-right">
			<p><i><?php echo e(__('Found :total items',['total'=>$rows->total()])); ?></i></p>
		</div>
		<div class="panel">
			<div class="panel-body">
				<form action="" class="bravo-form-item">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
							<tr>
								<th width="60px"><input type="checkbox" class="check-all"></th>
								<th> <?php echo e(__('Name')); ?></th>
								<th> <?php echo e(__('Code')); ?></th>
								<th> <?php echo e(__('Airport From')); ?></th>
								<th> <?php echo e(__('Airport To')); ?></th>
								<th> <?php echo e(__('Departure time')); ?></th>
								<th> <?php echo e(__('Arrival time')); ?></th>
								<th> <?php echo e(__('Duration')); ?></th>
								<th width="130px"> <?php echo e(__('Author')); ?></th>
								<th width="100px"> <?php echo e(__('Status')); ?></th>
								<th width="100px"> <?php echo e(__('Date')); ?></th>
								<th width="100px"></th>
							</tr>
							</thead>
							<tbody>
							<?php if($rows->total() > 0): ?>
								<?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="<?php echo e($row->status); ?>">
										<td><input type="checkbox" name="ids[]" class="check-item" value="<?php echo e($row->id); ?>">
										</td>
										<td><?php echo e($row->title); ?></td>
										<td><?php echo e($row->code); ?></td>
										<td><?php echo e($row->airportFrom->name); ?></td>
										<td><?php echo e($row->airportTo->name); ?></td>
										<td> <?php echo e(display_datetime($row->departure_time)); ?></td>
										<td> <?php echo e(display_datetime($row->arrival_time)); ?></td>
										<td><?php echo e($row->duration ?? ''); ?></td>
										<td>
											<?php if(!empty($row->author)): ?>
												<?php echo e($row->author->getDisplayName()); ?>

											<?php else: ?>
												<?php echo e(__("[Author Deleted]")); ?>

											<?php endif; ?>
										</td>
										<td><span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span></td>
										<td><?php echo e(display_date($row->updated_at)); ?></td>
										<td>
											<div class="dropdown">
												<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th" aria-hidden="true"></i>
												</button>
												<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
													<a href="<?php echo e(route('flight.admin.edit',['id'=>$row->id])); ?>" class="dropdown-item btn btn-primary "><i class="fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
													<a href="<?php echo e(route('flight.admin.flight.seat.index',['flight_id'=>$row->id])); ?>" class="dropdown-item btn btn-primary "><i class="fa fa-ticket"></i> <?php echo e(__('Flight ticket')); ?></a>
												
												
												</div>
											</div>
										</td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php else: ?>
								<tr>
									<td colspan="7"><?php echo e(__("No flight found")); ?></td>
								</tr>
							<?php endif; ?>
							</tbody>
						</table>
					</div>
				</form>
				<?php echo e($rows->appends(request()->query())->links()); ?>

			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script.body'); ?>
	<script>
        $(document).ready(function () {
            $('.has-datetimepicker').daterangepicker({
                singleDatePicker: true,
                timePicker: true,
                showCalendar: false,
                autoUpdateInput: false, //disable default date
                sameDate: true,
                autoApply: true,
                disabledPast: true,
                enableLoading: true,
                showEventTooltip: true,
                classNotAvailable: ['disabled', 'off'],
                disableHightLight: true,
                locale: {
                    format: 'YYYY/MM/DD hh:mm:ss'
                }
            }).on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('YYYY/MM/DD hh:mm:ss'));
            });
        })
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\APPS\htdocs\mytravel\modules/Flight/Views/admin/index.blade.php ENDPATH**/ ?>