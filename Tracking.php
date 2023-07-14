<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/tracking.css">    
    <title>Formulario de Búsqueda</title>
</head>
<body>
    <h1>Rastreo de Paquete</h1>
    <form action="Controller/RastrearController.php" method="post">
        <input type="hidden" name="action" value="buscar">
        <label for="RastrearD">Rastreo por:</label>
        <select name="RastrearD" id="RastrearD">
            <option value="idPedido">Codigo de Pedido</option>
            <option value="numPaquete">Codigo de Paquete</option>
        </select><br><br>

        <label for="datoRastrear">Ingrese Datos:</label>
        <input type="text" name="datoRastrear" id="datoRastrear" required><br><br>

        <input type="submit" value="Rastrear">
    </form>
</body>
</html>
