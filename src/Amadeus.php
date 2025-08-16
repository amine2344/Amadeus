<?php

namespace ShaBax\Amadeus;

use App\Http\Controllers\Controller;

class Amadeus extends Controller
{
    public static $client_id;
    public static $client_secret;
    public static $grant_type;
    public static $sandbox;
    public static $test_link;
    public static $live_link;
    public static $timeout;
    public static $RETURNTRANSFER;

    public static $access_token = null;
    public static $base_url = null;

    public function __construct()
    {
        self::$client_id       = config('amadeus.client_id');
        self::$client_secret   = config('amadeus.client_secret');
        self::$grant_type      = config('amadeus.grant_type', 'client_credentials');
        self::$sandbox         = config('amadeus.sandbox', true);
        self::$test_link       = config('amadeus.test_link', 'https://test.api.amadeus.com/');
        self::$live_link       = config('amadeus.live_link', 'https://api.amadeus.com/');
        self::$timeout         = config('amadeus.timeout', 30);
        self::$RETURNTRANSFER  = config('amadeus.RETURNTRANSFER', true);

        self::$base_url = self::$sandbox ? self::$test_link : self::$live_link;

        // Ensure we always have a token
        if (!self::$access_token) {
            Auth::getAccessToken();
        }
    }

    public static function flightLowFareSearch($params)
    {
        return Flight::flightLowFareSearch($params);
    }

    public static function flightInspirationSearch($params)
    {
        return Flight::flightInspirationSearch($params);
    }

    public static function flightCheapestDateSearch($params)
    {
        return Flight::flightCheapestDateSearch($params);
    }

    public static function flightOffersSearch($params)
    {
        return Flight::flightOffersSearch($params);
    }

    public static function flightSeatMap($params)
    {
        return Flight::flightSeatMap($params);
    }
}
