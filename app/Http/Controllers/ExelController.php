<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Pharma;
use Carbon\Carbon;

class ExelController extends Controller

{

    /**
    * @return \Illuminate\Support\Collection
    */

    public function export()
    {
        $date = Carbon::now()->toDateTimeString();
        $name_file = ($date);
        return Excel::download(new UsersExport, 'pharma_geo.xlsx' );
    }


}
