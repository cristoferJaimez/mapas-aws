<?php

namespace App\Exports;

use App\Models\Pharma;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $list_pharma = DB::table('phar')->where('status', 'OK');
        return Pharma::all();
        //return $list_pharma;
    }
}
