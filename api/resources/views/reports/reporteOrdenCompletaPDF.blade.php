<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDF Ordenes Completadas {{ $ordenCompleta->id }} {{ $ordenCompleta->name }} {{ $ordenCompleta->lastname1 }} {{ $ordenCompleta->lastname2 }}</title>
    </head>

    <div class=delimitador>
        

<body>
    <br>
<img  class="membre" src="{{ $base64 }}" alt="">
        <div class="meminfo">
            <h3 class="letrasFlex">Orden de trabajo</h3>
            <div class="noOT">
                No.
                {{ $ordenCompleta->id_orden }}
            </div>
        </div>
    
    
    <header>    
        
    </header>

    <main > 
        <div class="cont">
        <div class="fondLimitador"></div>
        <table>
            <th class="clth112">Fecha orden:</th>
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
            <div class="renDiv">
                {{ $ordenCompleta->tradename }}
            </div>
            </th> 
            <th>Hora:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->time1}} A {{ $ordenCompleta->time2 }}
            </div>
            </th>
        </table>
        <table>
            <th class="clth110">Nombre Personal:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->name }} {{ $ordenCompleta->lastname1 }} {{ $ordenCompleta->lastname2 }}
            </div>
            </th> 
            <th> Telefono:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ substr($ordenCompleta->cell_phone, 0, 3) }} - {{ substr($ordenCompleta->cell_phone, 3, 3) }} - {{ substr($ordenCompleta->cell_phone, 6, 2) }} - {{ substr($ordenCompleta->cell_phone, 8, 2) }} 
            </div>
            </th> 
        </table>
        <table>
            <th>Domicilio:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->street }} {{ $ordenCompleta->home }} #{{ $ordenCompleta->numAddress }}
            </div>
            </th> 
            <th>Colonia:</th>
            <<th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->colonia }} #{{ $ordenCompleta->codigoPostal }}
            </div>
            </th> 
        </table>
        <table>
            <th class="clth1112">Localizacion:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->how_to_get }}
            </div>
            </th>           
        </table>
        <table class="">
            <th>Lugar:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->comercio }}
            </div>
            </th>
            <th class="clth1122">Ciudad:</th>
            <th class="renDivTh">
            <div class="renDiv">
            {{ $ordenCompleta->ciudad }}
            </div>
            </th>
            <th>Plagas:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->plague1 }} y {{ $ordenCompleta->plague2 }}
            </div>
            </th> 
        </table>
        <table>
            <th>Observaciones:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->description }}
            </div>
            </th> 
        </table>

        
