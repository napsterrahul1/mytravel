<?php
namespace Modules\Boat\Models;

use App\BaseModel;

class BoatTerm extends BaseModel
{
    protected $table = 'bc_boat_term';
    protected $fillable = [
        'term_id',
        'target_id'
    ];
}