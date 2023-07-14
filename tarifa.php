<!-- vistas/tarifa.php -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/tarifa.css">
    <title>Cotización de Envío</title>
    
    <script>
        function actualizarPrecio() {
            var tipoPaquete = document.getElementById("tipo").value;
            var precios = <?php echo json_encode($precios); ?>; 
            var precio = precios[tipoPaquete];

            document.getElementById("precio").value = precio.toFixed(2);

            
            document.getElementById("costoEnvio").textContent = "Costo de Envío: S/. " + precio.toFixed(2);
        }

       
        function redirigirPago() {
           
            alert("Redirigiendo al método de pago...");
        }
    </script>
</head>
<body>
    <h1>Cotización de Envío</h1>

    <div class="contenedor">
        <img src="img/cotizar.png" alt="Imagen Cotización" class="imagen-cotizacion">

        <div class="formulario-cotizacion">
            <form action="" method="POST">
                <label for="tipo">Tipo de Paquete:</label>
                <select id="tipo" name="tipo" required onchange="actualizarPrecio()">
                    <option value="sobre">Sobre</option>
                    <option value="paqueteS">Paquete S</option>
                    <option value="paqueteM">Paquete M</option>
                    <option value="paqueteL">Paquete L</option>
                </select>
                <br>
                <br>
                <label for="precio">Precio (S/.):</label>
                <input type="text" id="precio" name="precio" readonly>
                <br>
                <br>
                <h2 id="costoEnvio"></h2>
                <input type="button" value="Pagar" onclick="redirigirPago()">
            </form>
        </div>
    </div>
</body>
</html>
