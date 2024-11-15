<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDF Ordenes {{ $orden->id }} {{ $orden->name }} {{ $orden->lastname1 }} {{ $orden->lastname2 }}</title>
    </head>

    <div class=delimitador>
        

<body>
    <br>
<img  class="membre" src="{{ $base64 }}" alt="">
        <div class="meminfo">
            <h3 class="letrasFlex">Orden de trabajo</h3>
            <div class="noOT">
                No.{{ str_pad($orden->id, 5, 0, STR_PAD_LEFT) }}
            </div>
        </div>
        @php 
        $si = ($orden->infoorden_cell == 'Si') ? true : false;

    @endphp 
    
    <header> 
        @if($si)
        <h2 style="position: absolute; margin-top:-25.2%; margin-left:35%; font-weight:bold;">LLAMAR ANTES DE IR</h2>
        @else
        <h2 style="position: absolute; margin-top:-25.2%; margin-left:35%; font-weight:bold;"></h2>
        @endif
    </header>



    <main > 
        <div class="cont">
        <div class="fondLimitador"></div>
        <table>
            <th class="clth112">Fecha Orden:</th>
            <th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ $fecha->dayName }}, {{ $fecha->day }}  de {{ $fecha->monthName }} de {{ $fecha->year }}
            </div>
            </th>  
            <th class="clth111">Fecha Programada:</th>
            <th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ $fecha2->dayName }}, {{ $fecha2->day }}  de {{ $fecha2->monthName }} de {{ $fecha2->year }}
            </div>
            </th>           
        </table>
            
        <table>
            <th class="clth11">Nombre Comercial:</th>
            <th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ $orden->tradename }}
            </div>
            </th> 
            <th>Hora:</th>
            <th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ $orden->time1}} A {{ $orden->time2 }}
            </div>
            </th>
        </table>
        <table>
            <th class="clth110">Nombre Personal:</th>
            <th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ $orden->name }} {{ $orden->lastname1 }} {{ $orden->lastname2 }}
            </div>
            </th> 
            <th> Telefono:</th>
            <th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ substr($orden->cell_phone, 0, 3) }} - {{ substr($orden->cell_phone, 3, 3) }} - {{ substr($orden->cell_phone, 6, 2) }} - {{ substr($orden->cell_phone, 8, 2) }} 
            </div>
            </th> 
        </table>
        <table>
            <th>Domicilio:</th>
            <th class="renDivTh" >
            <div class="renDivDom" style="text-transform: uppercase;">
                {{ $orden->street }} {{ $orden->home }} #{{ $orden->numAddress }}
            </div>
            </th> 
            <th>Colonia:</th>
            <<th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ $orden->colonia }} #{{ $orden->codigoPostal }}
            </div>
            </th> 
        </table>
        <table>
            <th class="clth1112">Localizacion:</th>
            <th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ $orden->how_to_get }}
            </div>
            </th>           
        </table>
        <table class="">
            <th class="clth1112" style="margin-left: -50px; padding-right:-50px;">Lugar:</th>
            <th class="renDivTh2">
            <div class="renDivlugar" style="text-transform: uppercase">
                {{ $orden->comercio }}
            </div>
            </th>
            <th class="clth1122" >Ciudad:</th>
            <th class="renDivThlocal">
            <div class="renDivcity" style="text-transform: uppercase;">
            {{ $orden->ciudad }}
            </div>
            </th>
            <th>Plagas:</th>
            <th class="renDivTh3">
            <div class="renDivplaga" style="text-transform: uppercase">
                {{ $orden->plague1 }} y {{ $orden->plague2 }}
            </div>
            </th> 
        </table>
        <table>
            <th>Observaciones:</th>
            <th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ $orden->description }}
            </div>
            </th> 
        </table>

        @php 
            $arreglo = json_decode($orden->hiring );
            $presupuesto=false;
            $fumigar=false;
            $garantia=false;
            $cortesia=false;
            $nada=false;
        
            foreach($arreglo as $item){
                if($item == 'Presupuesto'){ $presupuesto=true; }
                if($item == 'Fumigar'){ $fumigar=true; }
                if($item == 'Garantia'){ $garantia=true; }
                if($item == 'Cortesia'){ $cortesia=true; }
                if($item == 'Nada'){ $nada=true; }
            }
        @endphp

