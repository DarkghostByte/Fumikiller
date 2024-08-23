<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Reporte Creditos</title>
    </head>
<body>
    <div id="main-container">
        <table id="table">
            <thead>
                <tr>
                    <th>Cliente:</th><th>Direccion:</th><th>Monto del credito:</th><th>Fecha:</th>
                </tr>
            </thead>
                <tr>
                    <th>Luis Angel Peña</th><th>Martires agraristas #909</th><th>$1200</th><th>06/05/2024</th>
                </tr>
                <tr>
                    <th>Liade Chavez Chavez</th><th>Colonia Madero</th><th>$1500</th><th>06/05/2024</th><
                </tr>
                <tr>
                    <th>Luis Antonio Olivas</th><th>Laguna Cuervo #1208</th><th>$1500</th><th>06/05/2024</th>
                </tr>
                <tr>
                    <th>Emiliano Mosqueda Gomez</th><th>Nvo. Casas Grandes</th><th>$1500</th><th>06/05/2024</th>
                </tr>
        </table>


    </div>
</body>
</html>

<style>
    body{
        font-family: Arial;
        margin-left: -35px;
    }
    #main-container{
        
        margin:10px auto;
        width: 100%;
    }
    table{
        background-color:#cfcfcf;
        border-collapse: collapse;
        text-align: left;
        width: 105%;
    }
    th, td{
        border: 1px solid black;
        padding: 3px;
    }
    thead{
        background-color: #526fd9;
        border-bottom: 5px solid #071a5e;
        color:white;
    }
    tr:nth-child(even){
        background-color: white;
    }
    tr:hover td{
        background-color: #526fd9;
        color: white;
    }
</style>
