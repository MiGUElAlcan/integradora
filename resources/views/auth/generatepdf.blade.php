<?php

$conexion=mysqli_connect('localhost','root','','site1');

?>
<!DOCTYPE html>
<html lang="en">
    <style>
        h1{
            color: #4D96FF;
            text-align: center;
            font-family: sans-serif;
        }

        table{
            border-radius: 10px
        }

        table, th, td {
        border: 1px solid ;
        border-color: #22577E;
        border-collapse: collapse;
        text-align:center;
        margin: 0 auto;
        width: 220px;
        color:#fff;
        }
        th, td {
        background-color: #4D96FF;
        text-align:center;
        margin: 0 auto;
        }



    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>generar reporte</title>
</head>
<body>
    <h1>Reporte semanal de temperatura</h1>

    <?php
    $consulta = "SELECT *FROM temperatura";
    $resultado = mysqli_query ($conexion,$consulta);
        if ($resultado) {
        while($row = $resultado->fetch_array()){
                $num = $row['num'];
                $value = $row['value'];
                $recorded = $row['recorded'];
    ?>
            
            <table>
            <thead>
                <tr>
                <th><b>fecha:</b></th> 
                <th<b>num:</b></th> 
                <th><b>value:</b></th> 
                </tr>
                </thead>
                <thead>
                <tr>
                <td><?php echo $recorded; ?></td>
                <td><?php echo $num; ?></td>
                <td><?php echo $value; ?></td>
                </tr>
                </thead>
            </table> 

        </div>      
    </div>     
    <?php

        }
    }
    ?>
</body>
</html>