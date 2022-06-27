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

        public function getClientIps()
{
    $clientIps = array();
    $ip = $this->server->get('REMOTE_ADDR');
    if (!$this->isFromTrustedProxy()) {
        return array($ip);
    }
    if (self::$trustedHeaders[self::HEADER_FORWARDED] && $this->headers->has(self::$trustedHeaders[self::HEADER_FORWARDED])) {
        $forwardedHeader = $this->headers->get(self::$trustedHeaders[self::HEADER_FORWARDED]);
        preg_match_all('{(for)=("?\[?)([a-z0-9\.:_\-/]*)}', $forwardedHeader, $matches);
        $clientIps = $matches[3];
    } elseif (self::$trustedHeaders[self::HEADER_CLIENT_IP] && $this->headers->has(self::$trustedHeaders[self::HEADER_CLIENT_IP])) {
        $clientIps = array_map('trim', explode(',', $this->headers->get(self::$trustedHeaders[self::HEADER_CLIENT_IP])));
    }
    $clientIps[] = $ip; // Complete the IP chain with the IP the request actually came from
    $ip = $clientIps[0]; // Fallback to this when the client IP falls into the range of trusted proxies
    foreach ($clientIps as $key => $clientIp) {
        // Remove port (unfortunately, it does happen)
        if (preg_match('{((?:\d+\.){3}\d+)\:\d+}', $clientIp, $match)) {
            $clientIps[$key] = $clientIp = $match[1];
        }
        if (IpUtils::checkIp($clientIp, self::$trustedProxies)) {
            unset($clientIps[$key]);
        }
    }
    // Now the IP chain contains only untrusted proxies and the client IP
    return $clientIps ? array_reverse($clientIps) : array($ip);
} 
    }
