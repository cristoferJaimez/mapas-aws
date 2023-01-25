<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CalculosController extends Controller
{
    public function topValor(Request $request){

        //array a campos resividos
        $arr_utc = [];
        $explode_id = array_map('intval', explode(',', $request->arr_utc));
        //realizar laconsulta segun datos
        $numero = count($explode_id);

        for ($i=0; $i < $numero ; $i++) {
             $res =  DB::select('CALL dev_powerbi.suma_valores_unidades(?)', [$explode_id[$i]]);
             array_push($arr_utc, $res);
        }

        $arr_clean = array_filter($arr_utc);
        $arr_clean_ = array_values($arr_clean);
        $numero_ = count($arr_utc);


        //total de torta
        //return $arr_clean_[1][0]->TOTAL_VALORES;
        $total_valores = 0;
        $total_unidades = 0;

        $num = count($arr_clean_);
        for ($i=0; $i < $num  ; $i++) {
            $total_valores +=  $arr_clean_[$i][0]->TOTAL_VALORES;
            $total_unidades +=  $arr_clean_[$i][0]->TOTAL_UNIDADES;
        }


        //farmacias
        $arr_puntos = [];
        for ($i=0; $i < $numero ; $i++) {
            $res =  DB::select('CALL dev_powerbi.total_puntos(?)', [$explode_id[$i]]);
        $arr_puntos = array_merge($arr_puntos, $res);
       }



       //mi farmacia
       $myFarmacia =  DB::select('CALL dev_powerbi.farmacia(?)', [$request->farmacia]);



        return  ['total_valores'=> $total_valores, 'arr_utc_one' => $arr_clean_,'total_unidades'=> $total_unidades, 'total_puntos' => $arr_puntos , 'farmacia' => $myFarmacia ];


    }
    //top 10 productos
    public function topProductos(Request $request){


        $arr_prod = [];
        $arr_lab = [];
        $arr_mole = [];

        $explode_id = array_map('intval', explode(',', $request->arr_utc));
        //realizar laconsulta segun datos
        $numero = count($explode_id);

        if($request->select === "1"){
            for ($i=0; $i < $numero ; $i++) {
                $res =  DB::select('CALL dev_powerbi.top_productos(?)', [$explode_id[$i]]);
              $arr_prod =  array_merge($arr_prod, $res);
           }
           array_multisort(array_column($arr_prod, 'VAL'), SORT_DESC, $arr_prod);
           //unificar  productos
           return $arr_prod;

        }else if($request->select === "2"){
            for ($i=0; $i < $numero ; $i++) {
                $res =  DB::select('CALL dev_powerbi.top_labs(?)', [$explode_id[$i]]);
             $arr_lab =  array_merge($arr_lab, $res);
           }

           array_multisort(array_column($arr_lab, 'VAL'), SORT_DESC, $arr_lab);

           //UNIFICAR
           return  $arr_lab;
        }else if($request->select === "3"){

        }

    }

    public function My(Request $request){

    }


}

