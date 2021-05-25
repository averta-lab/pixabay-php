<?php
namespace Averta\Pixabay;

use GuzzleHttp\Client;


class Pixabay
{

    public static $apiKey = '';

    public function __construct( $apiKey )
    {
        self::$apiKey = $apiKey;
    }

    public static function image($options = [])
    {
        $endpoint = 'https://pixabay.com/api/';
        $options = array_merge($options, ['key' => self::$apiKey]);

        $client = new Client;
        $response = $client->get("$endpoint?" . http_build_query($options));

        return json_decode( $response->getBody(), true );
    }


    public static function video($options = [])
    {

        $endpoint = 'https://pixabay.com/api/videos/';
        $options = array_merge($options, ['key' => self::$apiKey]);

        $client = new Client;
        $response = $client->get("$endpoint?" . http_build_query($options));

        return json_decode( $response->getBody(), true );
    }
}
