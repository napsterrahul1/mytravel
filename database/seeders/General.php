<?php
namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Media\Models\MediaFile;

class General extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Setting header,footer
        $menu_items_en = $this->generalMenu();
        DB::table('core_menus')->insert([
            'name'        => 'Main Menu',
            'items'       => json_encode($menu_items_en),
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        $menu_items_ja = $this->generalMenu("/ja");
        DB::table('core_menu_translations')->insert([
            'origin_id'   => '1',
            'locale'      => 'ja',
            'items'       =>json_encode($menu_items_ja),
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        $menu_items_egy = $this->generalMenu("/egy");
        DB::table('core_menu_translations')->insert([
            'origin_id'   => '1',
            'locale'      => 'egy',
            'items'       =>json_encode($menu_items_egy),
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_settings')->insert(
            [
                [
                    'name'  => 'menu_locations',
                    'val'   => '{"primary":1}',
                    'group' => "general",
                ],
                [
                    'name'  => 'admin_email',
                    'val'   => 'contact@OneClickSolution.com',
                    'group' => "general",
                ], [
                    'name'  => 'email_from_name',
                    'val'   => 'OneClickSolution',
                    'group' => "general",
                ], [
                    'name'  => 'email_from_address',
                    'val'   => 'contact@OneClickSolution.com',
                    'group' => "general",
                ],
                [
                    'name'  => 'phone_contact',
                    'val'   => '(+84) 666-888-999',
                    'group' => "general",
                ],
                [
                    'name'  => 'logo_id',
                    'val'   => MediaFile::findMediaByName("logo-white")->id,
                    'group' => "general",
                ],
                [
                    'name'  => 'logo_id_2',
                    'val'   => MediaFile::findMediaByName("logo")->id,
                    'group' => "general",
                ],
                [
                    'name'  => 'logo_text',
                    'val'   => 'OneClickSolution',
                    'group' => "general",
                ],
                [
                    'name'  => 'site_favicon',
                    'val'   => MediaFile::findMediaByName("favicon")->id,
                    'group' => "general",
                ],
                [
                    'name'  => 'topbar_left_text',
                    'val'   => '<div class="socials">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-linkedin"></i></a>
<a href="#"><i class="fa fa-google-plus"></i></a>
</div>
<span class="line"></span>
<a href="mailto:contact@mytravel.com">contact@mytravel.com</a>',
                    'group' => "general",
                ],
                [
                    'name'  => 'footer_info_text',
                    'val'   => '<div class="d-md-flex d-lg-block">
    <div class="mb-5 mr-md-7 mr-lg-0">
        <h4 class="h6 mb-4 font-weight-bold">Need OneClickSolution Help?</h4>
        <a href="tel:(+84) 666-888-999">
            <div class="d-flex align-items-center">
                <div class="mr-4">
                    <i class="fa fa-phone font-size-50" aria-hidden="true"></i>
                </div>
                <div>
                    <div class="mb-2 h6 font-weight-normal text-gray-1">Got Questions ? Call us 24/7</div>
                    <small class="d-block font-size-16 font-weight-normal text-primary">Call Us: <span class="text-primary font-weight-semi-bold">(+84) 666-888-999</span></small>
                </div>
            </div>
        </a>
    </div>
    <div class="ml-md-6 ml-lg-0">
        <div class="mb-4">
            <h4 class="h6 font-weight-bold mb-2 font-size-17">Contact Info</h4>
            <address class="pr-4">
                    <span class="mb-2 h6 font-weight-normal text-gray-1">
                        PO Box CT16122 Collins Street West, Victoria 8007,Australia.
                    </span>
            </address>
        </div>
        <ul class="list-inline mb-0">
            <li class="list-inline-item mr-2">
                <a class="btn btn-icon btn-social btn-bg-transparent" href="#">
                    <span class="fa fa-facebook-f btn-icon__inner"></span>
                </a>
            </li>
            <li class="list-inline-item mr-2">
                <a class="btn btn-icon btn-social btn-bg-transparent" href="#">
                    <span class="fa fa-twitter  btn-icon__inner"></span>
                </a>
            </li>
            <li class="list-inline-item mr-2">
                <a class="btn btn-icon btn-social btn-bg-transparent" href="#">
                    <span class="fa fa-instagram btn-icon__inner"></span>
                </a>
            </li>
            <li class="list-inline-item mr-2">
                <a class="btn btn-icon btn-social btn-bg-transparent" href="#">
                    <span class="fa fa-linkedin btn-icon__inner"></span>
                </a>
            </li>
        </ul>
    </div>
</div>',
                    'group' => "general",
                ],
                [
                    'name'  => 'footer_text_left',
                    'val'   => '© 2021 MyTravel. All rights reserved',
                    'group' => "general",
                ],
                [
                    'name'  => 'footer_text_right',
                    'val'   => 'MyTravel',
                    'group' => "general",
                ],
                [
                    'name'  => 'list_widget_footer',
                    'val'   => '[{"title":"Company","size":"4","content":"<ul class=\"list-group list-group-flush list-group-borderless mb-0\">\r\n                                <li><a class=\"text-decoration-on-hover list-group-item list-group-item-action\" href=\"#\">About us<\/a><\/li>\r\n                                <li><a class=\"text-decoration-on-hover list-group-item list-group-item-action\" href=\"#\">Careers<\/a><\/li>\r\n                                <li><a class=\"list-group-item list-group-item-action text-decoration-on-hover\" href=\"#\">Terms of Use<\/a><\/li>\r\n                                <li><a class=\"list-group-item list-group-item-action text-decoration-on-hover\" href=\"#\">Privacy Statement<\/a><\/li>\r\n                                <li><a class=\"list-group-item list-group-item-action text-decoration-on-hover\" href=\"#\">Give Us Feedbacks<\/a><\/li>\r\n                            <\/ul>"},{"title":"Other Services","size":"4","content":"<ul class=\"list-group list-group-flush list-group-borderless mb-0\">\r\n                                <li><a class=\"list-group-item list-group-item-action text-decoration-on-hover\" href=\"#\">Investor Relations<\/a><\/li>\r\n                                <li><a class=\"list-group-item list-group-item-action text-decoration-on-hover\" href=\"#\">Rewards Program<\/a><\/li>\r\n                                <li><a class=\"list-group-item list-group-item-action text-decoration-on-hover\" href=\"#\">PointsPLUS<\/a><\/li>\r\n                                <li><a class=\"list-group-item list-group-item-action text-decoration-on-hover\" href=\"#\">Partners<\/a><\/li>\r\n                                <li><a class=\"list-group-item list-group-item-action text-decoration-on-hover\" href=\"#\">List My Hotel<\/a><\/li>\r\n                            <\/ul>"},{"title":"Support","size":"4","content":"<ul class=\"list-group list-group-flush list-group-borderless mb-0\">\r\n                                <li>\r\n                                    <a class=\"list-group-item list-group-item-action text-decoration-on-hover\" href=\"#\">Account<\/a>\r\n                                <\/li>\r\n                                <li>\r\n                                    <a class=\"list-group-item list-group-item-action text-decoration-on-hover\" href=\"#\">Legal<\/a>\r\n                                <\/li>\r\n                                <li>\r\n                                    <a class=\"list-group-item list-group-item-action text-decoration-on-hover\" href=\"#\">Contact<\/a>\r\n                                <\/li>\r\n                                <li>\r\n                                    <a class=\"list-group-item list-group-item-action text-decoration-on-hover\" href=\"#\">Affiliate Program<\/a>\r\n                                <\/li>\r\n                                <li>\r\n                                    <a class=\"list-group-item list-group-item-action text-decoration-on-hover\" href=\"#\">Privacy Policy<\/a>\r\n                                <\/li>\r\n                            <\/ul>"}]',
                    'group' => "general",
                ],
                [
                    'name'  => 'list_widget_footer_ja',
                    'val'   => '[{"title":"\u52a9\u3051\u304c\u5fc5\u8981\uff1f","size":"3","content":"<div class=\"contact\">\r\n        <div class=\"c-title\">\r\n            \u304a\u96fb\u8a71\u304f\u3060\u3055\u3044\r\n        <\/div>\r\n        <div class=\"sub\">\r\n            + 00 222 44 5678\r\n        <\/div>\r\n    <\/div>\r\n    <div class=\"contact\">\r\n        <div class=\"c-title\">\r\n            \u90f5\u4fbf\u7269\r\n        <\/div>\r\n        <div class=\"sub\">\r\n            hello@yoursite.com\r\n        <\/div>\r\n    <\/div>\r\n    <div class=\"contact\">\r\n        <div class=\"c-title\">\r\n            \u30d5\u30a9\u30ed\u30fc\u3059\u308b\r\n        <\/div>\r\n        <div class=\"sub\">\r\n            <a href=\"#\">\r\n                <i class=\"icofont-facebook\"><\/i>\r\n            <\/a>\r\n            <a href=\"#\">\r\n                <i class=\"icofont-twitter\"><\/i>\r\n            <\/a>\r\n            <a href=\"#\">\r\n                <i class=\"icofont-youtube-play\"><\/i>\r\n            <\/a>\r\n        <\/div>\r\n    <\/div>"},{"title":"\u4f1a\u793e","size":"3","content":"<ul>\r\n    <li><a href=\"#\">\u7d04, \u7565<\/a><\/li>\r\n    <li><a href=\"#\">\u30b3\u30df\u30e5\u30cb\u30c6\u30a3\u30d6\u30ed\u30b0<\/a><\/li>\r\n    <li><a href=\"#\">\u5831\u916c<\/a><\/li>\r\n    <li><a href=\"#\">\u3068\u9023\u643a<\/a><\/li>\r\n    <li><a href=\"#\">\u30c1\u30fc\u30e0\u306b\u4f1a\u3046<\/a><\/li>\r\n<\/ul>"},{"title":"\u30b5\u30dd\u30fc\u30c8","size":"3","content":"<ul>\r\n    <li><a href=\"#\">\u30a2\u30ab\u30a6\u30f3\u30c8<\/a><\/li>\r\n    <li><a href=\"#\">\u6cd5\u7684<\/a><\/li>\r\n    <li><a href=\"#\">\u63a5\u89e6<\/a><\/li>\r\n    <li><a href=\"#\">\u30a2\u30d5\u30a3\u30ea\u30a8\u30a4\u30c8\u30d7\u30ed\u30b0\u30e9\u30e0<\/a><\/li>\r\n    <li><a href=\"#\">\u500b\u4eba\u60c5\u5831\u4fdd\u8b77\u65b9\u91dd<\/a><\/li>\r\n<\/ul>"},{"title":"\u8a2d\u5b9a","size":"3","content":"<ul>\r\n<li><a href=\"#\">\u8a2d\u5b9a1<\/a><\/li>\r\n<li><a href=\"#\">\u8a2d\u5b9a2<\/a><\/li>\r\n<\/ul>"}]',
                    'group' => "general",
                ],
                [
                    'name' => 'page_contact_title',
                    'val' => "We'd love to hear from you",
                    'group' => "general",
                ],
                [
                    'name' => 'page_contact_sub_title',
                    'val' => "Send us a message and we'll respond as soon as possible",
                    'group' => "general",
                ],
                [
                    'name' => 'page_contact_desc',
                    'val' => "<!DOCTYPE html><html><head></head><body><h3>OneClickSolution</h3><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>Tell. + 00 222 444 33</p><p>Email. hello@yoursite.com</p><p>1355 Market St, Suite 900San, Francisco, CA 94103 United States</p></body></html>",
                    'group' => "general",
                ],
                [
                    'name' => 'page_contact_image',
                    'val' => MediaFile::findMediaByName("bg_contact")->id,
                    'group' => "general",
                ]
            ]
        );

        // Setting Home Page
        DB::table('core_templates')->insert([
            'title'       => 'Home Page',
            'content'     => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"service_types":["hotel","space","tour","car","event","flight","boat"],"title":"Let\'s The World Together!","sub_title":"Find awesome hotel, tour, car and activities in London","bg_image":16,"style":"","list_slider":[],"title_for_car":"","title_for_event":"","title_for_space":"","title_for_hotel":"","title_for_tour":"","hide_form_search":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"service_type":["space","hotel","tour"],"title":"Top Destinations","desc":"It is a long established fact that a reader","number":6,"layout":"style_1","order":"id","order_by":"asc","to_location_detail":"","custom_ids":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_all_service","name":"List All Service","model":{"title_for_car":"","title_for_event":"","title_for_space":"","title_for_hotel":"","title_for_tour":"","service_types":["hotel","space","tour","event","car"],"title":"Trending","style":"","number":"","order":"id","order_by":"asc"},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Travel Tips","sub_title":"Northern Ireland’s is now contingent. Britain is getting a divorce Northern Ireland is being offered a trial separation for Britain there is a one","link_title":"Get Inspired","link_more":"#","style":"","bg_color":"","bg_image":195},"component":"RegularBlock","open":true,"is_container":false},{"type":"box_category_tour","name":"Tour: Box Category","model":{"title":"Top activity","desc":"One way to vertically center is to use my-auto","list_item":[{"_active":true,"category_id":"4","image_id":189},{"_active":true,"category_id":"3","image_id":190},{"_active":true,"category_id":"2","image_id":191},{"_active":true,"category_id":"1","image_id":192}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_tours","name":"Tour: List Items","model":{"title":"Trending Tour","desc":"One way to vertically center is to use my-auto","number":4,"style":"","category_id":"","location_id":"","order":"id","order_by":"asc","is_featured":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_hotel","name":"Hotel: List Items","model":{"title":"Recommended Hotels","desc":"One way to vertically center is to use my-auto","number":4,"style":"","location_id":"","order":"id","order_by":"asc","is_featured":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_space","name":"Space: List Items","model":{"title":"Trending Space","number":4,"style":"","location_id":"","order":"id","order_by":"asc","is_featured":"","desc":"One way to vertically center is to use my-auto"},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"Our Happy","list_item":[{"_active":true,"name":"Ali Tufan ","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","number_star":null,"avatar":1,"position":"Client"},{"_active":true,"name":"Augusta Silva","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"Client","avatar":2},{"_active":true,"name":"Jessica Brown","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"Client","avatar":3}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_car","name":"Car: List Items","model":{"title":"Trending Car","number":4,"style":"","location_id":"","order":"id","order_by":"asc","is_featured":"","desc":"One way to vertically center is to use my-auto"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_event","name":"Event: List Items","model":{"title":"Popular Event","number":4,"style":"","location_id":"","order":"id","order_by":"asc","is_featured":"","desc":"One way to vertically center is to use my-auto"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"title":"Why Choose","list_item":[{"_active":true,"title":"Competitive Pricing","link":"#","sub_title":"With 500+ suppliers and the purchasing power of 300 million members, mytravel.com can save you more!","icon":"flaticon-price ","icon_image":null,"order":null},{"_active":true,"title":"Award-Winning Service","sub_title":"Travel worry-free knowing that we\'re here if you needus, 24 hours a day","link":"#","icon_image":null,"icon":"flaticon-medal","order":null},{"_active":true,"title":"Worldwide Coverage","sub_title":"Over 1,200,000 hotels in more than 200 countries and regions & flights to over 5,000 cities","link":"#","icon_image":null,"icon":"flaticon-global-1","order":null}],"style":"style_2"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_news","name":"News: List Items","model":{"title":"Today\'s Top Deals","number":4,"category_id":"","order":"id","order_by":"asc"},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        // Setting Home Tour

        //Location
        DB::table('media_files')->insert([
            ['file_name' => 'location-6', 'file_path' => 'demo/location/location-6.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'location-7', 'file_path' => 'demo/location/location-7.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'location-8', 'file_path' => 'demo/location/location-8.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'location-9', 'file_path' => 'demo/location/location-9.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'location-10', 'file_path' => 'demo/location/location-10.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
        ]);

        //Page Vendor
        $images = [
            'become-expert-1' => DB::table('media_files')->insertGetId(['file_name' => 'become-expert-1', 'file_path' => 'demo/general/become-expert-1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'become-expert-2' => DB::table('media_files')->insertGetId(['file_name' => 'become-expert-2', 'file_path' => 'demo/general/become-expert-2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'become-expert-3' => DB::table('media_files')->insertGetId(['file_name' => 'become-expert-3', 'file_path' => 'demo/general/become-expert-3.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'become-expert-4' => DB::table('media_files')->insertGetId(['file_name' => 'become-expert-4', 'file_path' => 'demo/general/become-expert-4.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'become-expert-5' => DB::table('media_files')->insertGetId(['file_name' => 'become-expert-5', 'file_path' => 'demo/general/become-expert-5.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'thumb-vendor-register' => DB::table('media_files')->insertGetId(['file_name' => 'thumb-vendor-register', 'file_path' => 'demo/general/thumb-vendor-register.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
        ];
        $home_hotel = [
            'img_1' => DB::table('media_files')->insertGetId(['file_name' => 'home-hotel-banner', 'file_path' => 'demo/general/home-hotel-banner.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_2' => DB::table('media_files')->insertGetId(['file_name' => 'call-to-action-bg-4', 'file_path' => 'demo/general/call-to-action-bg-4.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
        ];
        $home_tour = [
            'img_1' => DB::table('media_files')->insertGetId(['file_name' => 'home-tour-banner', 'file_path' => 'demo/general/home-tour-banner.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_2' => DB::table('media_files')->insertGetId(['file_name' => 'avatar-4', 'file_path' => 'demo/general/avatar-4.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_3' => DB::table('media_files')->insertGetId(['file_name' => 'avatar-5', 'file_path' => 'demo/general/avatar-5.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_4' => DB::table('media_files')->insertGetId(['file_name' => 'avatar-6', 'file_path' => 'demo/general/avatar-6.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_5' => DB::table('media_files')->insertGetId(['file_name' => 'brand-1', 'file_path' => 'demo/general/brand-1.png', 'file_type' => 'image/jpeg', 'file_extension' => 'png']),
            'img_6' => DB::table('media_files')->insertGetId(['file_name' => 'brand-2', 'file_path' => 'demo/general/brand-2.png', 'file_type' => 'image/jpeg', 'file_extension' => 'png']),
            'img_7' => DB::table('media_files')->insertGetId(['file_name' => 'brand-3', 'file_path' => 'demo/general/brand-3.png', 'file_type' => 'image/jpeg', 'file_extension' => 'png']),
            'img_8' => DB::table('media_files')->insertGetId(['file_name' => 'brand-4', 'file_path' => 'demo/general/brand-4.png', 'file_type' => 'image/jpeg', 'file_extension' => 'png']),
            'img_9' => DB::table('media_files')->insertGetId(['file_name' => 'brand-5', 'file_path' => 'demo/general/brand-5.png', 'file_type' => 'image/jpeg', 'file_extension' => 'png']),
        ];

        $home_space = [
            'img_1' => DB::table('media_files')->insertGetId(['file_name' => 'home-space-banner', 'file_path' => 'demo/general/home-space-banner.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_2' => DB::table('media_files')->insertGetId(['file_name' => 'bg-space-type', 'file_path' => 'demo/space/bg-space-type.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_3' => DB::table('media_files')->insertGetId(['file_name' => 'space-call-to-action', 'file_path' => 'demo/space/space-call-to-action.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
        ];

        $home_event = [
            'img_1' => DB::table('media_files')->insertGetId(['file_name' => 'home-event-banner', 'file_path' => 'demo/general/home-event-banner.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_2' => DB::table('media_files')->insertGetId(['file_name' => 'new-york', 'file_path' => 'demo/general/new-york.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_3' => DB::table('media_files')->insertGetId(['file_name' => 'call-to-action-bg-5', 'file_path' => 'demo/general/call-to-action-bg-5.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
        ];

        $home_car = [
            'img_1' => DB::table('media_files')->insertGetId(['file_name' => 'home-car-banner', 'file_path' => 'demo/general/home-car-banner.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_2' => DB::table('media_files')->insertGetId(['file_name' => 'call-to-action-bg-6', 'file_path' => 'demo/general/call-to-action-bg-6.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'])
        ];

        DB::table('core_templates')->insert([
            'title'       => 'Become a vendor',
            'content'     => '[{"type":"breadcrumb_section","name":"Breadcrumb Section","model":{"title":"Become Local Expert","sub_title":"About","bg_image":'.$images['become-expert-1'].'},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"list_item":[{"_active":true,"title":"Sign up","sub_title":"Click edit button to change this text  to change this text","icon_image":'.$images['become-expert-2'].',"order":null},{"_active":true,"title":" Add your services","sub_title":" Click edit button to change this text  to change this text","icon_image":'.$images['become-expert-3'].',"order":null},{"_active":true,"title":"Get bookings","sub_title":" Click edit button to change this text  to change this text","icon_image":'.$images['become-expert-4'].',"order":null}],"style":"","title":"How it Works"},"component":"RegularBlock","open":true,"is_container":false},{"type":"video_player","name":"Video Player","model":{"title":"Travelling Highlights","youtube":"https://www.youtube.com/watch?v=hHUbLv4ThOo","bg_image":'.$images['become-expert-5'].',"sub_title":"Your New Travelling Idea"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"list_item":[{"_active":true,"title":"Competitive Pricing","sub_title":"With 500+ suppliers and the purchasing power of 300 million members, mytravel.com can save you more!","icon_image":"","order":null,"icon":"flaticon-price","link":""},{"_active":true,"title":"Award-Winning Service","sub_title":"Travel worry-free knowing that we\'re here if you needus, 24 hours a day","icon_image":"","order":null,"icon":"flaticon-medal"},{"_active":true,"title":"Worldwide Coverage","sub_title":"Over 1,200,000 hotels in more than 200 countries and regions & flights to over 5,000 cities","icon_image":"","order":null,"icon":"flaticon-global-1"}],"style":"style_2","title":"Why be a Local Expert"},"component":"RegularBlock","open":true,"is_container":false},{"type":"vendor_register_form","name":"Vendor Register Form","model":{"title":"Become a vendor","desc":"Join our community to unlock your greatest asset and welcome paying guests into your home.","youtube":"https://www.youtube.com/watch?v=AmZ0WrEaf34","bg_image":'.$images['thumb-vendor-register'].'},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('core_templates')->insert([
            'title'       => 'Home Hotel',
            'content'     => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"title_for_car":"","title_for_event":"","title_for_flight":"","title_for_hotel":"","title_for_space":"","title_for_tour":"","service_types":["hotel"],"title":"Find Your Ideal Hotel and Compare Prices","sub_title":"Check out the best deals on over 2,000,000 hotels worldwide","style":"","bg_image":'.$home_hotel['img_1'].',"hide_form_search":"","single_form_search":true},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_hotel","name":"Hotel: List Items","model":{"title":"Most Popular Hotels","desc":"","number":20,"style":"style_2","location_id":"","order":"id","order_by":"desc","is_featured":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"service_type":["hotel"],"title":"Top Destinations","number":6,"layout":"style_2","order":"id","order_by":"asc","custom_ids":"","to_location_detail":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Enjoy Summer Deals","sub_title":"Up to 40% Discount!","link_title":"Learn more","link_more":"#","style":"","bg_image":'.$home_hotel['img_2'].'},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_services_by_location","name":"List Services By Location","model":{"service_types":"hotel","title":"Recommended Hotels","sub_title":"","style":"","bg_image":"","hide_form_search":"","location_id":[1,2,3,4,5,6,7]},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"title":"Why Choose","list_item":[{"_active":true,"title":"Competitive Pricing","sub_title":"With 500+ suppliers and the purchasing power of 300 million members, mytravel.com can save you more!","link":"#","icon_image":null,"icon":"flaticon-price","order":null},{"_active":true,"title":"Award-Winning Service","sub_title":"Travel worry-free knowing that we are here if you needus, 24 hours a day","link":"#","icon_image":null,"icon":"flaticon-medal","order":null},{"_active":true,"title":"Worldwide Coverage","sub_title":"Over 1,200,000 hotels in more than 200 countries and regions & flights to over 5,000 cities","link":"#","icon_image":null,"icon":"flaticon-global-1","order":null}],"style":"style_2","border_none":true},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('core_templates')->insert([
            'title'       => 'Home Tour',
            'content'     => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"title_for_car":"","title_for_event":"","title_for_flight":"","title_for_hotel":"","title_for_space":"","title_for_tour":"","service_types":["tour"],"title":"Find Next Place To Visit","sub_title":"Discover amzaing places at exclusive deals","style":"","bg_image":'.$home_tour['img_1'].',"hide_form_search":"","single_form_search":true},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"title":"","list_item":[{"_active":true,"title":"2.000 +Destinations","sub_title":"Our expert team handpicked all destinations in this site","link":"#","icon_image":null,"icon":"flaticon-placeholder-2","order":null},{"_active":true,"title":" Best Price Guarantee","sub_title":"Price match within 48 hours of order confirmation","link":"#","icon_image":null,"icon":"flaticon-price-1","order":null},{"_active":true,"title":"Top Notch Support","sub_title":"We are here to help, before, during, and even after your trip.","link":"#","icon_image":null,"icon":"flaticon-customer-service","order":null}],"style":"style_3","border_none":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"service_type":["tour"],"title":"Popular Destination","number":7,"layout":"style_3","order":"id","order_by":"asc","custom_ids":"","to_location_detail":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_tours","name":"Tour: List Items","model":{"title":"Popular Tours","desc":"","number":20,"style":"style_2","category_id":"","location_id":"","order":"id","order_by":"desc","is_featured":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"video_player","name":"Video Player","model":{"title":"Travelling Highlights","sub_title":"Your New Travelling Idea","youtube":"https://www.youtube.com/watch?v=hHUbLv4ThOo","bg_image":'.$images['become-expert-5'].',"bg_gradient":"gradient_overlay_half_bg_blue_light"},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"Customer Reviews","list_item":[{"_active":true,"name":"Jessica Brown","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"client","avatar":'.$home_tour['img_2'].'},{"_active":true,"name":"Augusta Silva","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"client","avatar":'.$home_tour['img_3'].'},{"_active":true,"name":"Ali Tufan","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"client","avatar":'.$home_tour['img_4'].'},{"_active":true,"name":"Jessica Brown","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"client","avatar":'.$home_tour['img_2'].'},{"_active":true,"name":"Ali Tufan","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"client","avatar":'.$home_tour['img_3'].'},{"_active":true,"name":"Augusta Silva","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"client","avatar":'.$home_tour['img_4'].'}],"style":"style_2"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_news","name":"News: List Items","model":{"title":"Recent Article","number":3,"category_id":"","order":"id","order_by":"desc"},"component":"RegularBlock","open":true,"is_container":false},{"type":"brands_list","name":"Brands List","model":{"list_item":[{"_active":true,"title":"Expedia","image_id":'.$home_tour['img_5'].'},{"_active":true,"title":"American Airlines","image_id":'.$home_tour['img_6'].'},{"_active":true,"title":"Trip advisor","image_id":'.$home_tour['img_7'].'},{"_active":true,"title":"Carlson","image_id":'.$home_tour['img_8'].'},{"_active":true,"title":"booking.com","image_id":'.$home_tour['img_9'].'}]},"component":"RegularBlock","open":true}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('core_templates')->insert([
            'title'       => 'Home Space',
            'content'     => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"title_for_car":"","title_for_event":"","title_for_flight":"","title_for_hotel":"","title_for_space":"","title_for_tour":"","service_types":["space"],"title":"Find your next rental","sub_title":"Book experiences you’ll want to tell the world about","style":"","bg_image":'.$home_space['img_1'].',"hide_form_search":"","single_form_search":true},"component":"RegularBlock","open":true,"is_container":false},{"type":"space_term_featured_box","name":"Space: Term Featured Box","model":{"title":"Find a Home Type","term_space":["15","16","17","18","35","34","33","32"]},"component":"RegularBlock","open":true},{"type":"list_space","name":"Space: List Items","model":{"title":"Trending Rental","desc":"","number":20,"style":"style_2","location_id":"","order":"id","order_by":"desc","is_featured":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Airbnb plus places to stay","sub_title":"A selection of places to stay verified for quality and design","link_title":"Explore Stays","link_more":"#","style":"","bg_image":'.$home_space['img_3'].'},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"service_type":["space"],"title":"Top Destination","number":20,"layout":"style_4","order":"id","order_by":"desc","custom_ids":"","to_location_detail":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"Customer Reviews","list_item":[{"_active":true,"name":"Jessica Brown","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"client","avatar":'.$home_tour['img_2'].'},{"_active":true,"name":"Augusta Silva","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"client","avatar":'.$home_tour['img_3'].'},{"_active":true,"name":"Ali Tufan","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"client","avatar":'.$home_tour['img_4'].'},{"_active":true,"name":"Jessica Brown","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"client","avatar":'.$home_tour['img_2'].'},{"_active":true,"name":"Ali Tufan","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"client","avatar":'.$home_tour['img_3'].'},{"_active":true,"name":"Augusta Silva","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"client","avatar":'.$home_tour['img_4'].'}],"style":"style_2"},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_templates')->insert([
            'title'       => 'Home Event',
            'content'     => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"title_for_car":"","title_for_event":"","title_for_flight":"","title_for_hotel":"","title_for_space":"","title_for_tour":"","service_types":["event"],"title":"Love where you are going","sub_title":"Book experiences you’ll want to tell the world about","style":"","bg_image":'.$home_event['img_1'].',"hide_form_search":"","single_form_search":true},"component":"RegularBlock","open":true,"is_container":false},{"type":"unmissable_destinations","name":"Unmissable Destinations","model":{"title":"Unmissable Destinations","service_types":"event","number_item":"","location_name":"New York","location_desc":"Take in the iconic skyline and visit the neighborhood hangouts that you’ve only ever seen on TV.","bg_image":'.$home_event['img_2'].',"location_btn":"Explore things to do","location_link":"#"},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Who is the Local Expert?","sub_title":"Morbi semper fames lobortis ac hac penatibus","link_title":"Become Local Expert","link_more":"#","style":"","bg_image":'.$home_event['img_3'].',"bg_gradient":"gradient_overlay_half_bg_orange"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_event","name":"Event: List Items","model":{"title":"Popular Activities","desc":"","number":"","style":"style_2","location_id":"","order":"id","order_by":"desc","is_featured":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"service_type":["event"],"title":"Top Destination","number":10,"layout":"style_5","order":"id","order_by":"desc","custom_ids":"","to_location_detail":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"Our Happy","list_item":[{"_active":true,"name":"Ali Tufan ","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","number_star":null,"avatar":1,"position":"Client"},{"_active":true,"name":"Augusta Silva","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"Client","avatar":2},{"_active":true,"name":"Jessica Brown","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"Client","avatar":3}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"brands_list","name":"Brands List","model":{"list_item":[{"_active":true,"title":"Expedia","image_id":'.$home_tour['img_5'].'},{"_active":true,"title":"American Airlines","image_id":'.$home_tour['img_6'].'},{"_active":true,"title":"Trip advisor","image_id":'.$home_tour['img_7'].'},{"_active":true,"title":"Carlson","image_id":'.$home_tour['img_8'].'},{"_active":true,"title":"booking.com","image_id":'.$home_tour['img_9'].'}]},"component":"RegularBlock","open":true}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_templates')->insert([
            'title'       => 'Home Car',
            'content'     => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"title_for_car":"","title_for_event":"","title_for_flight":"","title_for_hotel":"","title_for_space":"","title_for_tour":"","service_types":["car"],"title":"Discover The World With MyCars","sub_title":"","style":"","bg_image":'.$home_car['img_1'].',"hide_form_search":"","single_form_search":true},"component":"RegularBlock","open":true,"is_container":false},{"type":"term_car","name":"Car: List Term Items","model":{"title":"Select by Category","location_id":"","number":"","order":"","order_by":"","is_featured":"","term_car":["65","66","67","68","70","69","71","72"]},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_car","name":"Car: List Items","model":{"title":"Top Hire Cars","desc":"","number":20,"style":"style_2","location_id":"","order":"id","order_by":"desc","is_featured":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Tell us where you would like to go.","sub_title":"3,000+ VIP Transport Options!","link_title":"Search Options","link_more":"#","style":"","bg_image":'.$home_car['img_2'].',"bg_gradient":"gradient_overlay_half_bg_dark"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"service_type":["car"],"title":"Top Destination","number":10,"layout":"style_5","order":"id","order_by":"desc","custom_ids":"","to_location_detail":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_news","name":"News: List Items","model":{"title":"Recent Article","number":3,"category_id":"","order":"id","order_by":"desc"},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);


        $home_v2 = [
            'img_1' => DB::table('media_files')->insertGetId(['file_name' => 'banner-home-2', 'file_path' => 'demo/general/banner-home-2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
        ];
        DB::table('core_templates')->insert([
            'title'       => 'Home v2',
            'content'     => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"title_for_car":"","title_for_event":"","title_for_flight":"","title_for_hotel":"","title_for_space":"","title_for_tour":"","service_types":["car","event","flight","hotel","space","tour"],"title":"Let\'s The World Together!","sub_title":"Find awesome hotel, tour, car and activities in London","style":"style_2","bg_image":'.$home_v2['img_1'].',"hide_form_search":"","single_form_search":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"service_type":["car","event"],"title":"Top Destination","number":10,"layout":"style_5","order":"id","order_by":"asc","custom_ids":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_all_service","name":"List All Service","model":{"title_for_car":"","title_for_event":"","title_for_hotel":"","title_for_space":"","title_for_tour":"","service_types":["car","event","hotel","space","tour"],"title":"Trending","style":"","number":4,"order":"id","order_by":"asc"},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"Our Happy","list_item":[{"_active":true,"name":"Ali Tufan ","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"Client","avatar":1},{"_active":true,"name":"Augusta Silva","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"Client","avatar":2},{"_active":true,"name":"Jessica Brown","desc":"This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize","position":"Client","avatar":3}],"style":"index"},"component":"RegularBlock","open":true},{"type":"video_player","name":"Video Player","model":{"title":"Travel Viet Nam","sub_title":"Hello Viet Nam | Wellcome To Paradise","youtube":"https://www.youtube.com/watch?v=3FqtRWLlg9k","bg_image":228,"bg_gradient":"gradient_overlay_half_bg_grayish_blue"},"component":"RegularBlock","open":true}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_pages')->insert([
            'title'       => 'Home Page',
            'slug'        => 'home-page',
            'template_id' => '1',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_pages')->insert([
            'title'       => 'Become a vendor',
            'slug'        => 'become-a-vendor',
            'template_id' => '2',
            'header_style' => 'transparent',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_pages')->insert([
            'title'       => 'Home Hotel',
            'slug'        => 'home-hotel',
            'template_id' => '3',
            'header_style' => 'transparent',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_pages')->insert([
            'title'       => 'Home Tour',
            'slug'        => 'home-tour',
            'template_id' => '4',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_pages')->insert([
            'title'       => 'Home Space',
            'slug'        => 'home-space',
            'template_id' => '5',
            'header_style' => 'transparent',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_pages')->insert([
            'title'       => 'Home Event',
            'slug'        => 'home-event',
            'template_id' => '6',
            'header_style' => 'transparent',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_pages')->insert([
            'title'       => 'Home Car',
            'slug'        => 'home-car',
            'template_id' => '7',
            'header_style' => 'transparent',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_pages')->insert([
            'title'       => 'Home v2',
            'slug'        => 'home-v2',
            'template_id' => '8',
            'header_style' => 'transparent',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        $a = new \Modules\Page\Models\Page();
        $a->title = "Privacy policy";
        $a->create_user = 1;
        $a->status = 'publish';
        $a->created_at = date("Y-m-d H:i:s");
        $a->content = '<h1>Privacy policy</h1>
<p> This privacy policy (&quot;Policy&quot;) describes how the personally identifiable information (&quot;Personal Information&quot;) you may provide on the <a target="_blank" rel="nofollow" href="http://mytravel.test">mytravel.test</a> website (&quot;Website&quot; or &quot;Service&quot;) and any of its related products and services (collectively, &quot;Services&quot;) is collected, protected and used. It also describes the choices available to you regarding our use of your Personal Information and how you can access and update this information. This Policy is a legally binding agreement between you (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;) and this Website operator (&quot;Operator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;). By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Agreement. This Policy does not apply to the practices of companies that we do not own or control, or to individuals that we do not employ or manage.</p>
<h2>Automatic collection of information</h2>
<p>When you open the Website, our servers automatically record information that your browser sends. This data may include information such as your device\'s IP address, browser type and version, operating system type and version, language preferences or the webpage you were visiting before you came to the Website and Services, pages of the Website and Services that you visit, the time spent on those pages, information you search for on the Website, access times and dates, and other statistics.</p>
<p>Information collected automatically is used only to identify potential cases of abuse and establish statistical information regarding the usage and traffic of the Website and Services. This statistical information is not otherwise aggregated in such a way that would identify any particular user of the system.</p>
<h2>Collection of personal information</h2>
<p>You can access and use the Website and Services without telling us who you are or revealing any information by which someone could identify you as a specific, identifiable individual. If, however, you wish to use some of the features on the Website, you may be asked to provide certain Personal Information (for example, your name and e-mail address). We receive and store any information you knowingly provide to us when you create an account, publish content,  or fill any online forms on the Website. When required, this information may include the following:</p>
<ul>
<li>Personal details such as name, country of residence, etc.</li>
<li>Contact information such as email address, address, etc.</li>
<li>Account details such as user name, unique user ID, password, etc.</li>
<li>Information about other individuals such as your family members, friends, etc.</li>
</ul>
<p>Some of the information we collect is directly from you via the Website and Services. However, we may also collect Personal Information about you from other sources such as public databases and our joint marketing partners. You can choose not to provide us with your Personal Information, but then you may not be able to take advantage of some of the features on the Website. Users who are uncertain about what information is mandatory are welcome to contact us.</p>
<h2>Use and processing of collected information</h2>
<p>In order to make the Website and Services available to you, or to meet a legal obligation, we need to collect and use certain Personal Information. If you do not provide the information that we request, we may not be able to provide you with the requested products or services. Any of the information we collect from you may be used for the following purposes:</p>
<ul>
<li>Create and manage user accounts</li>
<li>Send administrative information</li>
<li>Request user feedback</li>
<li>Improve user experience</li>
<li>Enforce terms and conditions and policies</li>
<li>Run and operate the Website and Services</li>
</ul>
<p>Processing your Personal Information depends on how you interact with the Website and Services, where you are located in the world and if one of the following applies: (i) you have given your consent for one or more specific purposes; this, however, does not apply, whenever the processing of Personal Information is subject to European data protection law; (ii) provision of information is necessary for the performance of an agreement with you and/or for any pre-contractual obligations thereof; (iii) processing is necessary for compliance with a legal obligation to which you are subject; (iv) processing is related to a task that is carried out in the public interest or in the exercise of official authority vested in us; (v) processing is necessary for the purposes of the legitimate interests pursued by us or by a third party.</p>
<p> Note that under some legislations we may be allowed to process information until you object to such processing (by opting out), without having to rely on consent or any other of the following legal bases below. In any case, we will be happy to clarify the specific legal basis that applies to the processing, and in particular whether the provision of Personal Information is a statutory or contractual requirement, or a requirement necessary to enter into a contract.</p>
<h2>Managing information</h2>
<p>You are able to delete certain Personal Information we have about you. The Personal Information you can delete may change as the Website and Services change. When you delete Personal Information, however, we may maintain a copy of the unrevised Personal Information in our records for the duration necessary to comply with our obligations to our affiliates and partners, and for the purposes described below. If you would like to delete your Personal Information or permanently delete your account, you can do so by contacting us.</p>
<h2>Disclosure of information</h2>
<p> Depending on the requested Services or as necessary to complete any transaction or provide any service you have requested, we may share your information with your consent with our trusted third parties that work with us, any other affiliates and subsidiaries we rely upon to assist in the operation of the Website and Services available to you. We do not share Personal Information with unaffiliated third parties. These service providers are not authorized to use or disclose your information except as necessary to perform services on our behalf or comply with legal requirements. We may share your Personal Information for these purposes only with third parties whose privacy policies are consistent with ours or who agree to abide by our policies with respect to Personal Information. These third parties are given Personal Information they need only in order to perform their designated functions, and we do not authorize them to use or disclose Personal Information for their own marketing or other purposes.</p>
<p>We will disclose any Personal Information we collect, use or receive if required or permitted by law, such as to comply with a subpoena, or similar legal process, and when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud, or respond to a government request.</p>
<h2>Retention of information</h2>
<p>We will retain and use your Personal Information for the period necessary to comply with our legal obligations, resolve disputes, and enforce our agreements unless a longer retention period is required or permitted by law. We may use any aggregated data derived from or incorporating your Personal Information after you update or delete it, but not in a manner that would identify you personally. Once the retention period expires, Personal Information shall be deleted. Therefore, the right to access, the right to erasure, the right to rectification and the right to data portability cannot be enforced after the expiration of the retention period.</p>
<h2>The rights of users</h2>
<p>You may exercise certain rights regarding your information processed by us. In particular, you have the right to do the following: (i) you have the right to withdraw consent where you have previously given your consent to the processing of your information; (ii) you have the right to object to the processing of your information if the processing is carried out on a legal basis other than consent; (iii) you have the right to learn if information is being processed by us, obtain disclosure regarding certain aspects of the processing and obtain a copy of the information undergoing processing; (iv) you have the right to verify the accuracy of your information and ask for it to be updated or corrected; (v) you have the right, under certain circumstances, to restrict the processing of your information, in which case, we will not process your information for any purpose other than storing it; (vi) you have the right, under certain circumstances, to obtain the erasure of your Personal Information from us; (vii) you have the right to receive your information in a structured, commonly used and machine readable format and, if technically feasible, to have it transmitted to another controller without any hindrance. This provision is applicable provided that your information is processed by automated means and that the processing is based on your consent, on a contract which you are part of or on pre-contractual obligations thereof.</p>
<h2>Privacy of children</h2>
<p>We do not knowingly collect any Personal Information from children under the age of 18. If you are under the age of 18, please do not submit any Personal Information through the Website and Services. We encourage parents and legal guardians to monitor their children\'s Internet usage and to help enforce this Policy by instructing their children never to provide Personal Information through the Website and Services without their permission. If you have reason to believe that a child under the age of 18 has provided Personal Information to us through the Website and Services, please contact us. You must also be old enough to consent to the processing of your Personal Information in your country (in some countries we may allow your parent or guardian to do so on your behalf).</p>
<h2>Cookies</h2>
<p>The Website and Services use &quot;cookies&quot; to help personalize your online experience. A cookie is a text file that is placed on your hard disk by a web page server. Cookies cannot be used to run programs or deliver viruses to your computer. Cookies are uniquely assigned to you, and can only be read by a web server in the domain that issued the cookie to you.</p>
<p>We may use cookies to collect, store, and track information for statistical purposes to operate the Website and Services. You have the ability to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. To learn more about cookies and how to manage them, visit <a target="_blank" href="https://www.internetcookies.org">internetcookies.org</a></p>
<h2>Do Not Track signals</h2>
<p>Some browsers incorporate a Do Not Track feature that signals to websites you visit that you do not want to have your online activity tracked. Tracking is not the same as using or collecting information in connection with a website. For these purposes, tracking refers to collecting personally identifiable information from consumers who use or visit a website or online service as they move across different websites over time. How browsers communicate the Do Not Track signal is not yet uniform. As a result, the Website and Services are not yet set up to interpret or respond to Do Not Track signals communicated by your browser. Even so, as described in more detail throughout this Policy, we limit our use and collection of your personal information.</p>
<h2>Email marketing</h2>
<p>We offer electronic newsletters to which you may voluntarily subscribe at any time. We are committed to keeping your e-mail address confidential and will not disclose your email address to any third parties except as allowed in the information use and processing section or for the purposes of utilizing a third party provider to send such emails. We will maintain the information sent via e-mail in accordance with applicable laws and regulations.</p>
<p>In compliance with the CAN-SPAM Act, all e-mails sent from us will clearly state who the e-mail is from and provide clear information on how to contact the sender. You may choose to stop receiving our newsletter or marketing emails by following the unsubscribe instructions included in these emails or by contacting us. However, you will continue to receive essential transactional emails.</p>
<h2>Links to other resources</h2>
<p>The Website and Services contain links to other resources that are not owned or controlled by us. Please be aware that we are not responsible for the privacy practices of such other resources or third parties. We encourage you to be aware when you leave the Website and Services and to read the privacy statements of each and every resource that may collect Personal Information.</p>
<h2>Information security</h2>
<p>We secure information you provide on computer servers in a controlled, secure environment, protected from unauthorized access, use, or disclosure. We maintain reasonable administrative, technical, and physical safeguards in an effort to protect against unauthorized access, use, modification, and disclosure of Personal Information in its control and custody. However, no data transmission over the Internet or wireless network can be guaranteed. Therefore, while we strive to protect your Personal Information, you acknowledge that (i) there are security and privacy limitations of the Internet which are beyond our control; (ii) the security, integrity, and privacy of any and all information and data exchanged between you and the Website and Services cannot be guaranteed; and (iii) any such information and data may be viewed or tampered with in transit by a third party, despite best efforts.</p>
<h2>Data breach</h2>
<p>In the event we become aware that the security of the Website and Services has been compromised or users Personal Information has been disclosed to unrelated third parties as a result of external activity, including, but not limited to, security attacks or fraud, we reserve the right to take reasonably appropriate measures, including, but not limited to, investigation and reporting, as well as notification to and cooperation with law enforcement authorities. In the event of a data breach, we will make reasonable efforts to notify affected individuals if we believe that there is a reasonable risk of harm to the user as a result of the breach or if notice is otherwise required by law. When we do, we will post a notice on the Website, send you an email.</p>
<h2>Changes and amendments</h2>
<p>We reserve the right to modify this Policy or its terms relating to the Website and Services from time to time in our discretion and will notify you of any material changes to the way in which we treat Personal Information. When we do, we will post a notification on the main page of the Website. We may also provide notice to you in other ways in our discretion, such as through contact information you have provided. Any updated version of this Policy will be effective immediately upon the posting of the revised Policy unless otherwise specified. Your continued use of the Website and Services after the effective date of the revised Policy (or such other act specified at that time) will constitute your consent to those changes. However, we will not, without your consent, use your Personal Information in a manner materially different than what was stated at the time your Personal Information was collected. Policy was created with <a style="color:inherit" target="_blank" href="https://www.websitepolicies.com/privacy-policy-generator">WebsitePolicies</a>.</p>
<h2>Acceptance of this policy</h2>
<p>You acknowledge that you have read this Policy and agree to all its terms and conditions. By accessing and using the Website and Services you agree to be bound by this Policy. If you do not agree to abide by the terms of this Policy, you are not authorized to access or use the Website and Services.</p>
<h2>Contacting us</h2>
<p>If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to individual rights and your Personal Information, you may do so via the <a target="_blank" rel="nofollow" href="http://mytravel.test/contact">contact form</a></p>
<p>This document was last updated on October 6, 2020</p>';
        $a->save();
        DB::table('core_settings')->insert([
            [
                'name'  => 'home_page_id',
                'val'   => '1',
                'group' => "general",
            ],
            [
                'name'  => 'page_contact_title',
                'val'   => "Contact Us",
                'group' => "general",
            ],
            [
                'name'  => 'page_contact_lists',
                'val'   => '[{"title":"London","address":"82 Bernie Greens Apt. 210, <br>  Hendon Way, London, UK","phone":"+53 213 5941 295","email":"contact@mytravel.com","link_map":"#"},{"title":"Viet Nam","address":"Thanh pho Ha Noi, <br> Viet Nam","phone":"+0985 5941 295 213","email":"contact@mytravel.com","link_map":"#"},{"title":"New York","address":"21 Valentin Rapids Apt. 335 New <br> Jersey, New York, USA","phone":"+47 213 5941 295","email":"contact@mytravel.test","link_map":"#"}]',
                'group' => "general",
            ],
            [
                'name'  => 'page_contact_iframe_google_map',
                'val'   => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835253576489!2d144.95372995111143!3d-37.817327679652266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1581584770980!5m2!1sen!2sin" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
                'group' => "general",
            ],
            [
                'name'  => 'page_contact_image',
                'val'   => MediaFile::findMediaByName("bg_contact")->id,
                'group' => "general",
            ]
        ]);
        // Setting Currency
        DB::table('core_settings')->insert([
                [
                    'name'  => "currency_main",
                    'val'   => "usd",
                    'group' => "payment",
                ],
                [
                    'name'  => "currency_format",
                    'val'   => "left",
                    'group' => "payment",
                ],
                [
                    'name'  => "currency_decimal",
                    'val'   => ",",
                    'group' => "payment",
                ],
                [
                    'name'  => "currency_thousand",
                    'val'   => ".",
                    'group' => "payment",
                ],
                [
                    'name'  => "currency_no_decimal",
                    'val'   => "0",
                    'group' => "payment",
                ],
                [
                    'name'  => "extra_currency",
                    'val'   => '[{"currency_main":"eur","currency_format":"left","currency_thousand":".","currency_decimal":",","currency_no_decimal":"2","rate":"0.902807"},{"currency_main":"jpy","currency_format":"right_space","currency_thousand":".","currency_decimal":",","currency_no_decimal":"0","rate":"0.00917113"}]',
                    'group' => "payment",
                ]
            ]);
        //MAP
        DB::table('core_settings')->insert([
                [
                    'name'  => 'map_provider',
                    'val'   => 'gmap',
                    'group' => "advance",
                ],
                [
                    'name'  => 'map_gmap_key',
                    'val'   => '',
                    'group' => "advance",
                ]
            ]);
        // Payment Gateways
        DB::table('core_settings')->insert([
                [
                    'name'  => "g_offline_payment_enable",
                    'val'   => "1",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_offline_payment_name",
                    'val'   => "Offline Payment",
                    'group' => "payment",
                ]
            ]);
        // Settings general
        DB::table('core_settings')->insert([
                [
                    'name'  => "date_format",
                    'val'   => "m/d/Y",
                    'group' => "general",
                ],
                [
                    'name'  => "site_title",
                    'val'   => "OneClickSolution",
                    'group' => "general",
                ],
            ]);
        // Email general
        DB::table('core_settings')->insert([
                [
                    'name'  => "site_timezone",
                    'val'   => "UTC",
                    'group' => "general",
                ],
                [
                    'name'  => "site_title",
                    'val'   => "OneClickSolution",
                    'group' => "general",
                ],
                [
                    'name'  => "email_header",
                    'val'   => '<h1 class="site-title" style="text-align: center">OneClickSolution</h1>',
                    'group' => "general",
                ],
                [
                    'name'  => "email_footer",
                    'val'   => '<p class="" style="text-align: center">&copy; 2021 OneClickSolution. All rights reserved</p>',
                    'group' => "general",
                ],
                [
                    'name'  => "enable_mail_user_registered",
                    'val'   => 1,
                    'group' => "user",
                ],
                [
                    'name'  => "user_content_email_registered",
                    'val'   => '<h1 style="text-align: center">Welcome!</h1>
                    <h3>Hello [first_name] [last_name]</h3>
                    <p>Thank you for signing up with OneClickSolution! We hope you enjoy your time with us.</p>
                    <p>Regards,</p>
                    <p>OneClickSolution</p>',
                    'group' => "user",
                ],
                [
                    'name'  => "admin_enable_mail_user_registered",
                    'val'   => 1,
                    'group' => "user",
                ],
                [
                    'name'  => "admin_content_email_user_registered",
                    'val'   => '<h3>Hello Administrator</h3>
                    <p>We have new registration</p>
                    <p>Full name: [first_name] [last_name]</p>
                    <p>Email: [email]</p>
                    <p>Regards,</p>
                    <p>OneClickSolution</p>',
                    'group' => "user",
                ],
                [
                    'name'  => "user_content_email_forget_password",
                    'val'   => '<h1>Hello!</h1>
                    <p>You are receiving this email because we received a password reset request for your account.</p>
                    <p style="text-align: center">[button_reset_password]</p>
                    <p>This password reset link expire in 60 minutes.</p>
                    <p>If you did not request a password reset, no further action is required.
                    </p>
                    <p>Regards,</p>
                    <p>OneClickSolution</p>',
                    'group' => "user",
                ]
            ]);
        // Email Setting
        DB::table('core_settings')->insert([
                [
                    'name'  => "email_driver",
                    'val'   => "log",
                    'group' => "email",
                ],
                [
                    'name'  => "email_host",
                    'val'   => "smtp.mailgun.org",
                    'group' => "email",
                ],
                [
                    'name'  => "email_port",
                    'val'   => "587",
                    'group' => "email",
                ],
                [
                    'name'  => "email_encryption",
                    'val'   => "tls",
                    'group' => "email",
                ],
                [
                    'name'  => "email_username",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_password",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_mailgun_domain",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_mailgun_secret",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_mailgun_endpoint",
                    'val'   => "api.mailgun.net",
                    'group' => "email",
                ],
                [
                    'name'  => "email_postmark_token",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_ses_key",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_ses_secret",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_ses_region",
                    'val'   => "us-east-1",
                    'group' => "email",
                ],
                [
                    'name'  => "email_sparkpost_secret",
                    'val'   => "",
                    'group' => "email",
                ],
            ]);
        // Email Setting
        DB::table('core_settings')->insert([
            [
                'name'  => "booking_enquiry_for_hotel",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_for_tour",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_for_space",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_for_car",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_for_event",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_for_boat",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_type",
                'val'   => "booking_and_enquiry",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_enable_mail_to_vendor",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_mail_to_vendor_content",
                'val'   => "<h3>Hello [vendor_name]</h3>
                            <p>You get new inquiry request from [email]</p>
                            <p>Name :[name]</p>
                            <p>Emai:[email]</p>
                            <p>Phone:[phone]</p>
                            <p>Content:[note]</p>
                            <p>Service:[service_link]</p>
                            <p>Regards,</p>
                            <p>OneClickSolution</p>
                            </div>",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_enable_mail_to_admin",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_mail_to_admin_content",
                'val'   => "<h3>Hello Administrator</h3>
                            <p>You get new inquiry request from [email]</p>
                            <p>Name :[name]</p>
                            <p>Emai:[email]</p>
                            <p>Phone:[phone]</p>
                            <p>Content:[note]</p>
                            <p>Service:[service_link]</p>
                            <p>Vendor:[vendor_link]</p>
                            <p>Regards,</p>
                            <p>OneClickSolution</p>",
                'group' => "enquiry",
            ],
        ]);
        // Vendor setting
        DB::table('core_settings')->insert([
                [
                    'name'  => "vendor_enable",
                    'val'   => "1",
                    'group' => "vendor",
                ],
                [
                    'name'  => "vendor_commission_type",
                    'val'   => "percent",
                    'group' => "vendor",
                ],
                [
                    'name'  => "vendor_commission_amount",
                    'val'   => "10",
                    'group' => "vendor",
                ],
                [
                    'name'  => "vendor_role",
                    'val'   => "1",
                    'group' => "vendor",
                ],
                [
                    'name'  => "role_verify_fields",
                    'val'   => '{"phone":{"name":"Phone","type":"text","roles":["1","2","3"],"required":null,"order":null,"icon":"fa fa-phone"},"id_card":{"name":"ID Card","type":"file","roles":["1","2","3"],"required":"1","order":"0","icon":"fa fa-id-card"},"trade_license":{"name":"Trade License","type":"multi_files","roles":["1","3"],"required":"1","order":"0","icon":"fa fa-copyright"}}',
                    'group' => "vendor",
                ],
            ]);
        DB::table('core_settings')->insert([
                'name'  => 'enable_mail_vendor_registered',
                'val'   => '1',
                'group' => 'vendor'
            ]);
        DB::table('core_settings')->insert([
                'name'  => 'vendor_content_email_registered',
                'val'   => '<h1 style="text-align: center;">Welcome!</h1>
                            <h3>Hello [first_name] [last_name]</h3>
                            <p>Thank you for signing up with OneClickSolution! We hope you enjoy your time with us.</p>
                            <p>Regards,</p>
                            <p>OneClickSolution</p>',
                'group' => 'vendor'
            ]);
        DB::table('core_settings')->insert([
                'name'  => 'admin_enable_mail_vendor_registered',
                'val'   => '1',
                'group' => 'vendor'
            ]);
        DB::table('core_settings')->insert([
                'name'  => 'admin_content_email_vendor_registered',
                'val'   => '<h3>Hello Administrator</h3>
                            <p>An user has been registered as Vendor. Please check the information bellow:</p>
                            <p>Full name: [first_name] [last_name]</p>
                            <p>Email: [email]</p>
                            <p>Registration date: [created_at]</p>
                            <p>You can approved the request here: [link_approved]</p>
                            <p>Regards,</p>
                            <p>OneClickSolution</p>',
                'group' => 'vendor'
            ]);
        //            Cookie agreement
        DB::table('core_settings')->insert([
                [
                    'name'  => "cookie_agreement_enable",
                    'val'   => "1",
                    'group' => "advance",
                ],
                [
                    'name'  => "cookie_agreement_button_text",
                    'val'   => "Got it",
                    'group' => "advance",
                ],
                [
                    'name'  => "cookie_agreement_content",
                    'val'   => "<p>This website requires cookies to provide all of its features. By using our website, you agree to our use of cookies. <a href='#'>More info</a></p>",
                    'group' => "advance",
                ],
            ]);
        // Invoice setting
        DB::table('core_settings')->insert([
            [
                'name'  => 'booking_why_book_with_us',
                'val'   => '[{"title":"No-hassle best price guarantee","link":"#","icon":"flaticon-star"},{"title":"Customer care available 24\/7","link":"#","icon":"flaticon-support"},{"title":"Hand-picked Tours & Activities","link":"#","icon":"flaticon-favorites-button"},{"title":"Free Travel Insureance","link":"#","icon":"flaticon-airplane"}]',
                'group' => "booking",
            ],
            [
                'name'  => 'logo_invoice_id',
                'val'   => MediaFile::findMediaByName("logo")->id,
                'group' => "booking",
            ],
            [
                'name'  => "invoice_company_info",
                'val'   => "<p><span style=\"font-size: 14pt;\"><strong>OneClickSolution Company</strong></span></p>
                                <p>Ha Noi, Viet Nam</p>
                                <p>www.mytravel.test</p>",
                'group' => "booking",
            ],
        ]);
    }

    public function generalMenu($locale = ''){
        return  array(
            array(
                'name'       => 'Home',
                'url'        => '/',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Home Page',
                        'url'        => '/',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    // array(
                    //     'name'       => 'Home v2',
                    //     'url'        => '/page/home-v2',
                    //     'item_model' => 'custom',
                    //     'children'   => array(),
                    // ),
                    // array(
                    //     'name'       => 'Home Hotel',
                    //     'url'        => '/page/home-hotel',
                    //     'item_model' => 'custom',
                    //     'children'   => array(),
                    // ),
                    array(
                        'name'       => 'Home Tour',
                        'url'        => '/page/home-tour',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    // array(
                    //     'name'       => 'Home Space',
                    //     'url'        => '/page/home-space',
                    //     'item_model' => 'custom',
                    //     'children'   => array(),
                    // ),
                    // array(
                    //     'name'       => 'Home Event',
                    //     'url'        => '/page/home-event',
                    //     'item_model' => 'custom',
                    //     'children'   => array(),
                    // ),
                    // array(
                    //     'name'       => 'Home Car',
                    //     'url'        => '/page/home-car',
                    //     'item_model' => 'custom',
                    //     'children'   => array(),
                    // ),
                ),
            ),
            // array(
            //     'name'       => 'Hotel',
            //     'url'        => $locale.'/hotel',
            //     'item_model' => 'custom',
            //     'model_name' => 'Custom',
            //     'children'   => array(
            //         array(
            //             'name'       => 'Hotel List',
            //             'url'        => $locale.'/hotel',
            //             'item_model' => 'custom',
            //             'model_name' => 'Custom',
            //             'children'   => array(),
            //         ),
            //         array(
            //             'name'       => 'Hotel Map',
            //             'url'        => $locale.'/hotel?_layout=map',
            //             'item_model' => 'custom',
            //             'model_name' => 'Custom',
            //             'children'   => array(),
            //         ),
            //         array(
            //             'name'       => 'Hotel Detail',
            //             'url'        => $locale.'/hotel/parian-holiday-villas',
            //             'item_model' => 'custom',
            //             'model_name' => 'Custom',
            //             'children'   => array(),
            //         ),
            //     ),
            // ),
            array(
                'name'       => 'Adventure',
                'url'        => $locale.'/tour',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Adventure List',
                        'url'        => $locale.'/tour',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Adventure Map',
                        'url'        => $locale.'/tour?_layout=map',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Adventure Detail',
                        'url'        => $locale.'/tour/paris-vacation-travel',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
            // array(
            //     'name'       => 'Space',
            //     'url'        => $locale.'/space',
            //     'item_model' => 'custom',
            //     'model_name' => 'Custom',
            //     'children'   => array(
            //         array(
            //             'name'       => 'Space List',
            //             'url'        => $locale.'/space',
            //             'item_model' => 'custom',
            //             'model_name' => 'Custom',
            //             'children'   => array(),
            //         ),
            //         array(
            //             'name'       => 'Space Map',
            //             'url'        => $locale.'/space?_layout=map',
            //             'item_model' => 'custom',
            //             'model_name' => 'Custom',
            //             'children'   => array(),
            //         ),
            //         array(
            //             'name'       => 'Space Detail',
            //             'url'        => $locale.'/space/stay-greenwich-village',
            //             'item_model' => 'custom',
            //             'model_name' => 'Custom',
            //             'children'   => array(),
            //         ),
            //     ),
            // ),
            array(
                'name'       => 'Car Washing',
                'url'        => $locale.'/car',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Car Washing List',
                        'url'        => $locale.'/car',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Car Washing Map',
                        'url'        => $locale.'/car?_layout=map',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Car Washing Detail',
                        'url'        => $locale.'/car/vinfast-lux-a20-plus',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'Grooming',
                'url'        => $locale.'/event',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Grooming List',
                        'url'        => $locale.'/event',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Grooming Map',
                        'url'        => $locale.'/event?_layout=map',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Grooming Detail',
                        'url'        => $locale.'/event/aspen-glade-weddings-events',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
            // array(
            //     'name'       => 'Flight',
            //     'url'        => $locale.'/flight',
            //     'item_model' => 'custom',
            //     'model_name' => 'Custom',
            // ),
            // array(
            //     'name'       => 'Boat',
            //     'url'        => $locale.'/boat',
            //     'item_model' => 'custom',
            //     'model_name' => 'Custom',
            //     'children'   => array(
            //         array(
            //             'name'       => 'Boat List',
            //             'url'        => $locale.'/boat',
            //             'item_model' => 'custom',
            //             'model_name' => 'Custom',
            //             'children'   => array(),
            //         ),
            //         array(
            //             'name'       => 'Boat Map',
            //             'url'        => $locale.'/boat?_layout=map',
            //             'item_model' => 'custom',
            //             'model_name' => 'Custom',
            //             'children'   => array(),
            //         ),
            //         array(
            //             'name'       => 'Boat Detail',
            //             'url'        => $locale.'/boat/blue-moon-yc-300',
            //             'item_model' => 'custom',
            //             'model_name' => 'Custom',
            //             'children'   => array(),
            //         ),
            //     ),
            // ),
            array(
                'name'       => 'Pages',
                'url'        => '#',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    // array(
                    //     'name'       => 'News List',
                    //     'url'        => $locale.'/news',
                    //     'item_model' => 'custom',
                    //     'model_name' => 'Custom',
                    //     'children'   => array(),
                    // ),
                    // array(
                    //     'name'       => 'News Detail',
                    //     'url'        => $locale.'/news/morning-in-the-northern-sea',
                    //     'item_model' => 'custom',
                    //     'model_name' => 'Custom',
                    //     'children'   => array(),
                    // ),
                    // array(
                    //     'name'       => 'Location Detail',
                    //     'url'        => $locale.'/location/paris',
                    //     'item_model' => 'custom',
                    //     'children'   => array(),
                    // ),
                    array(
                        'name'       => 'Become a vendor',
                        'url'        => $locale.'/page/become-a-vendor',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Contact',
                        'url'        => $locale.'/contact',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
        );
    }
}
