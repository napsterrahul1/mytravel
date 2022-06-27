<?php

namespace Modules\Hotel\Models;

use App\BaseModel;

class HotelTranslation extends Hotel
{
    protected $table = 'bc_hotel_translations';

    protected $fillable = [
        'title',
        'content',
        'address',
        'policy',
        'surrounding',
        'badge_tags',
    ];

    protected $slugField     = false;
    protected $seo_type = 'hotel_translation';

    protected $cleanFields = [
        'content'
    ];
    protected $casts = [
        'policy'  => 'array',
        'surrounding' => 'array',
        'badge_tags' => 'array',
    ];

    public function getSeoType(){
        return $this->seo_type;
    }
    public function getRecordRoot(){
        return $this->belongsTo(Hotel::class,'origin_id');
    }
}