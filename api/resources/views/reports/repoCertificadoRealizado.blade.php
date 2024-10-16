<!DOCTYPE html>
<html lang="es">
    <title>Certificado {{ $data->id_orden }} {{ $data->name }} {{ $data->lastname1 }} {{ $data->lastname2 }}</title>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <div class="delimitador">
        
<body >
        <img class="membre" src="{{ $base64 }}" alt="">
        <div class="meminfo">
            <h5 class="mgntp">CALLE ABETO 2201 COL. ALAMEDAS</h5>
            <h5 class="mgntp">NUEVO CASAS GRANDES, CHIH. C.P. 31704</h5>
        </div>     
        <h2 class="cerapli">CERTIFICADO DE APLICACIÓN</h2>
        <h2 class="cerapli1"><p>Licencia Sanitaria 04-08A095</h2>
        
    
    <main> 
        <div class="fondLimitador"></div>
        <table>
            <th class="thtt">FECHA:</th>
            <th class="renDivTh">
                <div class="renDiv" style="text-transform: uppercase">
                <?php
                //setlocale(LC_ALL, 'es_MX.UTF-8','esp');
                //date_default_timezone_set("America/Mexico_City"); // Establece el locale para español
                // strtoupper(strftime("%A,  %d de %B de %Y", strtotime($data->certificateDate))) 
                ?>
                    {{ $fecha->dayName }}, {{ $fecha->day }}  de {{ $fecha->monthName }} de {{ $fecha->year }}
                 
                </div>
            </th>            
        </table>
            
        <table>
            <th>NOMBRE:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ strtoupper($data->certificateName) }}
            </div>
            </th> 
        </table>
        <table>
            <th>TEL.</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ substr($data->cell_phone, 0, 3) }} - {{ substr($data->cell_phone, 3, 3) }} - {{ substr($data->cell_phone, 6, 2) }} - {{ substr($data->cell_phone, 8, 2) }} 
            </div>
            </th> 
        </table>
        <table>
            <th> DOMICILIO:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ strtoupper($data->home) }} #{{ $data->numAddress }}
            </div>
            </th> 
        </table>
        <table>
            <th>COLONIA:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ strtoupper($data->colonia) }}
            </div>
            </th> 
            <th>C.P.</th>
            <<th class="renDivTh">
            <div class="renDiv">
                #{{ $data->codigoPostal }}
            </div>
            </th> 
        </table>
        <table>
            <th>CIUDAD:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ strtoupper($data->ciudad) }}
            </div>
            </th>             
            <th> ESTADO:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ strtoupper($data->estado) }}
            </div>
            </th> 
        </table>
        <table>
            <th class="clth11">TIPO DE LUGAR A FUMIGAR:</th>
            <th class="renDivTh">
            <div class="renDiv1">
                {{ strtoupper($data->comercio) }}
            </div>
            </th>             
            </th> 
        </table>
        <div class="dInAc">
            <p>PRODUCTO UTILIZADO (INGREDIENTE ACTIVO)</p>
        </div>
        <table>
            <th>INTERIOR:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ strtoupper($data->productoInt) }}

            </div>
            </th> 
        </table>
        <table class="">
            <th>EXTERIOR:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ strtoupper($data->productoExt) }}

            </div>
            </th> 
        </table>
        <table>
            <th>OBSERVACIONES:</th>
            <th class="renDivTh">
            
                <h5 class= "txtObser">Tapar los utensilios de cocina y alimentos, Ventilar durante minimo 1 hora para la re-entrada. Para mayor efectividad de la fumigación, no trapear por las zonas en las que se aplico, mantener limpieza constante,  la basura tapada y evitar la humedad.</h5>                
            
            </th> 
        </table>
        <div class="footDiv">

        </div>
        <table class="">
            <div class="bottom">
                <h5 class="txtfin">"Porque, en casa fumigada, no entran bichos"</h5>
                <h5 class="txtfin1">VALIDO UNICAMENTE POR 30 DIAS</h5>     
                <h5 class="txtfin">LLAMANOS AL 636-694-65-15</h5>
                <h5 class="idCert">
                    No. {{ str_pad($data->id, 5, 0, STR_PAD_LEFT) }}                 
                </h5>
                </div>
            
            </th> 
        </table>

        

    </main>
    </div>
    
</body>

<div class="separacion"></div>

