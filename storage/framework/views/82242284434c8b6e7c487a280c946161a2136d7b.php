<?php
$menus = [
    'admin'=>[
        'url'   => 'admin',
        'title' => __("Dashboard"),
        'icon'  => 'icon ion-ios-desktop',
        "position"=>0
    ],
    'review'=>[
        "position"=>50,
        'url'   => 'admin/module/review',
        'title' => __("Reviews"),
        'icon'  => 'icon ion-ios-text',
        'permission' => 'review_manage_others',
    ],
    // 'menu'=>[
    //     "position"=>60,
    //     'url'        => 'admin/module/core/menu',
    //     'title'      => __("Menu"),
    //     'icon'       => 'icon ion-ios-apps',
    //     'permission' => 'menu_view',
    // ],
    // 'template'=>[
    //     "position"=>70,
    //     'url'        => 'admin/module/template',
    //     'title'      => __('Templates'),
    //     'icon'       => 'icon ion-logo-html5',
    //     'permission' => 'template_create',
    // ],
    'general'=>[
        "position"=>80,
        'url'        => 'admin/module/core/settings/index/general',
        'title'      => __('Setting'),
        'icon'       => 'icon ion-ios-cog',
        'permission' => 'setting_update',
        'children'   => \Modules\Core\Models\Settings::getSettingPages()
    ],
    'tools'=>[
        "position"=>90,
        'url'      => 'admin/module/core/tools',
        'title'    => __("Tools"),
        'icon'     => 'icon ion-ios-hammer',
        'children' => [
            'language'=>[
                'url'        => 'admin/module/language',
                'title'      => __('Languages'),
                'icon'       => 'icon ion-ios-globe',
                'permission' => 'language_manage',
            ],
            'translations'=>[
                'url'        => 'admin/module/language/translations',
                'title'      => __("Translation Manager"),
                'icon'       => 'icon ion-ios-globe',
                'permission' => 'language_translation',
            ],
            'logs'=>[
                'url'        => 'admin/logs',
                'title'      => __("System Logs"),
                'icon'       => 'icon ion-ios-nuclear',
                'permission' => 'system_log_view',
            ],
        ]
    ],
];

// Modules
$custom_modules = \Modules\ServiceProvider::getModules();

if(!empty($custom_modules)){
    foreach($custom_modules as $module){
        $moduleClass = "\\Modules\\".ucfirst($module)."\\ModuleProvider";
        if(class_exists($moduleClass))
        {
            $menuConfig = call_user_func([$moduleClass,'getAdminMenu']);

            if(!empty($menuConfig)){
                $menus = array_merge($menus,$menuConfig);
            }
           

            $menuSubMenu = call_user_func([$moduleClass,'getAdminSubMenu']);

            if(!empty($menuSubMenu)){
                foreach($menuSubMenu as $k=>$submenu){
                    $submenu['id'] = $submenu['id'] ?? '_'.$k;

                    if(!empty($submenu['parent']) and isset($menus[$submenu['parent']])){
                        $menus[$submenu['parent']]['children'][$submenu['id']] = $submenu;
                        $menus[$submenu['parent']]['children'] = array_values(\Illuminate\Support\Arr::sort($menus[$submenu['parent']]['children'], function ($value) {
                            return $value['position'] ?? 100;
                        }));
                    }
                }

            }
        }

    }
}

// Plugins Menu
$plugins_modules = \Plugins\ServiceProvider::getModules();
if(!empty($plugins_modules)){
    foreach($plugins_modules as $module){
        $moduleClass = "\\Plugins\\".ucfirst($module)."\\ModuleProvider";
        if(class_exists($moduleClass))
        {
            $menuConfig = call_user_func([$moduleClass,'getAdminMenu']);
            if(!empty($menuConfig)){
                $menus = array_merge($menus,$menuConfig);
            }
            $menuSubMenu = call_user_func([$moduleClass,'getAdminSubMenu']);
            if(!empty($menuSubMenu)){
                foreach($menuSubMenu as $k=>$submenu){
                    $submenu['id'] = $submenu['id'] ?? '_'.$k;
                    if(!empty($submenu['parent']) and isset($menus[$submenu['parent']])){
                        $menus[$submenu['parent']]['children'][$submenu['id']] = $submenu;
                        $menus[$submenu['parent']]['children'] = array_values(\Illuminate\Support\Arr::sort($menus[$submenu['parent']]['children'], function ($value) {
                            return $value['position'] ?? 100;
                        }));
                    }
                }
            }
        }
    }
}

// Custom Menu
$custom_modules = \Custom\ServiceProvider::getModules();
if(!empty($custom_modules)){
    foreach($custom_modules as $module){
        $moduleClass = "\\Custom\\".ucfirst($module)."\\ModuleProvider";
        if(class_exists($moduleClass))
        {
            $menuConfig = call_user_func([$moduleClass,'getAdminMenu']);

            if(!empty($menuConfig)){
                $menus = array_merge($menus,$menuConfig);
            }

            $menuSubMenu = call_user_func([$moduleClass,'getAdminSubMenu']);

            if(!empty($menuSubMenu)){
                foreach($menuSubMenu as $k=>$submenu){
                    $submenu['id'] = $submenu['id'] ?? '_'.$k;
                    if(!empty($submenu['parent']) and isset($menus[$submenu['parent']])){
                        $menus[$submenu['parent']]['children'][$submenu['id']] = $submenu;
                        $menus[$submenu['parent']]['children'] = array_values(\Illuminate\Support\Arr::sort($menus[$submenu['parent']]['children'], function ($value) {
                            return $value['position'] ?? 100;
                        }));
                    }
                }

            }
        }

    }
}

$currentUrl = url(\Modules\Core\Walkers\MenuWalker::getActiveMenu());
$user = \Illuminate\Support\Facades\Auth::user();
if (!empty($menus)){
    foreach ($menus as $k => $menuItem) {

        if (!empty($menuItem['permission']) and !$user->hasPermissionTo($menuItem['permission'])) {
            unset($menus[$k]);
            continue;
        }
        $menus[$k]['class'] = $currentUrl == url($menuItem['url']) ? 'active' : '';
        if (!empty($menuItem['children'])) {
            $menus[$k]['class'] .= ' has-children';
            foreach ($menuItem['children'] as $k2 => $menuItem2) {
                if (!empty($menuItem2['permission']) and !$user->hasPermissionTo($menuItem2['permission'])) {
                    unset($menus[$k]['children'][$k2]);
                    continue;
                }
                $menus[$k]['children'][$k2]['class'] = $currentUrl == url($menuItem2['url']) ? 'active' : '';
            }
        }
    }

    //@todo Sort Menu by Position
    $menus = array_values(\Illuminate\Support\Arr::sort($menus, function ($value) {
        return $value['position'] ?? 100;
    }));
}