<table class="btnCir">
            
    <th style="text-align:center;">
        @if($presupuesto)
            <div class="" style="margin-left:25%;  display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; border-radius:50%; font-size:7.5px;">
                <h1 style="margin: 0;">X</h1>
            </div>
        @else
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
        @endif
    </th>            
    <th style="text-align:left; "> Presupuesto</th>

    <th>
        @if($fumigar)
        <div class="" style=" margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;">X</h1>
        </div>
            @else
            <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
                <h1 style="margin: 0;"></h1>
            </div>
        @endif
    </th>
    <th style="text-align:left;"> Fumigar</th>
    
    <th >
        @if($garantia)
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;">X</h1>
        </div>
        @else
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
        @endif
    </th>
    <th style="text-align:left; "> Garantia</th>
    <th> 
        @if($cortesia)
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;">X</h1>
        </div>
        @else
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
        @endif
    </th>
    <th style="text-align:left;"> Cortesia</th>
    <th> 
        @if($nada)
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;">X</h1>
        </div>
        @else
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
        @endif
    </th>
    <th style="text-align:left; margin-top:5px;"> Nada</th>
</table>

        <table class="">
            <th class="clth114">Producto Interno:</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th>
            <th>Externo:</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
        </table>
        <table class="">
            <th>Fumigador</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th>
            <th>Cotizacion</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
        </table>

<!-- 
        @php 
            $arreglo = json_decode($orden->requires );
            $factura=false;
            $certificado=false;
            $remision=false;
            $nada=false;
        
            foreach($arreglo as $item){
                if($item == 'Factura'){ $factura=true; }
                if($item == 'Certificado'){ $certificado=true; }
                if($item == 'Remision'){ $remision=true; }
                if($item == 'Nada'){ $nada=true; }
            }
        @endphp

<table class="btnCir2">
<th>Require de:</th>
    <th style="text-align:center;">
        @if($factura)
            <div class="" style="margin-left:25%;  display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; border-radius:50%; font-size:7.5px;">
                <h1 style="margin: 0;">X</h1>
            </div>
        @else
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
        @endif
    </th>            
    <th style="text-align:left; "> Factura</th>

    <th>
        @if($certificado)
        <div class="" style=" margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;">X</h1>
        </div>
            @else
            <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
                <h1 style="margin: 0;"></h1>
            </div>
        @endif
    </th>
    <th style="text-align:left;"> Certificado</th>
    
    <th >
        @if($remision)
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;">X</h1>
        </div>
        @else
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
        @endif
    </th>
    <th style="text-align:left; ">Remision</th>
    <th> 
        @if($nada)
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;">X</h1>
        </div>
        @else
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
        @endif
    </th>
    <th style="text-align:left;"> Nada</th>
    
</table>
-->

<table class="btnCir2">
<th>Require de:</th>
    <th style="text-align:center;">       
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
    </th>            
    <th style="text-align:left; "> Factura</th>

    <th>
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
    </th>
    <th style="text-align:left;"> Certificado</th>
    
    <th >
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
    </th>
    <th style="text-align:left; ">Remision</th>
    <th> 
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
    </th>
    <th style="text-align:left;"> Nada</th>
    
</table>


        <!--Antigua tabla
            <table class="btnCir2">
            <th>Require de:</th>
            <th ><button class="button button5"> </button>
            <th > Factura</th>
            <th><button class="button button5"> </button>
            <th> Certificado</th>
            <th><button class="button button5"> </button>
            <th> Remision</th>
            <th><button class="button button5"> </button>
            <th> Nada</th>
        </table>
        <table>
            <th class="clth1">Forma de contacto:</th>
            <th class="renDivTh">
            <div class="renDiv1">
                {{ $orden->contact_form }}
            </div>
            </th>  
            </th>         
        </table> 
        -->


        <div class="footDiv">
        </div>
        <table class="footer">
            <th class="footer">Col. Alamedas</th>
            <th>C.P. 31704</th>
            <th>Calle del Abeto #2201</th>
            <th>Nuevo Casas Grandes, Chihu. </th>
            <th>Tel.636-694-65-15</th>
        </table>
        </div>
        


        
    </main>
    </div>

    <br>
    <br>
    <div class="division2"></div>
    <div class="division"></div>
    
    
    