<div class="copia">
    <body>
        <img class="membre" src="{{ $base64 }}" alt="">
                <div class="meminfo1">
                    <h3>COPIA</h3>
                    <h5 class="mgntp">CALLE ABETO 2201 COL. ALAMEDAS</h5>
                    <h5 class="mgntp">NUEVO CASAS GRANDES, CHIH. C.P. 31704</h5>
                </div>     
                <h2 class="cerapli11">CERTIFICADO DE APLICACION</h2>
                <h2 class="cerapli1"><p>Licencia Sanitaria 04-08A095</h2>
                
            <header>    
                
            </header>
            <main> 
                <div class="fondLimitador"></div>
                <table>
                    <th class="thtt">FECHA:</th>
                    <th class="renDivTh">
                    <div class="renDiv" style="text-transform: uppercase">
                        {{ $fecha->dayName }}, {{ $fecha->day }}  de {{ $fecha->monthName }} de {{ $fecha->year }}
                     </div>
                    </th>            
                </table>
                    
                <table>
                    <th>NOMBRE:</th>
                    <th class="renDivTh">
                    <div class="renDiv">
                        {{ strtoupper($data->certificateName) }}
                    </div>
                    </th> 
                </table>
                <table>
                    <th>TEL.</th>
                    <th class="renDivTh">
                    <div class="renDiv">
                        {{ substr($data->cell_phone, 0, 3) }} - {{ substr($data->cell_phone, 3, 3) }} - {{ substr($data->cell_phone, 6, 2) }} - {{ substr($data->cell_phone, 8, 2) }} 
                    </div>
                    </th> 
                </table>
                <table>
                    <th> DOMICILIO:</th>
                    <th class="renDivTh">
                    <div class="renDiv">
                        {{ strtoupper($data->home) }} #{{ $data->numAddress }}
                    </div>
                    </th> 
                </table>
                <table>
                <table>
                    <th>COLONIA:</th>
                    <th class="renDivTh">
                    <div class="renDiv">
                        {{ strtoupper($data->colonia) }}
                    </div>
                    </th> 
                    <th>C.P.</th>
                    <<th class="renDivTh">
                    <div class="renDiv">
                        #{{ $data->codigoPostal }}
                    </div>
                    </th> 
                </table>
                <table>
                    <th>CIUDAD:</th>
                    <th class="renDivTh">
                    <div class="renDiv">
                        {{ strtoupper($data->ciudad) }}
                    </div>
                    </th>             
                    <th> ESTADO:</th>
                    <th class="renDivTh">
                    <div class="renDiv">
                        {{ strtoupper($data->estado) }}
                    </div>
                    </th> 
                </table>
                <table>
                    <th class="clth11">TIPO DE LUGAR A FUMIGAR:</th>
                    <th class="renDivTh">
                    <div class="renDiv1">
                        {{ strtoupper($data->comercio) }}
                    </div>
                    </th>             
                    </th> 
                </table>
                <div class="dInAc">
                    <p>PRODUCTO UTILIZADO (INGREDIENTE ACTIVO)</p>
                </div>
                <table>
                    <th>INTERIOR:</th>
                    <th class="renDivTh">
                    <div class="renDiv">
                        {{ strtoupper($data->productoInt) }}
                    </div>
                    </th> 
                </table>
                <table class="">
                    <th>EXTERIOR:</th>
                    <th class="renDivTh">
                    <div class="renDiv">
                        {{ strtoupper($data->productoExt) }}
                    </div>
                    </th> 
                </table>
                <table>
                    <th>OBSERVACIONES:</th>
                    <th class="renDivTh">
                    
                        <h5 class= "txtObser">Tapar los utensilios de cocina y alimentos, Ventilar durante minimo 1 hora para la re-entrada. Para mayor efectividad de la fumigación, no trapear por las zonas en las que se aplico, mantener limpieza constante,  la basura tapada y evitar la humedad.</h5>                
                    
                    </th> 
                </table>
                <div class="footDiv">
        
                </div>
                <table class="">
                    <div class="bottom">
                        <h5 class="txtfin">"Porque, en casa fumigada, no entran bichos"</h5>
                        <h5 class="txtfin1">VALIDO UNICAMENTE POR 30 DIAS</h5>     
                        <h5 class="txtfin">LLAMANOS AL 636-694-65-15</h5>
                        <h5 class="idCert1">
                            No. {{ str_pad($data->id, 5, 0, STR_PAD_LEFT) }}   
                            
                        </h5>
                        </div>
                    
                    </th> 
                </table>
        
                
            </main>
            
        </body>

</div>


