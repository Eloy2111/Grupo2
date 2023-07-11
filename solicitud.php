Soto Borja Treysi
<html>
        <head>
            <title>Solicitud</title>
            
		    <link href="css\style3.css" rel="stylesheet" type="text/css"  media="all" />
          
        </head>
    <body>
    <div class="contenedor">
    <form method="post">

    <img src="logo.png" class="logo" height="100px" width="130px" background-image="center">

                <h1>Solicitud de un pedido </h1>
                <b><p>Seleccione la sucursal donde desea entregar el pedido:</p></b>

            <select name="branch">
                <option value="Amarilis">Amarilis</option>
                <option value="Huanuco">Huanuco</option>
                <option value="Pillco marca">Pillco Marca</option>
            </select>

            <b><p >Ingrese el nombre,la direccion y el número de teléfono de la persona a entregar el pedido:</p></b>

            <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required><br></br>

            <label for="direccion">Direccion:</label>
                <input type="text" id="direccion" name="direccion" required><br></br>

            <label for="phone">Teléfono:</label>
                <input type="tel" id="phone" name="phone" required>

                <b><p>Ingrese cualquier comentario o sugerencia:</p></b>
            <textarea name="comment" rows="4" cols="40"></textarea>
            <br></br>
            <button type="submit">Enviar solicitud</button>

        </form>
</div>
    </body>

</html>

