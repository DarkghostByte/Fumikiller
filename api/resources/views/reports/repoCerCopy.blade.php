<!DOCTYPE html>
<html lang="en">


    <div class="delimitador">
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
            <h2 class="letrasFlex">REMISION</h2>
            
        </div>
    
    </div>
    
    
    <header>    
        
    </header>

    <main> 
        <div class="fondLimitador"></div>
        <table>
            <th class="clth1">Razon Social</th>
            <th class="renDivTh">
            <div class="renDiv1">
            </div>
            </th>  
        </table>
            
        <table>
            <th class="clth">Nombre</th>
            <th class="renDivTh">
            <div class="renDiv1">
            </div>
            </th>  
        </table>
        <table>
            <th>Domicilio</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
            <th> Ciudad</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
        </table>
        <table>
            <th>Colonia</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
            <th>Telefono1:</th>
            <<th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
            <th>Telefono2:</th>
            <<th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
        </table>
        <table>
            <th class="clth1">Tipo de lugar </th>
            <th class="renDivTh">
            <div class="renDiv1">
            </div>
            </th>  
        </table>
        
        <table class="btnCir">
            <th class="clth11">Require de:</th>
            <th ><button class="button button5"> </button>
            <th > Certificado</th>
            <th class="nmM">Numero:</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th> 
            <th>Importe</th>
            <<th class="renDivTh">
            <div class="renDiv">
            </div>
            </th>
            
        </table>
        <table class="">
            <th>Observaciones:</th>
            <th class="renDivTh">
            <div class="renDiv">
            </div>
            </th>
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
    }.renDiv1{
        
        border-bottom: 1px solid black;
        height:15px;
        width:100%;
        margin-left:-5px;
    }.clth1{
        left:-10%;
        width: 9%;
    }.clth11{
        width: 40%;
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