<style>
    .thdomicilio{
        position:;
        text-align: justify;
        text-decoration: underline;
    }
    th{
        font-size:13px;
        font-weight: normal;

    }
    .bottom{
        text-align: center;
        font-size: 15px;
    }
    h5{
        font-size: 15px;
    }
    .clth11{
        width: 66%;
    }
    .renDiv1{ 
        border-bottom: 1px solid black;
        height:15px;
        width:100%;
        margin-left:-5px;
        margin-top:-5px;
        font-size: 15px;
    }
    .cerapli{
        color:#eb590c;
        position:absolute;
        margin-left:-31%;
        margin-top:12.5%;
        font-size: 16px;
        
    }
    .cerapli11{
        color:#eb590c;
        position:absolute;
        margin-left:-65%;
        margin-top:26.5%;
        font-size: 16px;
        
    }
    .cerapli1{
        color:#eb590c;
        position:absolute;
        margin-left:-77%;
        margin-top:18%;
        font-size: 12px;
        
    }
    .mgntp{
        margin-top: -20px;
        font-size: 12px;
    }
    .meminfo{
        text-align: center;
        position: absolute;
        margin-left: -31%;
        margin-top:11%;
        font-size: 12px;
    }
    .meminfo1{
        text-align: center;
        position: absolute;
        margin-left: -65%;
        margin-top:23%;
        font-size: 12px;
    }
    .membre{
        margin-top:40px;
        padding-left: 10%;
        height:12%;
        width: 80%;
    }
    .txtfin1{
        padding-left:15px;
        font-size: 16px;
        margin-top:-20px;
        color:red;
    }
    .txtfin{
        padding-left:15px;
        font-size: 16px;
        margin-top:-20px;
        color:#104e85;
    }
    .flexId{
        
        display:flex;
    }
    .idCert{
        position: absolute;
        font-size: 18px;
        margin-left:35%;
        margin-top:-25px;
        height:25px;
        width: 150px;
        color: red;
    }
    .idCert1{
        position: absolute;
        font-size: 18px;
        margin-left:75%;
        margin-top:-37px;
        height:25px;
        width: 150px;
        color: red;
    }
    .txtObser{
        font-size: 13px;
        margin-right: 5px;
        margin-top:0;
        text-align: justify;
        text-decoration: underline;
    }
    .renDivTh{
        width: 100%;
        margin-top:-25px; 
    }
    .renDiv{
        border-bottom: 1px solid black;
        height:15px;
        width: 100%;
        margin-top:-5px;
        font-size: 15px;
    }
    h1{
        text-alaing:center;
    }
    img{
        margin-top:30px;
        height:100px;
        width: 75px;
    }
    table{
        width: 100%;
        font-size:20px;
        margin-top:10px;
    }
    
    .delimitador{
        border: 1px solid black;
        width: 100%;
        height:99%;
    }
    .dInAc{
        height: 25px;
        margin:20px;
        margin-bottom: -20px;
        margin-top: -20px;
        background-color:#104e85 ;
        color:white;
        text-align:center;  
    }
    .tblAg{
        position:absolute;
        
    }
    p{
        text-align:center;
        font-size:16pX;   
        margin-top: 5%;
    }
    .agnAct{
        
    }
    .footDiv{
        margin:20px;
        margin-top:-10px;
        border-bottom:2px solid rgb(0, 0, 0);
    }
    
    .fondLimitador{
        position: absolute;
        background-color:transparent;
        width: 60px;;
        left:95%;
    }
    .divLogo {
        position: absolute;
        
    }
    .letrasFlex{
        position:relative; 
        display: flex;
        justify-content: space-between;
    }
    .noOT{
        margin-top:-40px;
        margin-left: 35px;
    }
    .button {
        background-color: white;
        border: 1px solid black;
        color: white;
        padding: 7px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 4px;
    }
    .button5 {
        border-radius: 50%;
    }
    .btnCir{
        position:absolute;
        left:15%;
    }
    .pr{
        margin-top:20px;
    }
    footer{
        position:absolute;
        margin-top:40px;
        left:20%;
    }
    
    body{
        width: 47%;
        height: 100%;
        
    }
    main{
        height: 70%;
    }
    .separacion{
        position: absolute;
        left: 49%;
        margin-top: -72%;
        height: 120%;
        
        border: 1px solid black;
    }
    .copia{
        position: absolute;
        left: 51%;
        margin-top: -67.5%;
        width: 47%;
        height: 98.7%;
        border: 1px solid black;
    }
    h3{
        position: absolute;
        margin-top: -43%;
        margin-left: 115%;
        font-size: 18px;
        border: 1px solid black;
        height: 20px;
        width: 70px;
    }

</style>
</html>
