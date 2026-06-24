<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        return view('map');
    }

    public function getMapData()
    {
        return response()->json([
            "type" => "FeatureCollection",
            "features" => [
                [
                    "type" => "Feature",
                    "geometry" => [ "type" => "Point", "coordinates" => [107.657972, -7.003280] ],
                    "properties" => [ "type" => "start-point" ]
                ],
                [
                    "type" => "Feature",
                    "geometry" => [ "type" => "Point", "coordinates" => [107.628157, -6.969282] ],
                    "properties" => [ "type" => "end-point" ]
                ],
                [
                    "type" => "Feature",
                    "geometry" => [
                        "type" => "LineString",
                        "coordinates" => [
                            [107.657972, -7.003280],
                            [107.638783, -6.978381], 
                            [107.628157, -6.969282]                 
                        ]
                    ],
                    "properties" => [ "type" => "line" ]
                ],
                [
                    "type" => "Feature",
                    "geometry" => [
                        "type" => "Polygon",
                        "coordinates" => [[
                            [107.6250, -6.9680], 
                            [107.6310, -6.9680], 
                            [107.6310, -6.9760], 
                            [107.6250, -6.9760], 
                            [107.6250, -6.9680]  
                        ]]
                    ],
                    "properties" => [ "type" => "polygon" ]
                ]
            ]
        ]);
    }
}
