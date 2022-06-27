<?php
namespace Modules\Space\Models;

use App\BaseModel;

class SpaceTerm extends BaseModel
{
    protected $table = 'bc_space_term';
    protected $fillable = [
        'term_id',
        'target_id'
    ];
}