?>


<ul class="main-menu">


    <?php 
   
    $adminmenu = array (
        0 => array(
            "url" => "admin", 
            "title" => "Dashboard", 
            "icon" => "icon ion-ios-desktop", 
            "position" => 0, 
            "class" => "" 
        ),
        1 => array (
            "position" => 10,
            "url" => "admin/module/news",
            "title" => "News",
            "icon" => "ion-md-bookmarks",
            "permission" => "news_view",
            "class" => "has-children",
            "children" => array(
            "news_view" => array(
                "url" => "admin/module/news",
                "title" => "All News",
                "permission" => "news_view",
                "class" => "",
            ),
            "news_create" => array(
                "url" => "admin/module/news/create",
                "title" => "Add News",
                "permission" => "news_create",
                "class" => "",
            ),
            "news_categoty" => array(
                "url" => "admin/module/news/category",
                "title" => "Categories",
                "permission" => "news_create",
                "class" => ""
            ),
            "news_tag" => array(
                "url" => "admin/module/news/tag",
                "title" => "Tags",
                "permission" => "news_create",
                "class" => "",
            ),
            ),
        
        ),
        // 2 => array(
        //     "position" => 20,
        //     "url" => "admin/module/page",
        //     "title" => "Page",
        //     "icon" => "icon ion-ios-bookmarks",
        //     "permission" => "page_view",
        //     "class" => "",
        // ),
        3 => array(
            "position" => 30,
            "url" => url('/')."/admin/module/location",
            "title" => "Location",
            "icon" => "icon ion-md-compass",
            "permission" => "location_view",
            "children" => array(
            "tour_view" => array(
                "url" => url('/')."/admin/module/location",
                "title" => "All Location",
                "permission" => "location_view",
                "class" => "",
            ),
            "tour_create" => array(
                "url" => url('/')."/admin/module/location/category",
                "title" => "All Category",
                "permission" => "location_view",
                "class" => "",
            ),
            ),
            "class" => " has-children",
        ),
        // 4 => array(
        //     "position" => 32,
        //     "url" => "admin/module/hotel",
        //     "title" => "Hotel",
        //     "icon" => "fa fa-building-o",
        //     "permission" => "hotel_view",
        //     "children" => array(
        //     "add" => array(
        //         "url" => "admin/module/hotel",
        //         "title" => "All Hotels",
        //         "permission" => "hotel_view",
        //         "class" => "",
        //     ),
        //     "create" => array(
        //         "url" => "admin/module/hotel/create",
        //         "title" => "Add new Hotel",
        //         "permission" => "hotel_create",
        //         "class" => "",
        //     ),
        //     "attribute" => array(
        //         "url" => "admin/module/hotel/attribute",
        //         "title" => "Attributes",
        //         "permission" => "hotel_manage_attributes",
        //         "class" => ""
        //     ),
        //     "room_attribute" => array(
        //         "url" => "admin/module/hotel/room/attribute",
        //         "title" => "Room Attributes",
        //         "permission" => "hotel_manage_attributes",
        //         "class" => "",
        //     ),
        //     "recovery" => array(
        //         "url" => "admin/module/hotel/recovery",
        //         "title" => "Recovery",
        //         "permission" => "hotel_view",
        //         "class" => "",
        //     ),
        //     ),
        //     "class" => " has-children",
        //     ),
        5 => array(
            "position" => 40,
            "url" => "admin/module/tour",
            "title" => "Adventure",
            "icon" => "icon ion-md-umbrella",
            "permission" => "tour_view",
            "children" => array(
            "tour_view" => array(
                "url" => "admin/module/tour",
                "title" => "All Adventures",
                "permission" => "tour_view",
                "class" => "",
            ),
            "tour_create" => array(
                "url" => "admin/module/tour/create",
                "title" => "Add Adventure",
                "permission" => "tour_create",
                "class" => "",
            ),
            "tour_category" => array(
                "url" => "admin/module/tour/category",
                "title" => "Categories",
                "permission" => "tour_manage_others",
                "class" => "",
            ),
            "tour_attribute" => array(
                "url" => "admin/module/tour/attribute",
                "title" => "Attributes",
                "permission" => "tour_manage_attributes",
                "class" => "",
            ),
            "tour_availability" => array(
                "url" => "admin/module/tour/availability",
                "title" => "Availability",
                "permission" => "tour_create",
                "class" => "",
            ),
            "tour_booking" => array(
                "url" => "admin/module/tour/booking",
                "title" => "Booking Calendar",
                "permission" => "tour_create",
                "class" => "",
            ),
            "recovery" => array(
                "url" => "admin/module/tour/recovery",
                "title" => "Recovery",
                "permission" => "tour_view",
                "class" => "",
            ),
            ),
            "class" => " has-children",
        ),
        6 => array(
            "position" => 41,
            "url" => "admin/module/space",
            "title" => "Grooming",
            "icon" => "ion ion-md-home",
            "permission" => "space_view",
            "children" => array(
            "add" => array(
                "url" => "admin/module/space",
                "title" => "All Grooming",
                "permission" => "space_view",
                "class" => "",
            ),
            "create" => array(
                "url" => "admin/module/space/create",
                "title" => "Add new Grooming",
                "permission" => "space_create",
                "class" => "",
            ),
            "attribute" => array(
                "url" => "admin/module/space/attribute",
                "title" => "Attributes",
                "permission" => "space_manage_attributes",
                "class" => "",
            ),
            "availability" => array(
                "url" => "admin/module/space/availability",
                "title" => "Availability",
                "permission" => "space_create",
                "class" => "",
            ),
            "recovery" => array(
                "url" => "admin/module/space/recovery",
                "title" => "Recovery",
                "permission" => "space_view",
                "class" => "",
            ),
            ),
            "class" => " has-children",
            ),
        7 => array(
            "position" => 41,
            "url" => url('/')."/admin/module/flight",
            "title" => "Flight",
            "icon" => "ion ion-md-airplane",
            "permission" => "flight_view",
            "children" => array(
            "add" => array(
                "url" => url('/')."/admin/module/flight",
                "title" => "All Flights",
                "permission" => "flight_view",
                "class" => "",
            ),
            "create" => array(
                "url" => url('/')."/admin/module/flight/create",
                "title" => "Add new Flight",
                "permission" => "flight_create",
                "class" => "",
            ),
            "airline" => array(
                "url" => url('/')."/admin/module/flight/airline",
                "title" => "Airline",
                "class" => "",
            ),
            "airport" => array(
                "url" => url('/')."/admin/module/flight/airport",
                "title" => "Airport",
                "class" => "",
            ),
            "seat_type" => array(
                "url" => url('/')."/admin/module/flight/seat-type",
                "title" => "Seat Type",
                "class" => "",
            ),
            "attribute" => array(
                "url" => url('/')."/admin/module/flight/attribute",
                "title" => "Attributes",
                "permission" => "flight_manage_attributes",
                "class" => "",
            ),
            ),
            "class" => " has-children",
            ),
        8 => array(
            "position" => 45,
            "url" => "admin/module/car",
            "title" => "Car Washing",
            "icon" => "ion-logo-model-s",
            "permission" => "car_view",
            "children" => array(
            "add" => array(
                "url" => "admin/module/car",
                "title" => "All Cars Washing",
                "permission" => "car_view",
                "class" => "",
            ),
            "create" => array(
                "url" => "admin/module/car/create",
                "title" => "Add new Car Washing",
                "permission" => "car_create",
                "class" => "",
            ),
            "attribute" => array(
                "url" => "admin/module/car/attribute",
                "title" => "Attributes",
                "permission" => "car_manage_attributes",
                "class" => "",
            ),
            "availability" => array(
                "url" => "admin/module/car/availability",
                "title" => "Availability",
                "permission" => "car_create",
                "class" => "",
            ),
            "recovery" => array(
                "url" => "admin/module/car/recovery",
                "title" => "Recovery",
                "permission" => "car_view",
                "class" => "",
            ),
            ),
            "class" => " has-children"
            ),
        9 => array(
            "position" => 45,
            "url" => "admin/module/boat",
            "title" => "Boat",
            "icon" => "ion-md-boat",
            "permission" => "boat_view",
            "children" => array(
            "add" => array(
                "url" => "admin/module/boat",
                "title" => "All Boats",
                "permission" => "boat_view",
                "class" => "active",
            ),
            "create" => array(
                "url" => "admin/module/boat/create",
                "title" => "Add new Boat",
                "permission" => "boat_create",
                "class" => "",
            ),
            "attribute" => array(
                "url" => "admin/module/boat/attribute",
                "title" => "Attributes",
                "permission" => "boat_manage_attributes",
                "class" => "",
            ),
            "availability" => array(
                "url" => "admin/module/boat/availability",
                "title" => "Availability",
                "permission" => "boat_create",
                "class" => "",
            ),
            "recovery" => array(
                "url" => "admin/module/boat/recovery",
                "title" => "Recovery",
                "permission" => "boat_view",
                "class" => "",
            ),
            ),
            "class" => "active has-children",
            ),
        10 => array(
            "position" => 50,
            "url" => url('/')."/admin/module/event",
            "title" => "Event",
            "icon" => "ion-ios-calendar",
            "permission" => "event_view",
            "children" => array(
                "add" => array(
                    "url" => url('/')."/admin/module/event",
                    "title" => "All Events",
                    "permission" => "event_view",
                    "class" => "",
                ),
                "create" => array(
                    "url" => url('/')."/admin/module/event/create",
                    "title" => "Add new Event",
                    "permission" => "event_create",
                    "class" => "",
                ),
                "attribute" => array(
                    "url" => url('/')."/admin/module/event/attribute",
                    "title" => "Attributes",
                    "permission" => "event_manage_attributes",
                    "class" => "",
                ),
                "availability" => array(
                    "url" => "admin/module/event/availability",
                    "title" => "Availability",
                    "permission" => "event_create",
                    "class" => "",
                ),
                "recovery" => array(
                    "url" => "admin/module/event/recovery",
                    "title" => "Recovery",
                    "permission" => "event_view",
                    "class" => "",
                )
            ),
            "class" => " has-children"
        ),
        11 => array(
                "position" => 50,
                "url" => "admin/module/review",
                "title" => "Reviews",
                "icon" => "icon ion-ios-text",
                "permission" => "review_manage_others",
                "class" => "",
        ),
        12 => array(
            "position" => 50,
            "title" => "Media",
            "icon" => "fa fa-picture-o",
            "url" => url('/')."/admin/module/media",
            "class" => ""
        ),
        13 => array(
                "position" => 51,
                "url" => url('/')."/admin/module/coupon",
                "title" => "Coupon",
                "icon" => "fa fa-ticket",
                "permission" => "coupon_view",
                "class" => "",
        ),
        // 14 => array(
        //         "position" => 60,
        //         "url" => "admin/module/core/menu",
        //         "title" => "Menu",
        //         "icon" => "icon ion-ios-apps",
        //         "permission" => "menu_view",
        //         "class" => "",
        // ),
        // 15 => array(
        //         "position" => 70,
        //         "url" => "admin/module/template",
        //         "title" => "Templates",
        //         "icon" => "icon ion-logo-html5",
        //         "permission" => "template_create",
        //         "class" => "",
        // ),
        16 => array(
                "position" => 70,
                "url" => "admin/module/vendor/payout",
                "title" => "Payouts ",
                "icon" => "icon ion-md-card",
                "permission" => "user_create",
                "class" => "",
        ),
        17 => array(
                "position" => 80,
                "url" => "admin/module/core/settings/index/general",
                "title" => "Setting",
                "icon" => "icon ion-ios-cog",
                "permission" => "setting_update",
                "children" => array(
                    0 => array(
                        "id" => "general",
                        "title" => "General Settings",
                        "position" => 10,
                        "url" => "admin/module/core/settings/index/general",
                        "name" => "General Settings",
                        "icon" => "",
                        "class" => "",
                    ),
                    1 => array(
                        "id" => "car",
                        "title" => "Car Washing Settings",
                        "position" => 20,
                        "view" => "Car::admin.settings.car",
                        "keys" => array(
                        0 => "car_disable",
                        1 => "car_page_search_title",
                        2 => "car_page_search_banner",
                        3 => "car_layout_search",
                        4 => "car_location_search_style",
                        5 => "car_page_limit_item",
                        6 => "car_enable_review",
                        7 => "car_review_approved",
                        8 => "car_enable_review_after_booking",
                        9 => "car_review_number_per_page",
                        10 => "car_review_stats",
                        11 => "car_page_list_seo_title",
                        12 => "car_page_list_seo_desc",
                        13 => "car_page_list_seo_image",
                        14 => "car_page_list_seo_share",
                        15 => "car_booking_buyer_fees",
                        16 => "car_vendor_create_service_must_approved_by_admin",
                        17 => "car_allow_vendor_can_change_their_booking_status",
                        18 => "car_allow_vendor_can_change_paid_amount",
                        19 => "car_allow_vendor_can_add_service_fee",
                        20 => "car_search_fields",
                        21 => "car_map_search_fields",
                        22 => "car_allow_review_after_making_completed_booking",
                        23 => "car_deposit_enable",
                        24 => "car_deposit_type",
                        25 => "car_deposit_amount",
                        26 => "car_deposit_fomular",
                        27 => "car_layout_map_option",
                        28 => "car_icon_marker_map",
                        ),
                        "html_keys" => [],
                        "url" => "admin/module/core/settings/index/car",
                        "name" => "Car Settings",
                        "icon" => "",
                        "class" => "",
                    ),
                    2 => array(
                        "id" => "tour",
                        "title" => "Adventure Settings",
                        "position" => 20,
                        "view" => "Tour::admin.settings.tour",
                        "keys" => array(
                            0 => "tour_disable"
                            ,1 => "tour_page_search_title"
                            ,2 => "tour_page_search_banner"
                            ,3 => "tour_layout_search"
                            ,4 => "tour_location_search_style"
                            ,5 => "tour_page_limit_item"
                            ,6 => "tour_enable_review"
                            ,7 => "tour_review_approved"
                            ,8 => "tour_enable_review_after_booking"
                            ,9 => "tour_review_number_per_page"
                            ,10 => "tour_review_stats"
                            ,11 => "tour_page_list_seo_title"
                            ,12 => "tour_page_list_seo_desc"
                            ,13 => "tour_page_list_seo_image"
                            ,14 => "tour_page_list_seo_share"
                            ,15 => "tour_booking_buyer_fees"
                            ,16 => "tour_vendor_create_service_must_approved_by_admin"
                            ,17 => "tour_allow_vendor_can_change_their_booking_status"
                            ,18 => "tour_allow_vendor_can_change_paid_amount"
                            ,19 => "tour_allow_vendor_can_add_service_fee"
                            ,20 => "tour_search_fields"
                            ,21 => "tour_map_search_fields"
                            ,22 => "tour_allow_review_after_making_completed_booking"
                            ,23 => "tour_deposit_enable"
                            ,24 => "tour_deposit_type"
                            ,25 => "tour_deposit_amount"
                            ,26 => "tour_deposit_fomular"
                            ,27 => "tour_layout_map_option"
                            ,28 => "tour_icon_marker_map"
                        ),
                        "html_keys" => []
                        ,"url" => "admin/module/core/settings/index/tour"
                        ,"name" => "Adventure Settings"
                        ,"icon" => ""
                        ,"class" => ""
                    ),
                    3 => array(
                        "id" => "space"
                        ,"title" => "Grooming Settings"
                        ,"position" => 20
                        ,"view" => "Space::admin.settings.space"
                        ,"keys" => array(
                            0 => "space_disable"
                            ,1 => "space_page_search_title"
                            ,2 => "space_page_search_banner"
                            ,3 => "space_layout_search"
                            ,4 => "space_location_search_style"
                            ,5 => "space_page_limit_item"
                            ,6 => "space_enable_review"
                            ,7 => "space_review_approved"
                            ,8 => "space_enable_review_after_booking"
                            ,9 => "space_review_number_per_page"
                            ,10 => "space_review_stats"
                            ,11 => "space_page_list_seo_title"
                            ,12 => "space_page_list_seo_desc"
                            ,13 => "space_page_list_seo_image"
                            ,14 => "space_page_list_seo_share"
                            ,15 => "space_booking_buyer_fees"
                            ,16 => "space_vendor_create_service_must_approved_by_admin"
                            ,17 => "space_allow_vendor_can_change_their_booking_status"
                            ,18 => "space_allow_vendor_can_change_paid_amount"
                            ,19 => "space_allow_vendor_can_add_service_fee"
                            ,20 => "space_search_fields"
                            ,21 => "space_map_search_fields"
                            ,22 => "space_allow_review_after_making_completed_booking"
                            ,23 => "space_deposit_enable"
                            ,24 => "space_deposit_type"
                            ,25 => "space_deposit_amount"
                            ,26 => "space_deposit_fomular"
                            ,27 => "space_layout_map_option"
                            ,28 => "space_icon_marker_map"
                            ,29 => "space_booking_type"
                            ),
                            "html_keys" => [],
                            "url" => "admin/module/core/settings/index/space",
                            "name" => "Grooming Settings",
                            "icon" => "",
                            "class" => "",
                    ),
                    // 4 => array(
                    //     "id" => "hotel"
                    //     ,"title" => "Hotel Settings"
                    //     ,"position" => 20
                    //     ,"view" => "Hotel::admin.settings.hotel"
                    //     ,"keys" => array(
                    //         0 => "hotel_disable"
                    //         ,1 => "hotel_page_search_title"
                    //         ,2 => "hotel_page_search_banner"
                    //         ,3 => "hotel_layout_search"
                    //         ,4 => "hotel_layout_item_search"
                    //         ,5 => "hotel_attribute_show_in_listing_page"
                    //         ,6 => "hotel_location_search_style"
                    //         ,7 => "hotel_page_limit_item"
                    //         ,8 => "hotel_enable_review"
                    //         ,9 => "hotel_review_approved"
                    //         ,10 => "hotel_enable_review_after_booking"
                    //         ,11 => "hotel_review_number_per_page"
                    //         ,12 => "hotel_review_stats"
                    //         ,13 => "hotel_page_list_seo_title"
                    //         ,14 => "hotel_page_list_seo_desc"
                    //         ,15 => "hotel_page_list_seo_image"
                    //         ,16 => "hotel_page_list_seo_share"
                    //         ,17 => "hotel_booking_buyer_fees"
                    //         ,18 => "hotel_vendor_create_service_must_approved_by_admin"
                    //         ,19 => "hotel_allow_vendor_can_change_their_booking_status"
                    //         ,20 => "hotel_allow_vendor_can_change_paid_amount"
                    //         ,21 => "hotel_allow_vendor_can_add_service_fee"
                    //         ,22 => "hotel_search_fields"
                    //         ,23 => "hotel_map_search_fields"
                    //         ,24 => "hotel_allow_review_after_making_completed_booking"
                    //         ,25 => "hotel_deposit_enable"
                    //         ,26 => "hotel_deposit_type"
                    //         ,27 => "hotel_deposit_amount"
                    //         ,28 => "hotel_deposit_fomular"
                    //         ,29 => "hotel_layout_map_option"
                    //         ,30 => "hotel_icon_marker_map"
                    //     ),
                    //     "html_keys" => [],
                    //     "url" => "admin/module/core/settings/index/hotel",
                    //     "name" => "Hotel Settings",
                    //     "icon" => "",
                    //     "class" => "",
                    // ),
                    5 => array(
                        "id" => "flight",
                        "title" => "Flight Settings",
                        "position" => 20,
                        "view" => "Flight::admin.settings.setting",
                        "keys" => array(
                        0 => "flight_disable"
                        ,1 => "flight_page_search_title"
                        ,2 => "flight_page_search_banner"
                        ,3 => "flight_layout_search"
                        ,4 => "flight_location_search_style"
                        ,5 => "flight_page_limit_item"
                        ,6 => "flight_enable_review"
                        ,7 => "flight_review_approved"
                        ,8 => "flight_enable_review_after_booking"
                        ,9 => "flight_review_number_per_page"
                        ,10 => "flight_review_stats"
                        ,11 => "flight_page_list_seo_title"
                        ,12 => "flight_page_list_seo_desc"
                        ,13 => "flight_page_list_seo_image"
                        ,14 => "flight_page_list_seo_share"
                        ,15 => "flight_booking_buyer_fees"
                        ,16 => "flight_vendor_create_service_must_approved_by_admin"
                        ,17 => "flight_allow_vendor_can_change_their_booking_status"
                        ,18 => "flight_allow_vendor_can_change_paid_amount"
                        ,19 => "flight_allow_vendor_can_add_service_fee"
                        ,20 => "flight_search_fields"
                        ,21 => "flight_map_search_fields"
                        ,22 => "flight_allow_review_after_making_completed_booking"
                        ,23 => "flight_deposit_enable"
                        ,24 => "flight_deposit_type"
                        ,25 => "flight_deposit_amount"
                        ,26 => "flight_deposit_fomular"
                        ,27 => "flight_layout_map_option"
                        ,28 => "flight_icon_marker_map"
                        ,29 => "flight_booking_type"
                        ),
                        "html_keys" => [],
                        "url" => "admin/module/core/settings/index/flight",
                        "name" => "Flight Settings",
                        "icon" => "",
                        "class" => "",
                    ),
                    // 6 => array(
                    //     "id" => "event"
                    //     ,"title" => "Event Settings"
                    //     ,"position" => 20
                    //     ,"view" => "Event::admin.settings.event"
                    //     ,"keys" => array(
                    //     0 => "event_disable"
                    //     ,1 => "event_page_search_title"
                    //     ,2 => "event_page_search_banner"
                    //     ,3 => "event_layout_search"
                    //     ,4 => "event_location_search_style"
                    //     ,5 => "event_page_limit_item"
                    //     ,6 => "event_enable_review"
                    //     ,7 => "event_review_approved"
                    //     ,8 => "event_enable_review_after_booking"
                    //     ,9 => "event_review_number_per_page"
                    //     ,10 => "event_review_stats"
                    //     ,11 => "event_page_list_seo_title"
                    //     ,12 => "event_page_list_seo_desc"
                    //     ,13 => "event_page_list_seo_image"
                    //     ,14 => "event_page_list_seo_share"
                    //     ,15 => "event_booking_buyer_fees"
                    //     ,16 => "event_vendor_create_service_must_approved_by_admin"
                    //     ,17 => "event_allow_vendor_can_change_their_booking_status"
                    //     ,18 => "event_allow_vendor_can_change_paid_amount"
                    //     ,19 => "event_allow_vendor_can_add_service_fee"
                    //     ,20 => "event_search_fields"
                    //     ,21 => "event_map_search_fields"
                    //     ,22 => "event_allow_review_after_making_completed_booking"
                    //     ,23 => "event_deposit_enable"
                    //     ,24 => "event_deposit_type"
                    //     ,25 => "event_deposit_amount"
                    //     ,26 => "event_deposit_fomular"
                    //     ,27 => "event_layout_map_option"
                    //     ,28 => "event_booking_type"
                    //     ,29 => "event_icon_marker_map"
                    //     ),
                    //     "html_keys" => [],
                    //     "url" => "admin/module/core/settings/index/event",
                    //     "name" => "Event Settings",
                    //     "icon" => "",
                    //     "class" => "",
                    // ),
                    // 7 => array(
                    //     "id" => "boat"
                    //     ,"title" => "Boat Settings"
                    //     ,"position" => 20
                    //     ,"view" => "Boat::admin.settings.boat"
                    //     ,"keys" => array(
                    //     0 => "boat_disable"
                    //     ,1 => "boat_page_search_title"
                    //     ,2 => "boat_page_search_banner"
                    //     ,3 => "boat_layout_search"
                    //     ,4 => "boat_location_search_style"
                    //     ,5 => "boat_page_limit_item"
                    //     ,6 => "boat_enable_review"
                    //     ,7 => "boat_review_approved"
                    //     ,8 => "boat_enable_review_after_booking"
                    //     ,9 => "boat_review_number_per_page"
                    //     ,10 => "boat_review_stats"
                    //     ,11 => "boat_page_list_seo_title"
                    //     ,12 => "boat_page_list_seo_desc"
                    //     ,13 => "boat_page_list_seo_image"
                    //     ,14 => "boat_page_list_seo_share"
                    //     ,15 => "boat_booking_buyer_fees"
                    //     ,16 => "boat_vendor_create_service_must_approved_by_admin"
                    //     ,17 => "boat_allow_vendor_can_change_their_booking_status"
                    //     ,18 => "boat_allow_vendor_can_change_paid_amount"
                    //     ,19 => "boat_allow_vendor_can_add_service_fee"
                    //     ,20 => "boat_search_fields"
                    //     ,21 => "boat_map_search_fields"
                    //     ,22 => "boat_allow_review_after_making_completed_booking"
                    //     ,23 => "boat_deposit_enable"
                    //     ,24 => "boat_deposit_type"
                    //     ,25 => "boat_deposit_amount"
                    //     ,26 => "boat_deposit_fomular"
                    //     ,27 => "boat_layout_map_option"
                    //     ,28 => "boat_icon_marker_map"
                    //     ,29 => "boat_map_lat_default"
                    //     ,30 => "boat_map_lng_default"
                    //     ,31 => "boat_map_zoom_default"
                    //     ),
                    //     "html_keys" => [],
                    //     "filter_demo_mode" => [],
                    //     "url" => "admin/module/core/settings/index/boat",
                    //     "name" => "Boat Settings",
                    //     "icon" => "",
                    //     "class" => "",
                    // ),
                    8 => array(
                        "id" => "news",
                        "title" => "News Settings",
                        "position" => 30,
                        "view" => "News::admin.settings.news",
                        "keys" => array(
                        0 => "news_page_list_title"
                        ,1 => "news_page_list_banner"
                        ,2 => "news_sidebar"
                        ,3 => "news_page_list_seo_title"
                        ,4 => "news_page_list_seo_desc"
                        ,5 => "news_page_list_seo_image"
                        ,6 => "news_page_list_seo_share"
                        ),
                        "html_keys" => [],
                        "url" => "admin/module/core/settings/index/news",
                        "name" => "News Settings",
                        "icon" => "",
                        "class" => "",
                    ),
                    9 => array(
                        "id" => "booking"
                        ,"title" => "Booking Settings"
                        ,"position" => 40
                        ,"view" => "Booking::admin.settings.booking"
                        ,"keys" => array(
                        0 => "booking_enable_recaptcha"
                        ,1 => "booking_term_conditions"
                        ,2 => "email_footer"
                        ,3 => "email_header"
                        ,4 => "logo_invoice_id"
                        ,5 => "invoice_company_info"
                        ,6 => "booking_guest_checkout"
                        ,7 => "booking_why_book_with_us"
                        ),
                        "html_keys" => [],
                        "filter_demo_mode" => array(
                                0 => "booking_term_conditions",
                                1 => "email_footer",
                                2 => "email_header",
                                3 => "invoice_company_info"
                            ),
                        "url" => "admin/module/core/settings/index/booking",
                        "name" => "Booking Settings",
                        "icon" => "",
                        "class" => "",
                        ),
                    10 => array(
                        "id" => "enquiry",
                        "title" => "Enquiry Settings",
                        "position" => 41,
                        "view" => "Booking::admin.settings.enquiry",
                        "keys" => array(
                        0 => "booking_enquiry_for_hotel"
                        ,1 => "booking_enquiry_for_tour"
                        ,2 => "booking_enquiry_for_space"
                        ,3 => "booking_enquiry_for_car"
                        ,4 => "booking_enquiry_for_event"
                        ,5 => "booking_enquiry_type"
                        ,6 => "booking_enquiry_enable_mail_to_vendor"
                        ,7 => "booking_enquiry_mail_to_vendor_content"
                        ,8 => "booking_enquiry_enable_mail_to_admin"
                        ,9 => "booking_enquiry_mail_to_admin_content"
                        ,10 => "booking_enquiry_enable_recaptcha"
                        ),
                        "html_keys" => [],
                        "filter_demo_mode" => array(
                            0 => "booking_enquiry_mail_to_vendor_content",
                            1 => "booking_enquiry_mail_to_admin_content"
                            ),
                        "url" => "admin/module/core/settings/index/enquiry"
                        ,"name" => "Enquiry Settings"
                        ,"icon" => ""
                        ,"class" => ""
                    ),
                    11 => array(
                        "id" => "user",
                        "title" => "User Settings",
                        "position" => 50,
                        "view" => "User::admin.settings.user",
                        "keys" => array(
                        0 => "user_enable_login_recaptcha"
                        ,1 => "user_enable_register_recaptcha"
                        ,2 => "enable_mail_user_registered"
                        ,3 => "user_content_email_registered"
                        ,4 => "admin_enable_mail_user_registered"
                        ,5 => "admin_content_email_user_registered"
                        ,6 => "user_content_email_forget_password"
                        ,7 => "inbox_enable"
                        ,8 => "subject_email_verify_register_user"
                        ,9 => "content_email_verify_register_user"
                        ,10 => "user_disable_verification_feature"
                        ,11 => "enable_verify_email_register_user"
                        ),
                        "html_keys" => [],
                        "url" => "admin/module/core/settings/index/user",
                        "name" => "User Settings",
                        "icon" => "",
                        "class" => "",
                    ),
                    12 => array(
                        "id" => "wallet"
                        ,"title" => "Wallet Settings"
                        ,"position" => 50
                        ,"view" => "User::admin.settings.wallet"
                        ,"keys" => array(
                        0 => "wallet_module_disable"
                        ,1 => "wallet_credit_exchange_rate"
                        ,2 => "wallet_deposit_type"
                        ,3 => "wallet_deposit_rate"
                        ,4 => "wallet_deposit_lists"
                        ,5 => "wallet_new_deposit_admin_subject"
                        ,6 => "wallet_new_deposit_admin_content"
                        ,7 => "wallet_new_deposit_customer_subject"
                        ,8 => "wallet_new_deposit_customer_content"
                        ,9 => "wallet_update_deposit_admin_subject"
                        ,10 => "wallet_update_deposit_admin_content"
                        ,11 => "wallet_update_deposit_customer_subject"
                        ,12 => "wallet_update_deposit_customer_content"
                        ),
                        "html_keys" => []
                        ,"url" => "admin/module/core/settings/index/wallet"
                        ,"name" => "Wallet Settings"
                        ,"icon" => ""
                        ,"class" => ""
                    ),
                    13 => array(
                        "id" => "vendor"
                        ,"title" => "Vendor Settings"
                        ,"position" => 50
                        ,"view" => "Vendor::admin.settings.vendor"
                        ,"keys" => array(
                        0 => "vendor_enable"
                        ,1 => "vendor_commission_type"
                        ,2 => "vendor_commission_amount"
                        ,3 => "vendor_auto_approved"
                        ,4 => "vendor_role"
                        ,5 => "vendor_show_email"
                        ,6 => "vendor_show_phone"
                        ,7 => "vendor_payout_methods"
                        ,8 => "vendor_payout_booking_status"
                        ,9 => "vendor_term_conditions"
                        ,10 => "disable_payout"
                        ,11 => "enable_mail_vendor_registered"
                        ,12 => "vendor_content_email_registered"
                        ,13 => "admin_enable_mail_vendor_registered"
                        ,14 => "admin_content_email_vendor_registered"
                        ),
                        "html_keys" => [],
                        "filter_values_callback" => array(
                        0 => "Modules\Vendor\SettingClass",
                        1 => "filterValuesBeforeSaving"
                        ),
                        "url" => "admin/module/core/settings/index/vendor"
                        ,"name" => "Vendor Settings"
                        ,"icon" => ""
                        ,"class" => ""
                    ),
                    14 => array(
                        "id" => "payment"
                        ,"title" => "Payment Settings"
                        ,"position" => 60
                        ,"view" => "Booking::admin.settings.payment"
                        ,"keys" => array(
                        0 => "currency_main"
                        ,1 => "currency_format"
                        ,2 => "currency_decimal"
                        ,3 => "currency_thousand"
                        ,4 => "currency_no_decimal"
                        ,5 => "extra_currency"
                        ,6 => "g_offline_payment_enable"
                        ,7 => "g_offline_payment_name"
                        ,8 => "g_offline_payment_name_ja"
                        ,9 => "g_offline_payment_name_egy"
                        ,10 => "g_offline_payment_logo_id"
                        ,11 => "g_offline_payment_payment_note"
                        ,12 => "g_offline_payment_payment_note_ja"
                        ,13 => "g_offline_payment_payment_note_egy"
                        ,14 => "g_offline_payment_html"
                        ,15 => "g_offline_payment_html_ja"
                        ,16 => "g_offline_payment_html_egy"
                        ,17 => "g_paypal_enable"
                        ,18 => "g_paypal_name"
                        ,19 => "g_paypal_name_ja"
                        ,20 => "g_paypal_name_egy"
                        ,21 => "g_paypal_logo_id"
                        ,22 => "g_paypal_html"
                        ,23 => "g_paypal_html_ja"
                        ,24 => "g_paypal_html_egy"
                        ,25 => "g_paypal_test"
                        ,26 => "g_paypal_convert_to"
                        ,27 => "g_paypal_exchange_rate"
                        ,28 => "g_paypal_test_account"
                        ,29 => "g_paypal_test_client_id"
                        ,30 => "g_paypal_test_client_secret"
                        ,31 => "g_paypal_account"
                        ,32 => "g_paypal_client_id"
                        ,33 => "g_paypal_client_secret"
                        ,34 => "g_stripe_enable"
                        ,35 => "g_stripe_name"
                        ,36 => "g_stripe_name_ja"
                        ,37 => "g_stripe_name_egy"
                        ,38 => "g_stripe_logo_id"
                        ,39 => "g_stripe_html"
                        ,40 => "g_stripe_html_ja"
                        ,41 => "g_stripe_html_egy"
                        ,42 => "g_stripe_stripe_secret_key"
                        ,43 => "g_stripe_stripe_publishable_key"
                        ,44 => "g_stripe_stripe_enable_sandbox"
                        ,45 => "g_stripe_stripe_test_secret_key"
                        ,46 => "g_stripe_stripe_test_publishable_key"
                        ,47 => "g_two_checkout_gateway_enable"
                        ,48 => "g_two_checkout_gateway_name"
                        ,49 => "g_two_checkout_gateway_name_ja"
                        ,50 => "g_two_checkout_gateway_name_egy"
                        ,51 => "g_two_checkout_gateway_logo_id"
                        ,52 => "g_two_checkout_gateway_html"
                        ,53 => "g_two_checkout_gateway_html_ja"
                        ,54 => "g_two_checkout_gateway_html_egy"
                        ,55 => "g_two_checkout_gateway_twocheckout_account_number"
                        ,56 => "g_two_checkout_gateway_twocheckout_secret_word"
                        ,57 => "g_two_checkout_gateway_twocheckout_enable_sandbox"
                        ),
                        "html_keys" => [],
                        "url" => "admin/module/core/settings/index/payment",
                        "name" => "Payment Settings",
                        "icon" => "",
                        "class" => "",
                    ),
                    15 => array(
                        "id" => "style",
                        "title" => "Style Settings",
                        "position" => 70,
                        "url" => "admin/module/core/settings/index/style",
                        "name" => "Style Settings",
                        "icon" => "",
                        "class" => "",
                    ),
                    16 => array(
                        "id" => "advance"
                        ,"title" => "Advance Settings"
                        ,"position" => 80
                        ,"view" => "Core::admin.settings.groups.advance"
                        ,"keys" => array(
                            0 => "map_provider",
                            1 => "map_gmap_key"
                            ,2 => "google_client_secret"
                            ,3 => "google_client_id"
                            ,4 => "google_enable"
                            ,5 => "facebook_client_secret"
                            ,6 => "facebook_client_id"
                            ,7 => "facebook_enable"
                            ,8 => "twitter_enable"
                            ,9 => "twitter_client_id"
                            ,10 => "twitter_client_secret"
                            ,11 => "recaptcha_enable"
                            ,12 => "recaptcha_api_key"
                            ,13 => "recaptcha_api_secret"
                            ,14 => "head_scripts"
                            ,15 => "body_scripts"
                            ,16 => "footer_scripts"
                            ,17 => "size_unit"
                            ,18 => "cookie_agreement_enable"
                            ,19 => "cookie_agreement_button_text"
                            ,20 => "cookie_agreement_content"
                            ,21 => "broadcast_driver"
                            ,22 => "pusher_api_key"
                            ,23 => "pusher_api_secret"
                            ,24 => "pusher_app_id"
                            ,25 => "pusher_cluster"
                        ),
                        "filter_demo_mode" => array(
                            0 => "head_scripts",
                            1 => "body_scripts",
                            2 => "footer_scripts",
                            3 => "cookie_agreement_content",
                            4 => "cookie_agreement_button_text",
                        ),
                        "url" => "admin/module/core/settings/index/advance"
                        ,"name" => "Advance Settings"
                        ,"icon" => ""
                        ,"class" => ""
                        ),
                    17 => array(
                        "id" => "email"
                        ,"title" => "Email Settings"
                        ,"position" => 90
                        ,"view" => "Email::admin.settings.email"
                        ,"keys" => array(
                        0 => "email_driver"
                        ,1 => "email_host"
                        ,2 => "email_port"
                        ,3 => "email_encryption"
                        ,4 => "email_username"
                        ,5 => "email_password"
                        ,6 => "email_mailgun_domain"
                        ,7 => "email_mailgun_secret"
                        ,8 => "email_mailgun_endpoint"
                        ,9 => "email_postmark_token"
                        ,10 => "email_ses_key"
                        ,11 => "email_ses_secret"
                        ,12 => "email_ses_region"
                        ,13 => "email_sparkpost_secret"
                        ,14 => "email_footer"
                        ,15 => "email_header"
                        ),
                        "html_keys" => [],
                        "url" => "admin/module/core/settings/index/email",
                        "name" => "Email Settings",
                        "icon" => "",
                        "class" => "",
                    ),
                    18 => array(
                        "id" => "sms",
                        "title" => "Sms Settings",
                        "position" => 100,
                        "view" => "Sms::admin.settings.sms",
                        "keys" => array(
                        0 => "sms_driver"
                        ,1 => "sms_nexmo_api_key"
                        ,2 => "sms_nexmo_api_secret"
                        ,3 => "sms_nexmo_api_from"
                        ,4 => "sms_twilio_api_from"
                        ,5 => "sms_twilio_account_sid"
                        ,6 => "sms_twilio_account_token"
                        ,7 => "admin_phone_has_booking"
                        ,8 => "admin_country_has_booking"
                        ,9 => "enable_sms_admin_has_booking"
                        ,10 => "sms_message_admin_when_booking"
                        ,11 => "enable_sms_vendor_has_booking"
                        ,12 => "sms_message_vendor_when_booking"
                        ,13 => "enable_sms_user_has_booking"
                        ,14 => "sms_message_user_when_booking"
                        ,15 => "enable_sms_admin_update_booking"
                        ,16 => "sms_message_admin_update_booking"
                        ,17 => "enable_sms_vendor_update_booking"
                        ,18 => "sms_message_vendor_update_booking"
                        ,19 => "enable_sms_user_update_booking"
                        ,20 => "sms_message_user_update_booking"
                        ),
                        "html_keys" => []
                        ,"url" => "admin/module/core/settings/index/sms"
                        ,"name" => "Sms Settings"
                        ,"icon" => ""
                        ,"class" => ""
                    ),
                    // 19 => array(
                    //     "id" => "api"
                    //     ,"title" => "Mobile App Settings"
                    //     ,"position" => 130
                    //     ,"view" => "Api::admin.settings.api"
                    //     ,"keys" => array(
                    //     0 => "api_app_layout"
                    //     ),
                    //     "url" => "admin/module/core/settings/index/api"
                    //     ,"name" => "Mobile App Settings"
                    //     ,"icon" => ""
                    //     ,"class" => ""
                    // ),
                    20 => array(
                        "id" => "review",
                        "title" => "Review Advance Settings",
                        "position" => 140,
                        "view" => "Review::admin.settings.review",
                        "keys" => [
                            0 => "review_upload_picture"
                        ]
                        ,"url" => "admin/module/core/settings/index/review"
                        ,"name" => "Review Advance Settings"
                        ,"icon" => ""
                        ,"class" => ""
                    ),
                ),
                "class" => " has-children"
        ),
        18 => array(
                "position" => 90
                ,"url" => "admin/module/core/tools"
                ,"title" => "Tools"
                ,"icon" => "icon ion-ios-hammer"
                ,"children" => array(
                    0 => array(
                        "url" => "admin/module/language"
                        ,"title" => "Languages"
                        ,"icon" => "icon ion-ios-globe"
                        ,"permission" => "language_manage"
                        ,"class" => ""
                    ),
                    1 => array(
                        "url" => "admin/module/language/translations"
                        ,"title" => "Translation Manager"
                        ,"icon" => "icon ion-ios-globe"
                        ,"permission" => "language_translation"
                        ,"class" => ""
                    ),
                    2 => array(
                        "url" => "admin/logs"
                        ,"title" => "System Logs"
                        ,"icon" => "icon ion-ios-nuclear"
                        ,"permission" => "system_log_view"
                        ,"class" => ""
                    ),
                    // 3 => array(
                    //     "id" => "plugin"
                    //     ,"parent" => "tools"
                    //     ,"title" => "Plugins"
                    //     ,"url" => "admin/module/core/plugins"
                    //     ,"icon" => "icon ion-md-color-wand"
                    //     ,"permission" => "plugin_manage"
                    //     ,"class" => ""
                    // ),
                ),
                "class" => " has-children"
        ),
        19 => array(
                "position" => 100
                ,"url" => "admin/module/user"
                ,"title" => "Users "
                ,"icon" => "icon ion-ios-contacts"
                ,"permission" => "user_view"
                ,"children" => array(
                    "user" => array(
                        "url" => "admin/module/user"
                        ,"title" => "All Users"
                        ,"icon" => "fa fa-user"
                        ,"class" => ""
                    ),
                    "role" => array(
                        "url" => "admin/module/user/role"
                        ,"title" => "Role Manager"
                        ,"permission" => "role_view"
                        ,"icon" => "fa fa-lock"
                        ,"class" => ""
                    ),
                    "subscriber" => array(
                        "url" => "admin/module/user/subscriber"
                        ,"title" => "Subscribers"
                        ,"permission" => "newsletter_manage"
                        ,"class" => ""
                    ),
                    "userUpgradeRequest" => array(
                        "url" => "admin/module/user/userUpgradeRequest"
                        ,"title" => "Upgrade Request "
                        ,"permission" => "user_view"
                        ,"class" => ""
                    ),
                    "user_verification" => array(
                        "url" => "admin/module/user/verification",
                        "title" => "Verification Request ",
                        "permission" => "user_view",
                        "class" => "",
                    ),
                ),
                "class" => " has-children"
        ),
        20 => array(
                "position" => 110
                ,"url" => "admin/module/report/booking"
                ,"title" => "Reports "
                ,"icon" => "icon ion-ios-pie"
                ,"permission" => "report_view"
                ,"children" => array(
                "enquiry" => array(
                    "url" => "admin/module/report/enquiry"
                    ,"title" => "Enquiry Reports"
                    ,"icon" => "icon ion-ios-pricetags"
                    ,"permission" => "report_view"
                    ,"class" => ""
                ),
                "booking" => array(
                    "url" => "admin/module/report/booking"
                    ,"title" => "Booking Reports"
                    ,"icon" => "icon ion-ios-pricetags"
                    ,"permission" => "report_view"
                    ,"class" => ""
                ),
                "statistic" => array(
                    "url" => "admin/module/report/statistic"
                    ,"title" => "Booking Statistic"
                    ,"icon" => "icon ion ion-md-podium"
                    ,"permission" => "report_view"
                    ,"class" => ""
                ),
                "contact" => array(
                    "url" => "admin/module/contact"
                    ,"title" => "Contact Submissions"
                    ,"icon" => "icon ion ion-md-mail"
                    ,"permission" => "contact_manage"
                    ,"class" => ""
                ),
                "buy_credit_report" => array(
                    "parent" => "report"
                    ,"url" => url('/')."/admin/module/user/wallet/report"
                    ,"title" => "Credit Purchase Report "
                    ,"icon" => "fa fa-money"
                    ,"class" => ""
                ),
                ),
                "class" => " has-children",
        ),
    );
    ?>
    <?php $__currentLoopData = $adminmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($menuItem['title'] !='Boat' && $menuItem['title']!='Event'  && $menuItem['title']!='Hotel'): ?>
        
