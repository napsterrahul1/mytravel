<?php $__env->startSection('head'); ?>
    <link href="<?php echo e(asset('dist/frontend/module/booking/css/checkout.css?_ver='.config('app.version'))); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bravo-booking-page">
        <div id="bravo-checkout-page" class="bg-gray space-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-9">
                        <div class="booking-form">
                            <?php echo $__env->make($service->checkout_form_file ?? 'Booking::frontend/booking/checkout-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 booking-form">
                        <?php echo $__env->make($service->checkout_booking_detail_file ?? '', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

 var options = {
                    "key": "rzp_test_1B9bf0vLtBKtpP", // Enter the Key ID generated from the Dashboard
                    "amount": "<?php echo e(round($booking->total)*100); ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                    "currency": "AED",
                    "name": "OneClick SOlutions",
                    "description": "Payment",
                    "image": "http://127.0.0.1:8000/uploads/demo/general/logo.svg",
                    // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                    "handler": function (response){
                        alert(response.razorpay_payment_id);
                        alert(response.razorpay_order_id);
                        alert(response.razorpay_signature);

                        $('#bravo_stripe_token1').val(response.razorpay_payment_id);
                            $.ajax({
                                url:myTravel.routes.checkout,
                                data:$('.booking-form').find('input,textarea,select').serialize(),
                                method:"post",
                                success:function (res) {
                                    if(!res.status && !res.url){
                                        me.onSubmit = false;
                                    }

                                    if(res.elements){
                                        for(var k in res.elements){
                                            $(k).html(res.elements[k]);
                                        }
                                    }

                                    if(res.message)
                                    {
                                        me.message.content = res.message;
                                        me.message.type = res.status;
                                    }

                                    if(res.url){
                                        window.location.href = res.url
                                    }

                                    if(res.errors && typeof res.errors == 'object')
                                    {
                                        var html = '';
                                        for(var i in res.errors){
                                            html += res.errors[i]+'<br>';
                                        }
                                        me.message.content = html;
                                    }

                                },
                                error:function (e) {
                                    me.onSubmit = false;
                                    if(e.responseJSON){
                                        me.message.content = e.responseJSON.message ? e.responseJSON.message : 'Can not booking';
                                        me.message.type = false;
                                    }else{
                                        if(e.responseText){
                                            me.message.content = e.responseText;
                                            me.message.type = false;
                                        }
                                    }


                                }
                            });
                    },
                    "prefill": {
                        "name": "<?php echo e($user->first_name ?? ''); ?>",
                        "email": "<?php echo e($user->email ?? ''); ?>",
                        "contact": "<?php echo e($user->phone ?? ''); ?>"
                    },
                    "notes": {
                        "address": "OneClick SOlutions"
                    },
                    "theme": {
                        "color": "#3399cc"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.on('payment.failed', function (response){
                      //  alert(response.error.code);
                        alert(response.error.description);
                        // alert(response.error.source);
                        // alert(response.error.step);
                        // alert(response.error.reason);
                        // alert(response.error.metadata.order_id);
                        // alert(response.error.metadata.payment_id);
                });

</script>

    <script src="<?php echo e(asset('module/booking/js/checkout.js')); ?>"></script>
    <script type="text/javascript">
        jQuery(function () {
            "use strict"
            $.ajax({
                'url': myTravel.url + '<?php echo e($is_api ? '/api' : ''); ?>/booking/<?php echo e($booking->code); ?>/check-status',
                'cache': false,
                'type': 'GET',
                success: function (data) {
                    if (data.redirect !== undefined && data.redirect) {
                        window.location.href = data.redirect
                    }
                }
            });
        })

        $('.deposit_amount').on('change', function(){
            checkPaynow();
        });

        $('input[type=radio][name=how_to_pay]').on('change', function(){
            checkPaynow();
        });

        function checkPaynow(){
            var credit_input = $('.deposit_amount').val();
            var how_to_pay = $("input[name=how_to_pay]:checked").val();
            var convert_to_money = credit_input * <?php echo e(setting_item('wallet_credit_exchange_rate',1)); ?>;

            if(how_to_pay == 'full'){
                var pay_now_need_pay = parseFloat(<?php echo e(floatval($booking->total)); ?>) - convert_to_money;
            }else{
                var pay_now_need_pay = parseFloat(<?php echo e(floatval($booking->deposit == null ? $booking->total : $booking->deposit)); ?>) - convert_to_money;
            }

            if(pay_now_need_pay < 0){
                pay_now_need_pay = 0;
            }
            $('.convert_pay_now').html(bravo_format_money(pay_now_need_pay));
            $('.convert_deposit_amount').html(bravo_format_money(convert_to_money));
        }

        jQuery(function () {
            $(".bravo_apply_coupon").click(function () {
                var parent = $(this).closest('.section-coupon-form');
                parent.find(".group-form .fa-spin").removeClass("d-none");
                parent.find(".message").html('');
                $.ajax({
                    'url': myTravel.url + '/booking/<?php echo e($booking->code); ?>/apply-coupon',
                    'data': parent.find('input,textarea,select').serialize(),
                    'cache': false,
                    'method':"post",
                    success: function (res) {
                        parent.find(".group-form .fa-spin").addClass("d-none");
                        if (res.reload !== undefined) {
                            window.location.reload();
                        }
                        if(res.message && res.status === 1)
                        {
                            parent.find('.message').html('<div class="alert alert-success">' + res.message+ '</div>');
                        }
                        if(res.message && res.status === 0)
                        {
                            parent.find('.message').html('<div class="alert alert-danger">' + res.message+ '</div>');
                        }
                    }
                });
            });
            $(".bravo_remove_coupon").click(function (e) {
                e.preventDefault();
                var parent = $(this).closest('.section-coupon-form');
                var parentItem = $(this).closest('.item');
                parentItem.find(".fa-spin").removeClass("d-none");
                $.ajax({
                    'url': myTravel.url + '/booking/<?php echo e($booking->code); ?>/remove-coupon',
                    'data': {
                        coupon_code:$(this).attr('data-code')
                    },
                    'cache': false,
                    'method':"post",
                    success: function (res) {
                        parentItem.find(".fa-spin").addClass("d-none");
                        if (res.reload !== undefined) {
                            window.location.reload();
                        }
                        if(res.message && res.status === 0)
                        {
                            parent.find('.message').html('<div class="alert alert-danger">' + res.message+ '</div>');
                        }
                    }
                });
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mytravel\modules/Booking/Views/frontend/checkout.blade.php ENDPATH**/ ?>