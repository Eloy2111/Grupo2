<? //RAMIRES SHUPINGAUA YAMIL
session_start();
 if($_SESSION["tipo"]!="estudiante"){
    header("location:index.php");
 }
?> 

<h1>Ver Notas</h1>

<?php   
    require_once "controladores/UsuarioController.php";

    $uc = new UsuarioController();
    $resultado = $uc->mostrar();

    ?>

    <h1>Datos del cliente</h1>
        <table border="1">
            <tr>
               
               <th>idCliente</th>
               <th>password</th>
               <th>ruc</th> 
               <th>Nombre</th>
               <th>direccion</th>
               <th>telefono</th>
               <th>&nbsp</th>