</body>
<body>
    <br>
<img  class="membre" src="{{ $base64 }}" alt="">
        <div class="meminfo">
            <h3 class="letrasFlex">Orden de trabajo</h3>
            <div class="noOT">
                No.{{ str_pad($orden->id, 5, 0, STR_PAD_LEFT) }}
            </div>
        </div>
    
    
        <header> 
            @if($si)
            <h2 style="position: absolute; margin-top:-25.2%; margin-left:35%; font-weight:bold;">LLAMAR ANTES DE IR</h2>
            @else
            <h2 style="position: absolute; margin-top:-25.2%; margin-left:35%; font-weight:bold;"></h2>
            @endif
        </header>

    <main > 
        <div class="cont">
        <div class="fondLimitador"></div>
        <table>
            <th class="clth112">Fecha Orden:</th>
            <th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ $fecha->dayName }}, {{ $fecha->day }}  de {{ $fecha->monthName }} de {{ $fecha->year }}
            </div>
            </th>  
            <th class="clth111">Fecha Programada:</th>
            <th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ $fecha2->dayName }}, {{ $fecha2->day }}  de {{ $fecha2->monthName }} de {{ $fecha2->year }}
            </div>
            </th>           
        </table>
            
        <table>
            <th class="clth11">Nombre Comercial:</th>
            <th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ $orden->tradename }}
            </div>
            </th> 
            <th>Hora:</th>
            <th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ $orden->time1}} A {{ $orden->time2 }}
            </div>
            </th>
        </table>
        <table>
            <th class="clth110">Nombre Personal:</th>
            <th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ $orden->name }} {{ $orden->lastname1 }} {{ $orden->lastname2 }}
            </div>
            </th> 
            <th> Telefono:</th>
            <th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ substr($orden->cell_phone, 0, 3) }} - {{ substr($orden->cell_phone, 3, 3) }} - {{ substr($orden->cell_phone, 6, 2) }} - {{ substr($orden->cell_phone, 8, 2) }} 
            </div>
            </th> 
        </table>
        <table>
            <th>Domicilio:</th>
            <th class="renDivTh">
            <div class="renDivDom" style="text-transform: uppercase">
                {{ $orden->street }} {{ $orden->home }} #{{ $orden->numAddress }}
            </div>
            </th> 
            <th>Colonia:</th>
            <<th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ $orden->colonia }} #{{ $orden->codigoPostal }}
            </div>
            </th> 
        </table>
        <table>
            <th class="clth1112">Localizacion:</th>
            <th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ $orden->how_to_get }}
            </div>
            </th>           
        </table>
        <table class="">
            <th class="clth1112" style="margin-left: -50px; padding-right:-50px;">Lugar:</th>
            <th class="renDivTh2">
            <div class="renDivlugar" style="text-transform: uppercase">
                {{ $orden->comercio }}
            </div>
            </th>
            <th class="clth1122" >Ciudad:</th>
            <th class="renDivThlocal">
            <div class="renDivcity" style="text-transform: uppercase;">
            {{ $orden->ciudad }}
            </div>
            </th>
            <th>Plagas:</th>
            <th class="renDivTh3">
            <div class="renDivplaga" style="text-transform: uppercase">
                {{ $orden->plague1 }} y {{ $orden->plague2 }}
            </div>
            </th> 
        </table>
        <table>
            <th>Observaciones:</th>
            <th class="renDivTh">
            <div class="renDiv" style="text-transform: uppercase">
                {{ $orden->description }}
            </div>
            </th> 
        </table>

        @php 
            $arreglo = json_decode($orden->hiring );
            $presupuesto=false;
            $fumigar=false;
            $garantia=false;
            $cortesia=false;
            $nada=false;
        
            foreach($arreglo as $item){
                if($item == 'Presupuesto'){ $presupuesto=true; }
                if($item == 'Fumigar'){ $fumigar=true; }
                if($item == 'Garantia'){ $garantia=true; }
                if($item == 'Cortesia'){ $cortesia=true; }
                if($item == 'Nada'){ $nada=true; }
            }
        @endphp

