<style>
    .card-loading{
        z-index: 4;
        width: 100%;
        height: 100%;
        background: rgb(211, 69, 69);
        color: #fff;
    }
    
</style>

<!--msm-loading-->
<div class="card-loading text-center d-none">
    Loading...
</div>



<!--tablas stadisitcas-->

<div class="card rounded m-2">
    <div class="btn-toolbar m-1" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary" onclick="drawing_col()"><i class="fa-solid fa-earth-americas"></i></i></button>
        <button type="button" class="btn btn-secondary" > <i class="fa-solid fa-layer-group"></i></button>
        <button type="button" class="btn btn-secondary"  onclick="btn_gf()">   <i class="fa-solid fa-chart-simple"></i></button>
       
        </div>
        <div class="btn-group mr-2"  role="group" aria-label="Third group">
            <button type="button" class="btn btn-secondary" onclick="home(11001011641)"><i class="fa-solid fa-home"></i></button>          
        </div>
    </div>

        <table class="table table-striped" style="font-size: 0.7em">
            <thead>
                <tr>
                    <td colspan="2">
                        <select  style="font-size: 0.9em" name="" id="">
                            <option value="">Laboratorio</option>
                            <option value="">Producto</option>
                            <option value="">Molecula</option>
                        </select>
                    </td>
                    <td colspan="2">
                        <select  style="font-size: 0.9em" class=" ">
                            <option value="">UND</option>
                            <option value="">VAL</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th colspan="4" class="text-center bg-secondary" style="color: #fff">TOTAL</th>
                </tr>
                
                <tr>
                    <th>TOP</th>
                    <th>PESOS</th>
                    <th>UND</th>
                    <th>VAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
</div>

<div class="card rounded m-2">
    <span class="card-title">
        <h2></h2>
    </span>
        <table class="table table-striped" style="font-size: 0.7em">
            <thead>
                <tr>
                    <th colspan="2">PROPIAS</th>
                    <th colspan="2">UTC</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
  
</div>


<!--información-->

