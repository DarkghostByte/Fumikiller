<!DOCTYPE html>
<html lang="en">


    <div class="delimitador">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDF Ordenes</title>
    </head>
<body >
<table class="tblDia" >
    <h5 class="txtDia">DIA</h5>
    <h5 class="txtDia1">{{ $data->RemisionDate }}</h5>
</table>
<img class="membre" src="{{ $base64 }}" alt="">
    
    <div class="meminfo">
        
        <div >
            <h2 class="letrasFlex" class="letrasFlex">REMISION</h2>
        </div>
    </div>
    <header>    
        
    </header>

    <main> 
        <div class="fondLimitador"></div>
        <table>
            <th class="clth1">RAZON SOCIAL:</th>
            <th class="renDivTh">
            <div class="renDiv1">
                {{ $data->tradename }}
            </div>
            </th>  
        </table>
            
        <table>
            <th class="clth">NOMBRE:</th>
            <th class="renDivTh">
            <div class="renDiv1">
                {{ $data->name }} {{ $data->lastname1 }} {{ $data->lastname2 }}
            </div>
            </th>  
        </table>
        <table>
            <th>DOMICILIO:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $data->home }} #{{ $data->numAddress }}
            </div>
            </th> 
            <th> CIUDAD:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $data->ciudad }}
            </div>
            </th> 
        </table>
        <table>
            <th class="clth11">COLONIA:</th>
            <th class="renDivTh">
            <div class="renDiv1">
                {{ $data->colonia }} #{{ $data->codigoPostal }}
            </div>
            </th> 
            <th class="clth11">TELEFONO:</th>
            <<th class="renDivTh">
            <div class="renDiv1">
                {{ $data->number_fixed_number }}
            </div>
            </th> 
            <th class="clth11">CELULAR:</th>
            <<th class="renDivTh">
            <div class="renDiv1">
                {{ $data->cell_phone }}
            </div>
            </th> 
        </table>
        <table>
            <th class="clth1">TIPO DE LUGAR:</th>
            <th class="renDivTh">
            <div class="renDiv1">
                {{ $data->comercio }}
            </div>
            </th>  
        </table>
        <div >
        <table class="btnCir">
            
            <th class="clth118">REQUIERE DE:</th>
            <div class="btntxt"></div>
            <th class="clth22" > Certificado</th>
            <th class="btnrd"><button class="button button5"> </button>
            <th class="clth114">NUMERO:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $data->RemisionCertificado }}
            </div>
            </th> 
            <th class="clth113">IMPORTE:</th>
            <th class="renDivTh">
            <div class="renDiv13">
                {{ $data->RemisionMonto }}
            </div>
            </th>
            
        </table>

        </div>
        
        <table class="">
            <th>OBSERVACIONES:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $data->RemisionObservaciones }}
            </div>
            </th>            
        </table>

        <div class="ctr">
            <h5 class="tipo">ORIGINAL CLIENTE</h5>
        </div>

        <div class="footDiv">
        </div>
        <table class="footer">
            <th class="footer">Calle del Abeto No.2201</th>
            <th> Col. Alamedas </th>
            <th> C.P. 31704</th>
            <th> Nuevo Casas Grandes, Chihu. </th>
            <th> Tel.636-694-65-15</th>
            
            
        </table>
        


        
    </main>
    </div>
    <div class="separacion"></div>
    
</body>
<body >
<table class="tblDia" >
    <h5 class="txtDia">DIA</h5>
    <h5 class="txtDia1">{{ $data->RemisionDate }}</h5>
