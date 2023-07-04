<?php   
    require_once "controladores/UsuarioController.php";

    $uc = new UsuarioController();
    $resultado = $uc->mostrar();

        ?>
        <table border="1">
            <tr>
               <th>id</th> 
               <th>Usuario</th>
               <th>Contraseña</th>
               <th>Ruc</th> 
               <th>Nombre</th>
               <th>Direccion</th>
               <th>Telefono</th>
               <th>&nbsp</th>
               <th>&nbsp</th>
            <tr>
        <?php
        foreach($resultado as $usuario){
            echo "<tr>
                    <td>".$usuario["id"]."</td>
                    <td>".$usuario["usuario"]."</td>
                    <td>".$usuario["contraseña"]."</td>
                    <td>".$usuario["ruc"]."</td>
                    <td>".$usuario["nombre"]."</td>
                    <td>".$usuario["direccion"]."</td>
                    <td>".$usuario["telefono"]."</td>

                   
                  </tr>";
        }
        ?>
        </table>