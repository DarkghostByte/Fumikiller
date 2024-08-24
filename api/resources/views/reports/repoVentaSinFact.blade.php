<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte Ventas Sin Factura</title>
</head>
<body>
    <img  class="membre" src="{{ $base64 }}" alt="">
    <div id="main-container">

        <table id="table">
            <thead>
                <tr>
                    <th>Cliente:</th>
                    <th>Direccion:</th>
                    <th>Monto:</th>
                    <th>Semana del año:</th>
                    <th>Mes:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->name }} {{ $item->lastname1 }} {{ $item->lastname2 }}</td>
                        <td>{{ $item->home }} #{{ $item->numAddress }}</td> <!-- Ajusta según tu estructura -->
                        <td>{{ $item->pago }}</td> <!-- Monto individual -->
                        <td>{{ $item->date1 }}</td>
                        <td>{{ $item->date2 }}</td>
                       <!-- <td>{{ date('F', strtotime($item->date2)) }}</td> -->
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h2>Total de Pagos: ${{ number_format($totalPago, 2) }}</h2> <!-- Mostrar el total de pagos -->
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
        background-color: rgb(255, 255, 255);
    }
    tr:hover td{
        background-color: #526fd9;
        color: white;
    }
    h2{
        text-align:right;
        /*background-color: #071a5e;*/
    }
    .membre{
        margin-left: 12.5%;
        margin-top:20px;
        height:12%;
        width: 80%;
    }  
</style>
