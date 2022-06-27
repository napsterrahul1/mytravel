<?php
$checkNotify = \Modules\Core\Models\NotificationPush::query();
if(is_admin()){
    $checkNotify->where(function($query){
        $query->where('data', 'LIKE', '%"for_admin":1%');
        $query->orWhere('notifiable_id', Auth::id());
    });
}else{
    $checkNotify->where('data', 'LIKE', '%"for_admin":0%');
    $checkNotify->where('notifiable_id', Auth::id());
}
$notifications = $checkNotify->orderBy('created_at', 'desc')->limit(5)->get();
$countUnread = $checkNotify->where('read_at', null)->count();
?>
<div class="bravo_topbar u-header__hide-content u-header__topbar u-header__topbar-lg border-bottom <?php if(!empty($is_home)|| !empty($header_transparent)): ?>border-color-white <?php else: ?>  border-color-8 <?php endif; ?>">
   <div class="<?php echo e($container_class ?? 'container'); ?>">
       <div class="d-flex align-items-center">
           <div class="list-inline u-header__topbar-nav-divider mb-0 topbar_left_text font-size-14 <?php if(!empty($is_home)|| !empty($header_transparent)): ?> <?php else: ?>  list-inline-dark <?php endif; ?>">
               <?php echo setting_item_with_lang("topbar_left_text"); ?>

           </div>
           <div class="ml-auto d-flex align-items-center">
               <div class="d-flex align-items-center text-white px-3">
                   <i class="flaticon-phone-call mr-2 ml-1 font-size-18"></i>
                   <span class="d-inline-block font-size-14 mr-1"><?php echo e(setting_item("phone_contact")); ?></span>
               </div>
               <?php echo $__env->make('Core::frontend.currency-switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <?php echo $__env->make('Language::frontend.switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <div class="dropdown-notifications position-relative px-3 u-header__login-form dropdown-connector-xl u-header__topbar-divider">
                <span class="d-inline-block font-size-14 mr-1 dropdown-nav-link" data-toggle="dropdown">
                    <i class="flaticon-bell mr-2 ml-1 font-size-18"></i>
                    <span class="d-inline-block badge badge-danger notification-icon"><?php echo e($countUnread); ?></span>
                </span>
                   <ul class="dropdown-menu text-left dropdown overflow-auto notify-items dropdown-large">
                       <div class="dropdown-toolbar">
                           <h3 class="dropdown-toolbar-title"><?php echo e(__('Notifications')); ?> (<span class="notif-count"><?php echo e($countUnread); ?></span>)</h3>
                           <div class="dropdown-toolbar-actions">
                               <a href="#" class="markAllAsRead"><?php echo e(__('Mark all as read')); ?></a>
                           </div>
                       </div>
                       <ul class="dropdown-list-items p-0">
                           <?php if(count($notifications)> 0): ?>
                               <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneNotification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <?php
                                       $active = $class = '';
                                       $data = json_decode($oneNotification['data']);

                                       $idNotification = @$data->id;
                                       $forAdmin = @$data->for_admin;
                                       $usingData = @$data->notification;

                                       $services = @$usingData->type;
                                       $idServices = @$usingData->id;
                                       $title = @$usingData->message;
                                       $name = @$usingData->name;
                                       $avatar = @$usingData->avatar;
                                       $link = @$usingData->link;

                                       if(empty($oneNotification->read_at)){
                                           $class = 'markAsRead';
                                           $active = 'active';
                                       }
                                   ?>
                                   <li class="notification <?php echo e($active); ?>">
                                       <div class="media">
                                           <div class="media-left">
                                               <div class="media-object">
                                                   <?php if($avatar): ?>
                                                       <img class="image-responsive" src="<?php echo e($avatar); ?>" alt="<?php echo e($name); ?>">
                                                   <?php else: ?>
                                                       <span class="avatar-text"><?php echo e(ucfirst($name[0])); ?></span>
                                                   <?php endif; ?>
                                               </div>
                                           </div>
                                           <div class="media-body">
                                               <a class="<?php echo e($class); ?> p-0" data-id="<?php echo e($idNotification); ?>" href="<?php echo e($link); ?>"><?php echo $title; ?></a>
                                               <div class="notification-meta">
                                                   <small class="timestamp"><?php echo e(format_interval($oneNotification->created_at)); ?></small>
                                               </div>
                                           </div>
                                       </div>
                                   </li>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                       </ul>
                       <div class="dropdown-footer text-right">
                           <a href="<?php echo e(route('core.notification.loadNotify')); ?>"><?php echo e(__('View More')); ?></a>
                       </div>
                   </ul>
               </div>
               <div class="position-relative px-3 u-header__login-form dropdown-connector-xl u-header__topbar-divider">
                   <?php if(!Auth::id()): ?>
                       <a href="javascript:;" class="d-flex align-items-center text-white py-3"
                          data-toggle="modal" data-target="#login">
                           <i class="flaticon-user mr-2 ml-1 font-size-18"></i>
                           <span class="d-inline-block font-size-14 mr-1"><?php echo e(__("Sign in or Register")); ?></span>
                       </a>
                   <?php else: ?>
                       <div class="d-flex align-items-center text-white py-3 dropdown">
                           <i class="flaticon-user mr-2 ml-1 font-size-18"></i>
                           <span class="d-inline-block font-size-14 mr-1 dropdown-nav-link" data-toggle="dropdown">
                            <?php echo e(__("Hi, :name",['name'=>Auth::user()->getDisplayName()])); ?>

                        </span>

                           <ul class="dropdown-menu dropdown-menu-user text-left dropdown">
                               <?php if(empty( setting_item('wallet_module_disable') )): ?>
                                   <li class="credit_amount">
                                       <a href="<?php echo e(route('user.wallet')); ?>"><i class="fa fa-money"></i> <?php echo e(__("Credit: :amount",['amount'=>auth()->user()->balance])); ?></a>
                                   </li>
                               <?php endif; ?>
                               <?php if(is_vendor()): ?>
                                   <li class=""><a href="<?php echo e(route('vendor.dashboard')); ?>" class=""><i class="icon ion-md-analytics"></i> <?php echo e(__("Vendor Dashboard")); ?></a></li>
                               <?php endif; ?>
                               <li class="<?php if(is_vendor()): ?>  <?php endif; ?>">
                                   <a href="<?php echo e(route('user.profile.index')); ?>"><i class="icon ion-md-construct"></i> <?php echo e(__("My profile")); ?></a>
                               </li>
                               <?php if(setting_item('inbox_enable')): ?>
                                   <li class=""><a href="<?php echo e(route('user.chat')); ?>"><i class="fa fa-comments"></i> <?php echo e(__("Messages")); ?></a></li>
                               <?php endif; ?>
                               <li class=""><a href="<?php echo e(route('user.booking_history')); ?>"><i class="fa fa-clock-o"></i> <?php echo e(__("Booking History")); ?></a></li>
                               <li class=""><a href="<?php echo e(route('user.change_password')); ?>"><i class="fa fa-lock"></i> <?php echo e(__("Change password")); ?></a></li>
                               <?php if(is_admin()): ?>
                                   <li class=""><a href="<?php echo e(url('/admin')); ?>"><i class="icon ion-ios-ribbon"></i> <?php echo e(__("Admin Dashboard")); ?></a></li>
                               <?php endif; ?>
                               <li class="">
                                   <a  href="#" onclick="event.preventDefault(); document.getElementById('logout-form-topbar').submit();"><i class="fa fa-sign-out"></i> <?php echo e(__('Logout')); ?></a>
                               </li>
                           </ul>
                           <form id="logout-form-topbar" action="<?php echo e(route('auth.logout')); ?>" method="POST" style="display: none;">
                               <?php echo e(csrf_field()); ?>

                           </form>
                       </div>
                   <?php endif; ?>
               </div>

           </div>
       </div>
   </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel\modules/Layout/parts/topbar.blade.php ENDPATH**/ ?>