<!-- 
        <?php 
           $menuItem['title'] = str_replace('Space', 'Grooming', $menuItem['title']);
           $menuItem['title'] = str_replace('All Spaces', 'All Grooming', $menuItem['title']);
        ?>

        <?php 
           $menuItem['title'] = str_replace('Tour', 'Adventure', $menuItem['title']);
           $menuItem['title'] = str_replace('All Spaces', 'All Grooming', $menuItem['title']);
        ?> -->




        <?php $menuItem['class'] .= " ".str_ireplace("/","_",$menuItem['url']) ?>
        <li class="<?php echo e($menuItem['class']); ?>"><a href="<?php echo e(url($menuItem['url'])); ?>">
                <?php if(!empty($menuItem['icon'])): ?>
                    <span class="icon text-center"><i class="<?php echo e($menuItem['icon']); ?>"></i></span>
                <?php endif; ?>
                <?php echo clean($menuItem['title'],[
                    'Attr.AllowedClasses'=>null
                ]); ?>

            </a>
            <?php if(!empty($menuItem['children'])): ?>
                <span class="btn-toggle"><i class="fa fa-angle-left pull-right"></i></span>
                <ul class="children">
                    <?php $__currentLoopData = $menuItem['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="<?php echo e($menuItem['class']); ?>"><a href="<?php echo e(url($menuItem2['url'])); ?>">
                                <?php if(!empty($menuItem2['icon'])): ?>
                                    <i class="<?php echo e($menuItem2['icon']); ?>"></i>
                                <?php endif; ?>
                                <?php echo clean($menuItem2['title'],[
                                    'Attr.AllowedClasses'=>null
                                ]); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endif; ?>    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH C:\APPS\htdocs\mytravel\modules/Layout/admin/parts/sidebar.blade.php ENDPATH**/ ?>