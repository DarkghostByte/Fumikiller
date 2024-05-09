<!DOCTYPE html>
<html lang="en">


    <div class=delimitador>
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDF Ordenes</title>
    </head>
<body >
<img src="{{ $base64 }}" alt="">
    <div class="divLogo">
        <h3>Sistema de Fumigaciones Urbanas</h3> 
        <div >
            <h3 class="letrasFlex">Certificado de aplicacion</h3>
            <div class="noOT">
                <h4>LicenCia Sanitaria 04-08A095</h4>
            </div>
        </div>
    
    </div>
    
    
    <header>    
        
    </header>
    <main> 
        <div class="fondLimitador"></div>
        <table>
            <th>Fecha </th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th>            
        </table>
            
        <table>
            <th>Nombre</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
        </table>
        <table>
            <th>Tel.</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
            <th> Domicilio:</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
        </table>
        <table>
        <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
        </table>
        <table>
            <th>Colinia</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
            <th>C.P.</th>
            <<th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
        </table>
        <table>
            <th>Ciudad</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th>             
            <th> Estado</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
        </table>
        <div class="dInAc">
            <p>Producto Utilizado (Agente activo)</p>
        </div>
        <table>
            <th>Interior</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
        </table>
        <table class="">
            <th>Exterior</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
        </table>
        <table>
            <th>Observaciones</th>
            <th class="renDivTh">
            <div class="renDiv">
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


        
    </main>
    </div>
    
</body>

<style>
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
        width: 100%;
        font-size:20px;
        margin-top:10px;
    }
    .renDivTh{
        width: 100%;
    }
    .renDiv{
        border-bottom: 1px solid black;
        height:15px;
        width: 100%;
        margin-top:3px;
    }
    .delimitador{
        border: 1px solid black;
        width: 100%;
        height:99%;
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
    p{
        text-align:center;
        font-size:20pt;    
    }
    .agnAct{
        
    }
    .footDiv{
        margin:20px;
        border-bottom:2px solid grey;
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
        left:20%;
    }
    th{
        font-size:20px;
        font-weight: normal;
        
    }

</style>
</html>
