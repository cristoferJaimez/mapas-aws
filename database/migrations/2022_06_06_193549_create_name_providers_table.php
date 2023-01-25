<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    static $providers = [
        ['Copservir', 'https://iconape.com/wp-content/files/ax/261011/svg/261011.svg'],
        ['Coopidrogas', 'https://iconape.com/wp-content/files/tm/260963/svg/260963.svg'],
        ['Colsubsidio', 'https://7212050.fs1.hubspotusercontent-na1.net/hubfs/7212050/Sitio%20.COM/new-content/nuevo-logo-colsubsidio-2021.svg'],
        ['Unidrogas', 'https://unidrogas.com/assets/logo/navbar-logo.png'],
        ['Olimpica', 'https://upload.wikimedia.org/wikipedia/commons/4/4c/Olimpical.png'],
        ['Dromedicas', ''],
        ['Farmatodo', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/Farmatodo_logo.svg/2560px-Farmatodo_logo.svg.png'],
        ['Eticos', ''],
        ['Cafam', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Cafam_logo.svg/2560px-Cafam_logo.svg.png'],
        ['Cruz Verde', 'https://chipichape.com.co/tienda/administracion//uploads/1563210110-cruz%20verde%20logo.jpg']
];

    public function up()
    {
        Schema::create('name_providers', function (Blueprint $table) {
            //
        });

        foreach (self::$providers as $pro) {
            DB::table("providers")
            ->insert(['description' => $pro[0] ,
                      'url' => $pro[1]
                    ]);
            }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('name_providers');
    }
};
