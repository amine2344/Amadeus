<?php

namespace ShaBax\Amadeus;

class Flight
{
    public static function flightLowFareSearch($params)
    {
        return MyClient::get('v1/shopping/flight-offers', $params);
    }

    public static function flightInspirationSearch($params)
    {
        return MyClient::get('v1/shopping/flight-destinations', $params);
    }

    public static function flightCheapestDateSearch($params)
    {
        return MyClient::get('v1/shopping/flight-dates', $params);
    }

    public static function flightOffersSearch($params)
    {
        return MyClient::get('v2/shopping/flight-offers', $params);
    }

    public static function flightSeatMap($params)
    {
        return MyClient::get('v1/shopping/seatmaps', $params);
    }
}
