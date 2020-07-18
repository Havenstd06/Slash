<?php

namespace App;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $table = 'urls';

    protected $primaryKey = 'id';

    protected $fillable = [
        'original_url',
        'short_url'
    ];

    public function getRouteKeyName() 
    {
        return 'short_url';
    }

    public function getLink() 
    {
        return url('/') . '/' .$this->short_url;
    }

    public function getFavicon()
    {
        $api = 'https://favicongrabber.com/api/grab/';
        $json = $api . parse_url($this->original_url, PHP_URL_HOST);
        $request = Http::get($json);
        $json = $request->json();

        if (!isset($json['icons'][0]['src'])) {
            $guzzle = new \GuzzleHttp\Client();
            $cache = new \FaviconFinder\DummyCache();
            $ttl = 60;
            $favicon = new \FaviconFinder\Favicon($guzzle, $cache, $ttl);

            return $favicon->get($this->original_url);
        }

        $favicon = $json['icons'][0]['src'];

        return $favicon;
    }
}
