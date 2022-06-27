<?php


    namespace Modules\Flight\Models;


    use App\BaseModel;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Modules\Flight\Factories\AirportFactory;
    use Modules\Location\Models\Location;

    class Airport extends BaseModel
    {
        use HasFactory;
        use SoftDeletes;
        use NodeTrait;
        protected $table = 'airportcitydata';

        protected $fillable=[
            'name',
            'code',
            'city',
            'city_code',
            'destination_code',
            'country_code',
            // 'map_lng',
            // 'map_zoom',
        ];

        protected static function newFactory()
        {
            return AirportFactory::new();
        }
        public function location(){
            return $this->belongsTo(Location::class,'location_id');
        }
    }
