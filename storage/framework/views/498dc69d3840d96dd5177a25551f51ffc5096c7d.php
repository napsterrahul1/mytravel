<div class="form-checkout" id="form-checkout">
    <input type="hidden" name="code" value="<?php echo e($booking->code); ?>">
    <div class="mb-5 shadow-soft bg-white rounded-sm">
        <div class="pt-4 pb-5 px-5">
            <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-4">
                <?php echo e(__("Let us know who you are")); ?>

            </h5>
            <div class="row">
                <div class="col-sm-6 mb-4">
                    <label class="form-label">
                        <?php echo e(__("First Name")); ?>

                    </label>
                    <input type="text" placeholder="<?php echo e(__("First Name")); ?>" class="form-control" value="<?php echo e($user->first_name ?? ''); ?>" name="first_name">
                </div>
                <div class="col-sm-6 mb-4">
                    <label class="form-label">
                        <?php echo e(__("Last name")); ?>

                    </label>
                    <input type="text" placeholder="<?php echo e(__("Last Name")); ?>" class="form-control" value="<?php echo e($user->last_name ?? ''); ?>" name="last_name">
                </div>
                <div class="col-sm-6 mb-4">
                    <label class="form-label">
                        <?php echo e(__("Email")); ?>

                    </label>
                    <input type="email" placeholder="<?php echo e(__("email@domain.com")); ?>" class="form-control" value="<?php echo e($user->email ?? ''); ?>" name="email">
                </div>
                <div class="col-sm-6 mb-4">
                    <label class="form-label">
                        <?php echo e(__("Phone")); ?>

                    </label>
                    <input type="email" placeholder="<?php echo e(__("Your Phone")); ?>" class="form-control" value="<?php echo e($user->phone ?? ''); ?>" name="phone">
                </div>
                <div class="w-100"></div>
                <div class="col-sm-6 mb-4">
                    <label class="form-label">
                        <?php echo e(__("Address line 1")); ?>

                    </label>
                    <input type="text" placeholder="<?php echo e(__("Address line 1")); ?>" class="form-control" value="<?php echo e($user->address ?? ''); ?>" name="address_line_1">
                </div>
                <div class="col-sm-6 mb-4">
                    <label class="form-label">
                        <?php echo e(__("Address line 2")); ?>

                    </label>
                    <input type="text" placeholder="<?php echo e(__("Address line 2")); ?>" class="form-control" value="<?php echo e($user->address2 ?? ''); ?>" name="address_line_2">
                </div>
                <div class="col-sm-6 mb-4">
                    <label class="form-label">
                        <?php echo e(__("State/Province/Region")); ?>

                    </label>
                    <input type="text" class="form-control" value="<?php echo e($user->state ?? ''); ?>" name="state" placeholder="<?php echo e(__("State/Province/Region")); ?>">
                </div>
                <div class="col-sm-6 mb-4">
                    <label class="form-label">
                        <?php echo e(__("ZIP code/Postal code")); ?>

                    </label>
                    <input type="text" class="form-control" value="<?php echo e($user->zip_code ?? ''); ?>" name="zip_code" placeholder="<?php echo e(__("ZIP code/Postal code")); ?>">
                    <input name="bravo_stripe_token1" type="hidden" value="" id="bravo_stripe_token1"/>
                </div>
                <div class="col-sm-6 mb-4">

                    <label class="form-label">
                        <?php echo e(__("Country")); ?>

                    </label>
                    <select name="country" class="form-control">
                        <option value=""><?php echo e(__('-- Select --')); ?></option>
                        <?php $__currentLoopData = get_country_lists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if(($user->country ?? '') == $id): ?> selected <?php endif; ?> value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-sm-6 mb-4">
                    <label class="form-label">
                        <?php echo e(__("City")); ?>

                    </label>
                    <input type="text" class="form-control" value="<?php echo e($user->city ?? ''); ?>" name="city" placeholder="<?php echo e(__("Your City")); ?>">
                </div>
                <div class="w-100"></div>
                <div class="col">
                    <div class="mb-6">
                        <label class="form-label">
                            <?php echo e(__("Special Requirements")); ?>

                        </label>
                        <div class="input-group">
                            <textarea name="customer_notes" cols="30" rows="6" class="form-control" placeholder="<?php echo e(__('Special Requirements')); ?>"></textarea>
                        </div>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-sm-12 mb-4">
                    <?php echo $__env->make('Booking::frontend/booking/checkout-deposit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make($service->checkout_form_payment_file ?? 'Booking::frontend/booking/checkout-payment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-sm-12 mb-4">
                    <?php
                        $term_conditions = setting_item('booking_term_conditions');
                    ?>
                    <div class="mb-3">
                        <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                            <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="term_conditions">
                            <label class="custom-control-label" for="termsCheckbox">
                                <small>
                                    <?php echo e(__('By continuing, you agree to the')); ?>

                                    <a target="_blank" class="link-muted" href="<?php echo e(get_page_url($term_conditions)); ?>"><?php echo e(__('Terms and Conditions')); ?></a>
                                </small>
                            </label>
                        </div>
                        <?php if(setting_item("booking_enable_recaptcha")): ?>
                            <div class="form-group">
                                <?php echo e(recaptcha_field('booking')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="html_before_actions"></div>
                    <p class="alert-text mt10" v-show=" message.content" v-html="message.content" :class="{'danger':!message.type,'success':message.type}"></p>
                    <button class="btn btn-primary w-100 rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3" @click="doCheckout"><?php echo e(__('CONFIRM BOOKING')); ?>

                        <i class="fa fa-spin fa-spinner" v-show="onSubmit"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel\modules/Booking/Views/frontend/booking/checkout-form.blade.php ENDPATH**/ ?>