<?php
namespace Modules\Event\Models;

use App\BaseModel;

class EventTerm extends BaseModel
{
    protected $table = 'bc_event_term';
    protected $fillable = [
        'term_id',
        'target_id'
    ];
}
