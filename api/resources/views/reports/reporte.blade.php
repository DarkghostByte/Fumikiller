<!DOCTYPE html>
<html lang="en">


    <div class=delimitador>
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDF Ordenes</title>
    </head>
<body>
<img  class="membre" src="{{ $base64 }}" alt="">
        <div class="meminfo">
            <h3 class="letrasFlex">Orden de trabajo</h3>
            <div class="noOT">
                No.
                {{ $orden->id }}
            </div>
        </div>
    
    
    <header>    
        
    </header>

    <main > 
        <div class="cont">
        <div class="fondLimitador"></div>
        <table>
            <th class="clth112">Fecha Orden:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $orden->date1 }}
            </div>
            </th>  
            <th class="clth111">Fecha Programada:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $orden->date2 }}
            </div>
            </th>           
        </table>
            
        <table>
            <th class="clth11">Nombre Comercial:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $cliente->tradename }}
            </div>
            </th> 
            <th>Hora:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $orden->time1}} A {{ $orden->time2 }}
            </div>
            </th>
        </table>
        <table>
            <th class="clth110">Nombre Personal:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $cliente->name }} {{ $cliente->lastname1 }} {{ $cliente->lastname2 }}
            </div>
            </th> 
            <th> Telefono:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $cliente->cell_phone }}
            </div>
            </th> 
        </table>
        <table>
            <th>Domicilio:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $cliente->street }} {{ $cliente->home }} #{{ $cliente->numAddress }}
            </div>
            </th> 
            <th>Colonia:</th>
            <<th class="renDivTh">
            <div class="renDiv">
                {{ $cliente->colonia }} #{{ $cliente->codigoPostal }}
            </div>
            </th> 
        </table>
        <table>
            <th class="clth1112">Localizacion:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $cliente->how_to_get }}
            </div>
            </th>           
        </table>
        <table class="">
            <th>Lugar:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $cliente->comercio }}
            </div>
            </th>
            <th class="clth1122">Ciudad:</th>
            <th class="renDivTh">
            <div class="renDiv">
            {{ $cliente->ciudad }}
            </div>
            </th>
            <th>Plagas:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $orden->plague1 }} y {{ $orden->plague2 }}
            </div>
            </th> 
        </table>
        <table>
            <th>Observaciones:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $cliente->description }}
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
            <th>$Cotizacion</th>
            <th class="renDivTh">
            <div class="renDiv">
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
            <th class="clth113">Ultima Fumigacion:</th>
            <th class="renDivTh">
            <div class="renDiv1">
            </div>
            </th>          
        </table>
        <table>
            <th class="clth1">Forma de contacto:</th>
            <th class="renDivTh">
            <div class="renDiv1">
                {{ $cliente->contact_form }}
            </div>
            </th>  
            <th class="clth1">Pasado a bitacora:</th>
            <th class="renDivTh">
            <div class="renDiv1">
            </div>
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

    <div class="division2"></div>
    <div class="division"></div>
    
    
    
</body>
<body>
<img  class="membre" src="{{ $base64 }}" alt="">
        <div class="meminfo">
            <h3 class="letrasFlex">Orden de trabajo</h3>
            <div class="noOT">
                No.
                {{ $orden->id }}
            </div>
        </div>
    
    
    <header>    
        
    </header>

    <main class="cont"> 
        <div class="cont">
        <div class="fondLimitador"></div>
        <table>
            <th class="clth112">Fecha Orden:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $orden->date1 }}
            </div>
            </th>  
            <th class="clth111">Fecha Programada:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $orden->date2 }}
            </div>
            </th>           
        </table>
            
        <table>
            <th class="clth11">Nombre Comercial:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $cliente->tradename }}
            </div>
            </th> 
            <th>Hora:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $orden->time1}} A {{ $orden->time2 }}
            </div>
            </th>
        </table>
        <table>
            <th class="clth110">Nombre Personal:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $cliente->name }} {{ $cliente->lastname1 }} {{ $cliente->lastname2 }}
            </div>
            </th> 
            <th> Telefono:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $cliente->cell_phone }}
            </div>
            </th> 
        </table>
        <table>
            <th>Domicilio:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $cliente->street }} {{ $cliente->home }} #{{ $cliente->numAddress }}
            </div>
            </th> 
            <th>Colonia:</th>
            <<th class="renDivTh">
            <div class="renDiv">
                {{ $cliente->colonia }} #{{ $cliente->codigoPostal }}
            </div>
            </th> 
        </table>
        <table>
            <th class="clth1112">Localizacion:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $cliente->how_to_get }}
            </div>
            </th>           
        </table>
        
        
        <table class="">
            <th>Lugar:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $cliente->comercio }}
            </div>
            </th>
            <th class="clth1122">Ciudad:</th>
            <th class="renDivTh">
            <div class="renDiv">
            {{ $cliente->ciudad }}
            </div>
            </th> 
            <th>Plagas:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $orden->plague1 }} y {{ $orden->plague2 }}
            </div>
            </th> 
        </table>
        <table>
            <th>Observaciones:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $cliente->description }}
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
            <th>$Cotizacion</th>
            <th class="renDivTh">
            <div class="renDiv">
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
            <th class="clth113">Ultima Fumigacion:</th>
            <th class="renDivTh">
            <div class="renDiv1">
            </div>
            </th>          
        </table>
        <table>
            <th class="clth1">Forma de contacto:</th>
            <th class="renDivTh">
            <div class="renDiv1">
                {{ $cliente->contact_form }}
            </div>
            </th>  
            <th class="clth1">Pasado a bitacora:</th>
            <th class="renDivTh">
            <div class="renDiv1">
            </div>
            </th>         
        </table>


        <div class="footDiv">
        </div>
        <table class="footer">
            <th class="footer">Calle del Abeto No.2201</th>
            <th> Col. Alamedas </th>
            <th> Tel.636-694-65-15</th>
            <th> Nuevo Casas Grandes, Chihu. </th>
            <th> C.P. 31704</th>
        </table>
        


        
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