</table>
<img class="membre" src="{{ $base64 }}" alt="">
    <div class="meminfo">
        <div >
            <h2 class="letrasFlex" class="letrasFlex">REMISION</h2>
            
        </div>
    
    </div>
    
    
    <header>    
        
    </header>

    <main> 
        <div class="fondLimitador"></div>
        <table>
            <th class="clth1">RAZON SOCIAL:</th>
            <th class="renDivTh">
            <div class="renDiv1">
                {{ $data->tradename }}
            </div>
            </th>  
        </table>
            
        <table>
            <th class="clth">NOMBRE:</th>
            <th class="renDivTh">
            <div class="renDiv1">
                {{ $data->name }} {{ $data->lastname1 }} {{ $data->lastname2 }}
            </div>
            </th>  
        </table>
        <table>
            <th>DOMICILIO:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $data->home }} #{{ $data->numAddress }}
            </div>
            </th> 
            <th> CIUDAD:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $data->ciudad }}
            </div>
            </th> 
        </table>
        <table>
            <th class="clth11">COLONIA:</th>
            <th class="renDivTh">
            <div class="renDiv1">
                {{ $data->colonia }} #{{ $data->codigoPostal }}
            </div>
            </th> 
            <th class="clth11">TELEFONO:</th>
            <<th class="renDivTh">
            <div class="renDiv1">
                {{ $data->number_fixed_number }}
            </div>
            </th> 
            <th class="clth11">CELULAR:</th>
            <<th class="renDivTh">
            <div class="renDiv1">
                {{ $data->cell_phone }}
            </div>
            </th> 
        </table>
        <table>
            <th class="clth1">TIPO DE LUGAR:</th>
            <th class="renDivTh">
            <div class="renDiv1">
                {{ $data->comercio }}
            </div>
            </th>  
        </table>
        <div >
        <table class="btnCir">
            
            <th class="clth118">REQUIERE DE:</th>
            <div class="btntxt"></div>
            <th class="clth22" > Certificado</th>
            <th class="btnrd"><button class="button button5"> </button>
            <th class="clth114">NUMERO:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $data->RemisionCertificado }}
            </div>
            </th> 
            <th class="clth113">IMPORTE:</th>
            <th class="renDivTh">
            <div class="renDiv13">
                {{ $data->RemisionMonto }}
            </div>
            </th>
            
        </table>

        </div>
        
        <table class="">
            <th>OBSERVACIONES:</th>
            <th class="renDivTh">
            <div class="renDiv">
                {{ $data->RemisionObservaciones }}
            </div>
            </th>            
        </table>

        <div class="ctr">
            <h5 class="tipo">COPIA FUMI-KILLE'R</h5>
        </div>

        <div class="footDiv">
        </div>
        <table class="footer">
            <th class="footer">Calle del Abeto No.2201</th>
            <th> Col. Alamedas </th>
            <th> C.P. 31704</th>
            <th> Nuevo Casas Grandes, Chihu. </th>
            <th> Tel.636-694-65-15</th>
        </table>
    </main>
    </div>
    
</body>

<style>
    .txtDia{
        justify-content: center;
        text-align: center;
        justify-content: center;
        width: 38px;;
        margin-top:-20px;
        margin-left:75%;
        border: 1px solid black;
    }
    .txtDia1{
        justify-content: center;
        text-align: center;
        justify-content: center;
        width: 100px;
        position:absolute;
        margin-top:-49px;
        margin-left:80%;
        border: 1px solid black;
    }
    .txtBDDia{
        left:80%;
    }.tblDia{
        position:absolute;
        justify-content:end;
    }
    .separacion{
        margin-top: 40px;
        border-top:2px solid black;
        padding-bottom:40px;
    }
    .ctr{
        justify-content: center;
    }
    .tipo{
        justify-content: center;
        text-align: center;
        justify-content: center;
        margin-left:75%;
        margin-top: 5px;
        height:27px;
        width: 150px;
        border:1px solid black;
    }
    .clth118{
        width:63.7%;
    }
    .btnrd{
        position:absolute;
        margin-left: 10%;
    }
    .clth22{
        width:85%;
    }
    .clth114{
        width: 30%;
        
    }
    .clth113{
        weight:30%;
    }
    .clth1{
        width: 21%;
    }
    .letrasflex{
        left: 20px;
    }
    .meminfo{
        text-align: center;
        position: absolute;
        margin-left: -42%;
        margin-top:11%;
        
    }
    .membre{
        margin-top:40px;
        padding-left: 10%;
        height:12%;
        width: 80%;
    }    
    .nmM{
        padding-left:50px;
    }
    .delimitador{
        width: 100%;
    }
    .renDivTh{
        width: 100%;
    }
    .renDiv{
        border-bottom: 1px solid black;
        height:15px;
        width:100%;
    }
    .renDiv13{
        border-bottom: 1px solid black;
        height:15px;
        width:210%;        

    }
    .renDiv1{
        
        border-bottom: 1px solid black;
        height:15px;
        width:100%;
        margin-left:-5px;
    }.clth11{
        width: 50%;
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
        margin:20px;
        border-bottom:4px solid grey;
        margin-top:15px;
        
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
        margin-top:-22px;
        margin-left:150px;
        border:1px solid black;
    }

    
    footer{
        position:absolute;
        left:20%;
        
    }
    th{
        float: left;
        font-size:15px;
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
    margin-left:-40px;    
    background-color:blue;
}
.btnCir{
    font-size:15px;
    font-weight: normal;
    width: 90%;
    
    

}
.pr{
    margin-top:20px;
}

</style>
</html>
