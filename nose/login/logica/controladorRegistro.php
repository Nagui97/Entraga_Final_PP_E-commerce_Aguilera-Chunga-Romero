<?php 

include("conexion.php");

if (isset($_POST['registro'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['apellido']) >= 1 &&
        strlen($_POST['email']) >= 1 && strlen($_POST['clave']) >= 1) {

	    $nombre = trim($_POST['nombre']);
	    $apellido = trim($_POST['apellido']);
        $email = trim($_POST['email']);
        $clave = trim($_POST['clave']);


	    $consulta = "INSERT INTO clientes (nombre, apellido, email, clave)
         VALUES ('$nombre','$apellido','$email','$clave')";

	    $resultado = mysqli_query($conexion,$consulta);
	    if ($resultado) {
	    	?> <?php 
	    	echo "¡Te registraste correctamente!";
          
	    } else {
	    	?> 
	    	<p class="bad">¡Error...!</p>
           <?php
	    }
    }   else {
	    	?> 
	    	<p>Debe completar los campos</p>
           <?php
    }
}

?>