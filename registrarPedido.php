<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/registro.css">
  <title>Registrar pedido</title>
</head>
<body>
  <div class="container">
    <div class="titulo-contenedor">
      <h1 class="titulo">REGISTRAR PEDIDO</h1>
      <img src="https://th.bing.com/th/id/OIP.6fWzzToqTbzI4boPTgeOrwHaFz?pid=ImgDet&rs=1" alt="Motocicleta" class="motocicleta">
    </div>
    <div class="contenido">
      <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="idCliente" class="etiqueta">Nombre del cliente:</label>
        <input type="number" id="idCliente" name="idCliente" class="campo" required>
      
        <label for="fecha" class="etiqueta">Fecha del pedido:</label>
        <input type="date" id="fecha" name="fecha" class="campo" required>
      
        <label for="tipoEntrega" class="etiqueta">Tipo de envío:</label>
        <select id="tipoEntrega" name="tipoEntrega" class="campo" required>
          <option value="a pie">A pie</option>
          <option value="a moto">A moto</option>
        </select>


        <label for="direccion" class="etiqueta">Dirección de entrega:</label>
        <input type="text" id="direccion" name="direccion" class="campo" required>

        <label for="tipoPaquete" class="etiqueta">Tipo de Paquete:</label>
        <select id="tipoPaquete" name="tipoPaquete" class="campo" required>
        <option value="Sobre"></option>
          <option value="">Sobre</option>
          <option value="Paquete S">Paquete S</option>
          <option value="Paquete M">Paquete M</option>
          <option value="Paquete L">Paquete L</option>
  

        </select>
      
        <button type="submit">Registrar pedido</button>
      </form>
    </div>
  </div>
</body>
</html>

<?php
    if(!empty($_POST)){
        $idCliente = $_POST["idCliente"];
        $fecha = $_POST["fecha"];
        $tipoEntrega = $_POST["tipoEntrega"];
        $direccion = $_POST["direccion"];
        $tipoPaquete = $_POST["tipoPaquete"];
        

        require_once "controller/pedidoController.php";

        $uc = new pedidoController();
        $resultado = $uc->guardar($idCliente, $fecha, $tipoEntrega, $direccion, $tipoPaquete);
     
        if($resultado!=0){
            header("location: ver_pedido.php");
        }else{
            echo "Error: no han actualizado los datos";
        }            
           
    }
?>