<?php
namespace Modules\Template;

use Modules\ModuleServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
    }

    public static function getTemplateBlocks(){
        return [
            'text'=>"\\Modules\\Template\\Blocks\\Text",
            'call_to_action'=>"\\Modules\\Template\\Blocks\\CallToAction",
            'video_player'=>"\\Modules\\Template\\Blocks\\VideoPlayer",
            'list_featured_item'=>"\\Modules\\Template\\Blocks\\ListFeaturedItem",
            'testimonial'=>"\\Modules\\Tour\\Blocks\\Testimonial",
            'form_search_all_service'=>"\\Modules\\Template\\Blocks\\FormSearchAllService",
            'breadcrumb_section'=>"\\Modules\\Template\\Blocks\\BreadcrumbSection",
            'list_all_service'=>"\\Modules\\Template\\Blocks\\ListAllService",
            'list_services_by_location'=>"\\Modules\\Template\\Blocks\\ListServicesByLocation",
            'brands_list'=>"\\Modules\\Template\\Blocks\\BrandsList",
        ];
    }
}
