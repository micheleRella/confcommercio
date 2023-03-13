<?php

namespace App\Imports;

use App\Models\Shop;
use Maatwebsite\Excel\Concerns\ToModel;

class ShopsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $geocode = app('geocoder')->geocode($row[2])->get();
        $lat = $geocode[0]->getCoordinates()->getLatitude();
        $long = $geocode[0]->getCoordinates()->getLongitude();
        
        return new Shop([
            'title'     => $row[0],
            'description'    => $row[1],
            'address' => $row[2],
            'phone' => $row[3],
            'lat' => $lat,
            'long' => $long
        ]);
    }
}
