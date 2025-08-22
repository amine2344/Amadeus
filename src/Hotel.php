<?php

namespace ShaBax\Amadeus;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Hotel extends Model
{
    /*
    The Hotel Offers Search API enables you to search for hotel offers within a given city or geographical area for a given date range. The API lets you search over 900,000 hotels offering over 1 million individual offers.
    */
    public static function hotelOffersSearch($params){

        return MyClient::get('v3/shopping/hotel-offers', $params);
    }

    /*
    Search Hotels using its unique Id
    */
    public static function getHotelsByHotels($params){

        return MyClient::get('v1/reference-data/locations/hotels/by-hotels', $params);
    }

    /*
    Search Hotels in a city
    */
    public static function getHotelsByCity($params){

        return MyClient::get('v1/reference-data/locations/hotels/by-city', $params);
    }

    /*
    Search Hotels using Geocode
    */
    public static function getHotelsByGeocode($params){

        return MyClient::get('v1/reference-data/locations/hotels/by-geocode', $params);
    }

    /*
    Create Hotel Order
    */
    public static function createHotelOrder($data){

        return MyClient::post('v2/booking/hotel-orders', $data);
    }
}
