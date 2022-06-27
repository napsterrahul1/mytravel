<?php if(!is_api()): ?>
	<div class="bravo_footer mt-4 border-top">
		<div class="main-footer">
			<div class="container">
				<div class="row justify-content-xl-between">
                    <?php if(!empty($info_contact = clean(setting_item_with_lang('footer_info_text')))): ?>
                        <div class="col-12 col-lg-4 col-xl-3dot1 mb-6 mb-md-10 mb-xl-0">
                            <?php echo clean($info_contact); ?>

                        </div>
                    <?php endif; ?>
					<?php if($list_widget_footers = setting_item_with_lang("list_widget_footer")): ?>
                        <?php $list_widget_footers = json_decode($list_widget_footers);?>
						<?php $__currentLoopData = $list_widget_footers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-12 col-md-6 col-lg-<?php echo e($item->size ?? '3'); ?> col-xl-1dot8 mb-6 mb-md-10 mb-xl-0">
								<div class="nav-footer">
                                    <h4 class="h6 font-weight-bold mb-2 mb-xl-4"><?php echo e($item->title); ?></h4>
                                    <?php echo clean($item->content); ?>

								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
                    <div class="col-12 col-md-6 col-lg col-xl-3dot1">
                        <div class="mb-4 mb-xl-2">
                            <h4 class="h6 font-weight-bold mb-2 mb-xl-4"><?php echo e(__('Mailing List')); ?></h4>
                            <p class="m-0 text-gray-1"><?php echo e(__('Sign up for our mailing list to get latest updates and offers.')); ?></p>
                        </div>
                        <form action="<?php echo e(route('newsletter.subscribe')); ?>" class="subcribe-form bravo-subscribe-form bravo-form">
                            <?php echo csrf_field(); ?>
                            <div class="input-group">
                                <input type="text" name="email" class="form-control height-54 font-size-14 border-radius-3 border-width-2 border-color-8 email-input" placeholder="<?php echo e(__('Your Email')); ?>">
                                <div class="input-group-append ml-3">
                                    <button type="submit" class="btn-submit btn btn-sea-green border-radius-3 height-54 min-width-112 font-size-14"><?php echo e(__('Subscribe')); ?>

                                        <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="form-mess"></div>
                        </form>
                    </div>
				</div>
			</div>
		</div>
        <div class="border-top border-bottom border-color-8 space-1">
            <div class="container">
                <div class="sub-footer d-flex align-items-center justify-content-between">
                    <a class="d-inline-flex align-items-center" href="<?php echo e(url('/')); ?>" aria-label="MyTravel">
                        <?php echo get_image_tag(setting_item_with_lang('logo_id_2')); ?>

                        <span class="brand brand-dark"><?php echo e(setting_item_with_lang('logo_text')); ?></span>
                    </a>
                    <div class="footer-select bravo_topbar d-flex align-items-center">
                        <div class="mr-3">
                            <?php echo $__env->make('Language::frontend.switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <?php echo $__env->make('Core::frontend.currency-switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
		<div class="copy-right">
			<div class="container context">
				<div class="row">
					<div class="col-md-12">
						<?php echo setting_item_with_lang("footer_text_left") ?? ''; ?>

						<div class="f-visa">
							<?php echo setting_item_with_lang("footer_text_right") ?? ''; ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<a class="travel-go-to u-go-to-modern" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed" data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp" data-hide-effect="slideOutDown">
    <span class="flaticon-arrow u-go-to-modern__inner"></span>
</a>
<?php echo $__env->make('Layout::parts.login-register-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Layout::parts.chat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(Auth::id()): ?>
	<?php echo $__env->make('Media::browser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<link rel="stylesheet" href="<?php echo e(asset('libs/flags/css/flag-icon.min.css')); ?>">

<?php echo \App\Helpers\Assets::css(true); ?>



<script src="<?php echo e(asset('libs/lazy-load/intersection-observer.js')); ?>"></script>
<script async src="<?php echo e(asset('libs/lazy-load/lazyload.min.js')); ?>"></script>
<script>
    // Set the options to make LazyLoad self-initialize
    window.lazyLoadOptions = {
        elements_selector: ".lazy",
        // ... more custom settings?
    };

    // Listen to the initialization event and get the instance of LazyLoad
    window.addEventListener('LazyLoad::Initialized', function (event) {
        window.lazyLoadInstance = event.detail.instance;
    }, false);
</script>
<script src="<?php echo e(asset('libs/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs/jquery-migrate/jquery-migrate.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs/header.js')); ?>"></script>
<script>
    $(document).on('ready', function () {
        $.MyTravelHeader.init($('#header'));
    });
</script>
<script src="<?php echo e(asset('libs/lodash.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs/vue/vue'.(!env('APP_DEBUG') ? '.min':'').'.js')); ?>"></script>
<script src="<?php echo e(asset('libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs/bootbox/bootbox.min.js')); ?>"></script>

<script src="<?php echo e(asset('libs/fancybox/jquery.fancybox.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs/slick/slick.js')); ?>"></script>


<?php if(Auth::id()): ?>
	<script src="<?php echo e(asset('module/media/js/browser.js?_ver='.config('app.version'))); ?>"></script>
<?php endif; ?>
<script src="<?php echo e(asset('libs/carousel-2/owl.carousel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("libs/daterange/moment.min.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("libs/daterange/daterangepicker.min.js")); ?>"></script>
<script src="<?php echo e(asset('libs/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/functions.js?_ver='.config('app.version'))); ?>"></script>
<script src="<?php echo e(asset('libs/custombox/custombox.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs/custombox/custombox.legacy.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs/custombox/window.modal.js')); ?>"></script>

<?php if(
    setting_item('tour_location_search_style')=='autocompletePlace' || setting_item('hotel_location_search_style')=='autocompletePlace' || setting_item('car_location_search_style')=='autocompletePlace' || setting_item('space_location_search_style')=='autocompletePlace' || setting_item('hotel_location_search_style')=='autocompletePlace' || setting_item('event_location_search_style')=='autocompletePlace'
): ?>
	<?php echo App\Helpers\MapEngine::scripts(); ?>

<?php endif; ?>
<script src="<?php echo e(asset('libs/pusher.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/home.js?_ver='.config('app.version'))); ?>"></script>

<?php if(!empty($is_user_page)): ?>
	<script src="<?php echo e(asset('module/user/js/user.js?_ver='.config('app.version'))); ?>"></script>
<?php endif; ?>
<?php if(setting_item('cookie_agreement_enable')==1 and request()->cookie('booking_cookie_agreement_enable') !=1 and !is_api()  and !isset($_COOKIE['booking_cookie_agreement_enable'])): ?>
	<div class="booking_cookie_agreement p-3 fixed-bottom">
		<div class="container d-flex ">
            <div class="content-cookie"><?php echo setting_item_with_lang('cookie_agreement_content'); ?></div>
            <button class="btn save-cookie"><?php echo setting_item_with_lang('cookie_agreement_button_text'); ?></button>
        </div>
	</div>
	<script>
        var save_cookie_url = '<?php echo e(route('core.cookie.check')); ?>';
	</script>
	<script src="<?php echo e(asset('js/cookie.js?_ver='.config('app.version'))); ?>"></script>
<?php endif; ?>

<?php echo \App\Helpers\Assets::js(true); ?>


<?php echo $__env->yieldContent('footer'); ?>

<?php \App\Helpers\ReCaptchaEngine::scripts() ?>
<?php /**PATH C:\xampp\htdocs\mytravel\modules/Layout/parts/footer.blade.php ENDPATH**/ ?>