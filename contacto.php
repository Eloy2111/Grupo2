<!--Alcedo Ramos Eloy M.-->

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";

if (isset($_POST["submit"])) {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];

    $errors = array();

    if (empty($nombre)) {
        $errors[] = "El campo nombre es obligatorio";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "La dirección de correo electrónico no es válida";
    }

    if (empty($asunto)) {
        $errors[] = "El campo asunto es obligatorio";
    }

    if (empty($mensaje)) {
        $errors[] = "El campo mensaje es obligatorio";
    }

    if (count($errors) == 0) {

        $msj = "De: $nombre <a href='mailto:$email'>$email</a><br>";
        $msj .= "Asunto: $asunto<br><br>";
        $msj .= "Cuerpo del mensaje<br>";
        $msj .= "<p>$mensaje</p>";
        $msj .= "--<p>Este mensaje se ha enviado desde la página EmAr.</p>";

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host = "smtp.hostinger.com";
            $mail->SMTPAuth = true;
            $mail->Username = "tu_correo_electronico@dominio.com";
            $mail->Password = "###";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('tu_correo_electronico@dominio.com', "Courier EmAr");
            $mail->addAddress('Entrega@gmail.com', "Courier EmAr");

            $mail->isHTML(true);
            $mail->Subject = 'Prueba de entrega';
            $mail->Body = utf8_decode($msj);

            $mail->send();

            $respuesta = "Correo enviado";
        } catch (Exception $e) {
            $respuesta = "Mensaje: " . $mail->ErrorInfo;
        }
    }
}
?>
                                                                

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://yt3.ggpht.com/a/AGF-l79ARHaymjkbHH9l6HOOpmekoRj48PFNlPaPLQ=s900-c-k-c0xffffffff-no-rj-mo">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>EmAr Envios a todo el Perú</title>
</head>

<body>
    <main>
            <?php

            if(isset($errors)){
                if(count($errors) > 0){
            ?>

                <class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <?php
                            foreach($errors as $error){
                                echo $error . '<br>';
                            }
                            ?>
                    </div>
                </div>
            <?php    

                }
            }
            ?>
            


            <div class="row">
                <div class="col-lg-6 col-md-12">

                    <form class="form" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                        <div class="mb-3">
                            <label for="nombre" class="form-label"> Nombre</label>
                            <input type="text" class="formr-control" id="nombre" name="nombre" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label"> Correo electronico</label>
                            <input type="email" class="formr-control" id="email" name="email" require>
                        </div>

                        <div class="mb-3">
                            <label for="asunto" class="form-label"> Asunto</label>
                            <input type="text" class="formr-control" id="asunto" name="asunto" require>
                        </div>

                        <div class="mb-3">
                            <label for="mensaje" class="form-label"> Mensaje</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="3" require></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-danger">Enviar</button>

                    </form>

                </div>

            </div>

            <?php if(isset($respuesta)) { ?>
                <div class="row">
                <div class="col-lg-6 col-md-12">
                    <?php echo $respuesta; ?>
                </div>
                </div>
            <?php } ?>


        </div>

    </main>

</body>

</html>

