
<h1>Inicio de Sesion</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <input type="text" name="email" placeholder="Ingrese email"><br>
    <input type="password" name="password" placeholder="Ingrese password"><br>
    <input type="submit" value="Ingresar"><br>
</form>
<?php
//Trujillo Vilcherrez Jahir
    if(!empty($_POST)){
        $email = $_POST["email"];
        $password = $_POST["password"];
        
           
        require_once "controladores/usuarioController.php";

        $uc = new UsuarioController();
        $resultado = $uc->login($email, $password);
        
        if($resultado!=0){
             header("location:bienvenido.php");

        }else{
            echo "usuario y/o contraseña incorecto";
        }
    }
?>