<table class="btnCir">
            
    <th style="text-align:center;">
        @if($presupuesto)
            <div class="" style="margin-left:25%;  display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; border-radius:50%; font-size:7.5px;">
                <h1 style="margin: 0;">X</h1>
            </div>
        @else
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
        @endif
    </th>            
    <th style="text-align:left; "> Presupuesto</th>

    <th>
        @if($fumigar)
        <div class="" style=" margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;">X</h1>
        </div>
            @else
            <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
                <h1 style="margin: 0;"></h1>
            </div>
        @endif
    </th>
    <th style="text-align:left;"> Fumigar</th>
    
    <th >
        @if($garantia)
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;">X</h1>
        </div>
        @else
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
        @endif
    </th>
    <th style="text-align:left; "> Garantia</th>
    <th> 
        @if($cortesia)
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;">X</h1>
        </div>
        @else
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
        @endif
    </th>
    <th style="text-align:left;"> Cortesia</th>
    <th> 
        @if($nada)
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;">X</h1>
        </div>
        @else
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
        @endif
    </th>
    <th style="text-align:left; margin-top:5px;"> Nada</th>
</table>

        <table class="">
            <th class="clth114">Producto Interno:</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th>
            <th>Externo:</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
        </table>
        <table class="">
            <th>Fumigador</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th>
            <th>Cotizacion</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
        </table>


        @php 
            $arreglo = json_decode($orden->requires );
            $factura=false;
            $certificado=false;
            $remision=false;
            $nada=false;
        
            foreach($arreglo as $item){
                if($item == 'Factura'){ $factura=true; }
                if($item == 'Certificado'){ $certificado=true; }
                if($item == 'Remision'){ $remision=true; }
                if($item == 'Nada'){ $nada=true; }
            }
        @endphp

<table class="btnCir2">
<th>Require de:</th>
    <th style="text-align:center;">
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
    </th>            
    <th style="text-align:left; "> Factura</th>

    <th>
            <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
                <h1 style="margin: 0;"></h1>
            </div>
    </th>
    <th style="text-align:left;"> Certificado</th>
    
    <th >
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
    </th>
    <th style="text-align:left; ">Remision</th>
    <th> 
        <div class="" style="margin-left:25%; display:flex; width: 17px; height:17px; border: 1px solid black; justify-content:center; align-items:center; border-radius:50%; font-size:7.5px;">
            <h1 style="margin: 0;"></h1>
        </div>
    </th>
    <th style="text-align:left;"> Nada</th>
    
</table>

        <!--Antigua tabla
            <table class="btnCir2">
            <th>Require de:</th>
            <th ><button class="button button5"> </button>
            <th > Factura</th>
            <th><button class="button button5"> </button>
            <th> Certificado</th>
            <th><button class="button button5"> </button>
            <th> Remision</th>
            <th><button class="button button5"> </button>
            <th> Nada</th>
        </table>
        <table>
            <th class="clth1">Forma de contacto:</th>
            <th class="renDivTh">
            <div class="renDiv1">
                {{ $orden->contact_form }}
            </div>
            </th>  
            </th>         
        </table> 
        -->


        <div class="footDiv">
        </div>
        <table class="footer">
            <th class="footer">Col. Alamedas</th>
            <th>C.P. 31704</th>
            <th>Calle del Abeto #2201</th>
            <th>Nuevo Casas Grandes, Chihu. </th>
            <th>Tel.636-694-65-15</th>
        </table>
        </div>
    </main>
    </div>
    <br>
    <br> 
</body>

