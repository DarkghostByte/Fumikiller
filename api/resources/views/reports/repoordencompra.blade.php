<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDF Ordenes de Compra</title>
    </head>

    <div class=delimitador>
        
@foreach ($ordenCompra as $ordenCompra)
<body>
    <br>
<img  class="membre" src="{{ $base64 }}" alt=""/>
<table class="tblDia" >
    <td class="txtDia">FOLIO</td>
    <td class="txtDia1">{{ str_pad($ordenCompra->id, 5, 0, STR_PAD_LEFT) }}</td>
    
</table>
        

    <header> 
    </header>



    <main >
        <div class="cont">
        <div class="fondLimitador"></div>
        <table>
            <th class="clthpara" style="width: 0; "></th>
            <th class="renDivTh" style="text-align: left;">Fecha:
            <div class="renDiv" style="text-transform: uppercase"> 
                {{ $ordenCompra->fechaOrdenCompra }}
            </div>
            </th>  
        </table>
            
        <table>
            <th class="clthpara" style="width: 0;"></th>
            <th class="renDivTh" style="text-align: left;">Para:
            <div class="renDiv" style="text-transform: uppercase">
                {{ $ordenCompra->paraOrdenCompra }}
            </div>
            </th> 
            
        </table>
        <table>
            <th class="clthpara" style="width: 0;"></th>
            <th class="renDivthsepa">
            <div class="renDiv" style="text-transform: uppercase">
            </div>
            </th>      
        </table>
        <table>
        <th class="clthpara" style="width: 0;"></th>
            <th class="renDivThCon" >"Concepto" 
            <div class="" style="text-transform: uppercase;">
                {{ $ordenCompra->conceptoOrdenCompra }}
            </div>
            </th>  
        </table>
        <table>
            <th class="clthpara" style="width: 0;"></th>
            <th class="renDivthsepa">
            <div class="renDiv" style="text-transform: uppercase">
            </div>
            </th>      
        </table>
        <table>
            <th class="clthpara" style="width: 0;"></th>
            <th class="renDivThCon" >"Detalle" 
            <div class="" style="text-transform: uppercase;">
                {{ $ordenCompra->detalleOrdenCompra }}
            </div>
            </th>  
        </table>
        <table>
            <th class="clthpara" style="width: 0;"></th>
            <th class="renDivThCon" >Empleado: 
            <div class="" style="text-transform: uppercase;">
                {{ $ordenCompra->empleadoOrdenCompra }}
            </div>
            </th>  
            <th class="importe">IMPORTE</th>
            <h5 class="importe1"> $ {{ $ordenCompra->importeOrdenCompra }}</h5>
        </table>


        <table class="tblauto" >
            <td class="txtauto">Autorizo:</td>
            <td class="txtauto1"></td>
        </table>
        <table>
            <td style="text-align: center; font-size:16px;">Nombre del empleado que autoriza</td>
            <td style="text-align: center; font-size:16px;">{{ $ordenCompra->autorizoOrdenCompra }}</td>
        </table>
        
        <div class="footDiv"></div>
        <div class="footDiv2"></div>
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
@endforeach

<style>
    .importe{
        width: 60px;
        height: 17px;
        border: 1px solid black;
        text-align: center;
        font-size: 12px;
    }
    .importe1{
        width: 80px;
        height: 20px;
        border: 1px solid black;
        margin-left: -3px;
        text-align: left;
        font-size: 12px;
    }
    .txtDia{
        text-align: center;
        width: 65px;
        height: 20px;
        margin-top:-20px;
        padding-right: -10px;
        border: 1px solid black;
    }
    .txtDia1{
        text-align: center;
        width: 80px;
        border: 1px solid black;
        margin-top: 0px;
        
    }
    .tblDia{
        width: 15%;
        margin-left: -12%;
        position:absolute;
    }
    .tblauto{
        margin-top: 20px;
        width: 15%;
        margin-left: 30%;

    }


    .txtauto{
        text-align: center;
        width: 65px;
        margin-top:-20px;
        padding-right: -10px;
    }
    .txtauto1{
        width: 200px;
        border-bottom: 1px solid black;
    }
    
    .renDivthsepa{
        width: 100%;
        position: left;
        padding-top: 7px;
    }
    .renDivThCon{
        width: 100%;
        text-align: left;
        border-bottom: 1px solid black;
        height: 5px;
    }
    .renDivThaut{
        width: 10px;
        text-align: center;
        border-bottom: 1px solid black;
        height: 5px;
        
    }
    .autori{
        background-color: red;
        width: 100%;
        text-align: center;
        justify-content: center;
    }
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
   
    .meminfo{
        text-align: center;
        position: absolute;
        margin-left: -20%;
        margin-top:-4%;
        
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
        height:7px;
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
        border-bottom:4px solid grey;
        margin-top:15px;
        width: 100%;
    }
    .footDiv2{
        border-bottom:2px solid grey;
        margin-top:5px;
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
        background-color: aqua;
        position: absolute;
        margin-top:-38px;
        margin-left:200%;
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
