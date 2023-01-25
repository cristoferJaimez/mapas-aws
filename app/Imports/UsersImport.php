<?php

namespace App\Imports;

use App\Models\Pharma;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pharma([
            'cod' => $row['cod'] ,
            'name_original' => $row['name_original'] ,
            'adress' => $row['adress'] ,
            'lat' => $row['lat'] ,
            'lng' => $row['lng'] ,
            'adress_real' => $row['adress_real'] ,
            'img' => $row['img'] ,
            'updated_at' => $row['updated_at'] ,
        ]);
    }
}