<style>
    .clth1112{
        width: 5%;
    }
    .clth1122{
        width: -50%;
        padding: -100px;
    }
    .renDiv115{
        width: 100%;
        border-bottom: 1px solid black;
    }
    .clth20{
        margin-left:-50%;
    }
    .division2{
        width: 130%;
        margin-left:-60px;
        border:1px solid grey;
        margin-top:30px;
    }
    .division{
        width: 130%;
        margin-left:-60px;
        margin-top: 30px;
        padding-bottom:0px;   
    }
    .cont{
        margin-top:-5%;
    }
    .clth114{
        width: 32%;
    }
    .clth113{
        width: 19%;
    }
    .clth112{
        width: 31%;
    }
    .clth111{
        width: 43%;
    }
    .clth110{
        width: 33%;
    }
    .renDiv1{ 
        border-bottom: 1px solid black;
        height:15px;
        width:100%;
        margin-left:-5px;
        margin-top:4px;
    }
    .letrasflex{
        margin-top: 15px;
        padding-right:40px;
    }
    .meminfo{
        text-align: center;
        position: absolute;
        margin-left: -55%;
        margin-top:12%;
        
    }
    .membre{
        margin-top:40px;
        padding-left: 10%;
        height:12%;
        width: 80%;
    }    
    .delimitador{
        margin-top:-5%;
    }
    .renDivTh{
        width: 100%;
    }
    .renDivTh2{
        width: 33%;

    }
    .renDivTh3{
        width: 150%;

    }
    .renDivDom{
        border-bottom: 1px solid black;
        height:15px;
        width:100%;
    }
    .renDiv{
        border-bottom: 1px solid black;
        height:15px;
        width:100%;
    }.renDiv1{
        border-bottom: 1px solid black;
        height:15px;
        width:100%;
        margin-left:-5px;
    }.clth1{
        width: 44%;
    }.clth11{
        width: 37%;
    }
    .renDivloca{
        border-bottom: 1px solid black;
        height:15px;
        width:100%;
    }
    .renDivThlocal{
    
        width: 70%;
    }
    .renDivlugar{
        border-bottom: 1px solid black;
        width: 100%;
        font-size: 9;
    }
    .renDivplaga{
        border-bottom: 1px solid black;
        width: 100%;
        font-size: 9;
    }
    .renDivcity{
        border-bottom: 1px solid black;
        width: 100%;
    }
    body{
        width: 100%;
        
    }
    h1{
        text-align:center;
    }
    img{
        margin-top:30px;
        height:100px;
        width: 75px;
    }
    table{
        width:100%;
        font-size:15pt;
    }
    .dInAc{
        height: 35px;
        margin:20px;
        background-color:#104e85 ;
        color:white;
        text-align:center;       
    }
    .tblAg{
        position:absolute;
        
    }
    .footDiv{
        border-bottom:2px solid grey;
        margin-top:15px;
        width: 100%;
    }
    
    .fondLimitador{
        position: absolute;
        background-color:transparent;
        height:275px;
        width: 60px;;
        left:95%;
    }
    .divLogo {
        position: absolute;
        
    }
    .noOT{ 
        position: absolute;
        margin-top:-38px;
        margin-left:145px;
        border:1px solid black;
        width: 100px;
        
    }

    
    footer{
        position:absolute;
        left:20%;
    }
    th{
        float: left;
        font-size:13px;
        font-weight: normal;
        width: auto;
    }
.button {
        height: 4px;
        height: 4px;
        background-color: white;
        border: 1px solid black;
        color: white;
        padding: 7px;
        
        text-decoration: none;
        font-size: 14px;
        text-align: start;
    }  
.button5 {
    text-align: start;
    height: 4px;
    height: 4px;
    border-radius: 50%;
    margin-right:-30px;
    background-color:blue;
}

.btnCan{
    border-radius: 50%;
    margin-right:-30px;
    background-color:rgba(0, 0, 255, 0);
}
.btnCir{    
    font-size:15px;
    font-weight: normal;
    width: 90%;
}
.btnCir2{    
    font-size:15px;
    font-weight: normal;
    width: 90%;

}
.pr{
    margin-top:20px;
}


</style>
</html>
