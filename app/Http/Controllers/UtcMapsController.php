<?php

namespace App\Http\Controllers;

use App\Models\Geo_utc;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Pharma;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use DataTables;
class UtcMapsController extends Controller
{



    //ajax request
    public function ajaxReq(Request $request)
    {
       $utc = DB::select('CALL colombiadb.ubicacion_utc(?)', [$request->input('nieve')]);
       return $utc;
    }
     //ajax request
     public function ajaxReqDep(Request $request)
     {
        $utc_dep = DB::select('CALL departamentos_(?)', [$request->input('nieve')]);
        return $utc_dep;
     }

      //ajax request
      public function listUTC(Request $request)
      {
         $utc = DB::select('CALL list_utc()');
         $data = DataTables::of($utc)
         ->addIndexColumn()
         ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);

         return  view('UTC.layout.listUTC', ['data' => $data ]);
      }


    //show all
    public function show(Request $request)
    {
        $regiones = Region::all();
        $list = DB::select('CALL list_utc()');
        return view('UTC.index', ['regiones' => $regiones, 'list'=> $list]);
    }

    public function search(Request $request){
        //echo $request;
        $pharma = pharma::all()->where('status', 'PENDIENTE');
        //return  view('form_geo.index', ['data' => $pharma ]);
        //return $pharma;
        return view('form_geo.index' , ['pharma' => $pharma]);
    }
}