<table class="btnCir">
            <th ><button class="button button5"> </button>
            <th class=> Presupuesto</th>
            <th><button class="button button5"> </button>
            <th> Fumigar</th>
            <th><button class="button button5"> </button>
            <th> Garantia</th>
            <th><button class="button button5"> </button>
            <th> Cortesia</th>
            <th><button class="button button5"> </button>
            <th> Otros</th>
        </table>
        <table class="">
            <th class="clth114">Producto Interno:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->productoInt1 }} y {{ $ordenCompleta->productoInt2 }}
            </div>
            </th>
            <th>Externo:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->productoExt1 }} y {{ $ordenCompleta->productoExt2 }}
            </div>
            </th> 
        </table>
        <table class="">
            <th>Fumigador</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->responsable }}
            </div>
            </th>
            <th>$Cotizacion</th>
            <th class="renDivTh">
            <div class="renDiv">
                ${{ $ordenCompleta->pago }}
            </div>
            </th> 
        </table>
        <table class="btnCir">
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
                {{ $ordenCompleta->contact_form }}
            </div>
            </th>  
            </th>         
        </table>


        <div class="footDiv">
        </div>
        <table class="footer">
            <th class="footer">Calle del Abeto 2201</th>
            <th> Col. Alamedas </th>
            <th> Tel.636-694-65-15</th>
            <th> Nuevo Casas Grandes, Chihu. </th>
            <th> C.P. 31704</th>
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
                No.
                {{ $ordenCompleta->id }}
            </div>
        </div>
    
    
    <header>    
        
    </header>

    <main class="cont"> 
        <div class="cont">
        <div class="fondLimitador"></div>
        <table>
            <th class="clth112">Fecha orden:</th>
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
            </th>           
        </table>
            
        <table>
            <th class="clth11">Nombre Comercial:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->tradename }}
            </div>
            </th> 
            <th>Hora:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->time1}} A {{ $ordenCompleta->time2 }}
            </div>
            </th>
        </table>
        <table>
            <th class="clth110">Nombre Personal:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->name }} {{ $ordenCompleta->lastname1 }} {{ $ordenCompleta->lastname2 }}
            </div>
            </th> 
            <th> Telefono:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->cell_phone }}
            </div>
            </th> 
        </table>
        <table>
            <th>Domicilio:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->street }} {{ $ordenCompleta->home }} #{{ $ordenCompleta->numAddress }}
            </div>
            </th> 
            <th>Colonia:</th>
            <<th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->colonia }} #{{ $ordenCompleta->codigoPostal }}
            </div>
            </th> 
        </table>
        <table>
            <th class="clth1112">Localizacion:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->how_to_get }}
            </div>
            </th>           
        </table>
        
        
        <table class="">
            <th>Lugar:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->comercio }}
            </div>
            </th>
            <th class="clth1122">Ciudad:</th>
            <th class="renDivTh">
            <div class="renDiv">
            {{ $ordenCompleta->ciudad }}
            </div>
            </th> 
            <th>Plagas:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->plague1 }} y {{ $ordenCompleta->plague2 }}
            </div>
            </th> 
        </table>
        <table>
            <th>Observaciones:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->description }}
            </div>
            </th> 
        </table>

        
<table class="btnCir">
            <th ><button class="button button5"> </button>
            <th class=> Presupuesto</th>
            <th><button class="button button5"> </button>
            <th> Fumigar</th>
            <th><button class="button button5"> </button>
            <th> Garantia</th>
            <th><button class="button button5"> </button>
            <th> Cortesia</th>
            <th><button class="button button5"> </button>
            <th> Otros</th>
        </table>
        <table class="">
            <th class="clth114">Producto Interno:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->productoInt1 }} y {{ $ordenCompleta->productoInt2 }}
            </div>
            </th>
            <th>Externo:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->productoExt1 }} y {{ $ordenCompleta->productoExt2 }}
            </div>
            </th> 
        </table>
        <table class="">
            <th>Fumigador</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $ordenCompleta->responsable }}
            </div>
            </th>
            <th>$Cotizacion</th>
            <th class="renDivTh">
            <div class="renDiv">
                ${{ $ordenCompleta->pago }}
            </div>
            </th> 
        </table>
        <table class="btnCir">
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
                {{ $ordenCompleta->contact_form }}
            </div>
            </th>  
            </th>         
        </table>


        <div class="footDiv">
        </div>
        <table class="footer">
            <th class="footer">Calle del Abeto 2201</th>
            <th> Col. Alamedas </th>
            <th> Tel.636-694-65-15</th>
            <th> Nuevo Casas Grandes, Chihu. </th>
            <th> C.P. 31704</th>
        </table>
        </div>
        


        
        </div>

    </main>
    </div>

    
    
</body>

<style>
    .clth1112{
        width: 5%;
    }
    .clth1122{
        width: 15%;
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
        padding-right:40px;
    }
    .meminfo{
        text-align: center;
        position: absolute;
        margin-left: -55%;
        margin-top:11%;
        
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
    body{
        width: 100%;
        
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
        width:100%;
        font-size:15pt;
    }
    .dInAc{
        height: 35px;
        margin:20px;
        background-color:#104e85 ;
        color:white;
        text-aling:center;       
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
        background-color: white;
        border: 1px solid black;
        color: white;
        padding: 7px;
        text-align: center;
        text-decoration: none;
        font-size: 4px;
    }  
.button5 {
    border-radius: 50%;
    margin-right:-30px;
    background-color:blue;
}
.btnCir{    

    font-size:15px;
    font-weight: normal;
    width: 90%;
    justify-content: space-between;
}
.pr{
    margin-top:20px;
}

</style>
</html>
