<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Clientes</title>
</head>
<body >
<img src="../public/img/logofk.png" alt="">
    <div class="divLogo">
        <h3>Sistema de Fumigaciones Urbanas</h3> 
        <div >
            <h3 class="letrasFlex">Orden de trabajo</h3>
            <div class="noOT">
                <h4>No. 00000</h4>
            </div>
        </div>
    
    </div>
    
    
    <header>    
        
    </header>
    <main> 
        <div class="fondLimitador"></div>
        <table>
            <th>Fecha de Orden </th>
            <th> _____________________________ </th>
            <th> Fecha Programada</th>
            <th> _________________________________ </th>
        </table>
        <table>
            <th>Nombre Comercial</th>
            <th> ________________________________________ </th>
            <th> Hora:</th>
            <th> ____________________________ </th>
        </table>
        <table>
            <th>Nombre Personal</th>
            <th> _________________________________________ </th>
            <th> Telefono:</th>
            <th> __________________________ </th>
        </table>
        <table>
            <th>Domicilio</th>
            <th> _______________________________________________ </th>
            <th> Colonia:</th>
            <th> ___________________________ </th>
        </table>
        <table>
            <th>Localización</th>
            <th> ________________________________________________________________________________ </th>
        </table>
        <table>
            <th>Tipo de lugar a fumigar</th>
            <th> _________________________ </th>
            <th> Tipo de plagas:</th>
            <th> _______________________________ </th>
        </table>
        <table>
            <th>Observaciones</th>
            <th> ____________________________________________________________________________________ </th>
        </table>
        <table class="btnCir">
            <th ><button class="button button5"> </button>
            <th class=> Presupuesto</th>
            <th><button class="button button5"> </button>
            <th> Factura</th>
            <th><button class="button button5"> </button>
            <th> Certificado</th>
            <th><button class="button button5"> </button>
            <th> Remision</th>
            <th><button class="button button5"> </button>
            <th> Nada</th>
        </table>
        <table class="pr">
            <th>Fecha Ultima Fumigacion</th>
            <th> ______________________________________________________________________ </th>
        </table>
        <table>
            <th>Forma de Contacto</th>
            <th> _____________________________ </th>
            <th> Pasado a bitacora:</th>
            <th> _____________________________ </th>
        </table>
        <table>
            <th> ______________________________________________________________________________________________</th>
        </table>
        <table class="footer">
            <th class="footer">Calle del Abeto 2201</th>
            <th> Col. Alamedas </th>
            <th> Tel.636-694-65-15</th>
            <th> Nuevo Casas Grandes, Chihu. </th>
            <th> C.P. 31704</th>
        </table>


        
    </main>
</body>

<style>

    body{
        width: 100%;
    }
    h1{
        text-alaing:center;
    }
    img{
        height:125px;
        width: 100px;
        border: 10px,solid, black;
    }
    .fondLimitador{
        position: absolute;
        background-color:white;
        height:275px;
        width: 60px;;
        left:95%;
    }
    .divLogo {
        position: absolute;
        
    }
    .letrasFlex{
        position:absolute; 
        display: flex;
        justify-content: space-between;
    }
    .noOT{
        position: absolute;
        left: 75%;
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
    font-size:15px;
    font-weight: normal;
}

</style>
</html>
