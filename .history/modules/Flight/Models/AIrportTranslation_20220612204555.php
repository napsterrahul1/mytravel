<?php
namespace Modules\Location\Models;

use App\BaseModel;

class AIrportTranslation extends BaseModel
{
    protected $table = 'bc_location_translations';
    protected $fillable = ['name', 'sub_title', 'content','trip_ideas'];
    protected $seo_type = 'location_translation';
    protected $cleanFields = [
        'content'
    ];
    protected $casts = [
        'trip_ideas'  => 'array',
    ];
}
