<?php
 //RAMIRES SHUPINGAHUA YAMIL


?>

<!DOCTYPE html>
<html>

<head>
    <title>BIENVENIDO</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 30px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <h1>BIENVENIDO</h1>

    <?php
    require_once "controladores/UsuarioController.php";

    $uc = new UsuarioController();
    $resultado = $uc->mostrar();
    ?>

    <h2>Cliente</h2>
    <table>
        <tr>
            <th>idCliente</th>
            <th>Password</th>
            <th>RUC</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($resultado as $cliente) { ?>
            <tr>
                <td><?php echo $cliente['idCliente']; ?></td>
                <td><?php echo $cliente['password']; ?></td>
                <td><?php echo $cliente['ruc']; ?></td>
                <td><?php echo $cliente['nombre']; ?></td>
                <td><?php echo $cliente['direccion']; ?></td>
                <td><?php echo $cliente['telefono']; ?></td>
                <td>&nbsp;</td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>