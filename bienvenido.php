<?php
    session_start();
    if(!isset($_SESSION["idCliente"])){
        header("location:index.php");
    }
    echo "<h1>Bienvenido@".$_SESSION["nombre"]."</h1>";
    echo  "<h2>".$_SESSION["tipo"]."</h2>";