
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Formulario Registro</title>
</head>
<body>

  <header>
    <nav>
      <a href="#" class="enlace">
      <h3 class="logo">1989 Shop</h3>  </a>
      
      <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="ayuda.html">Ayuda</a></li>
        <li class="sub_item"><a href="">Contacto</a></li>
      </ul>
    </nav>
  </header>
  <form method="POST">
  <section class="form-register">
    <h4>Registrarse</h4>
    <input class="controls" type="text" name="nombre" placeholder="Ingrese su Nombre">
    <input class="controls" type="text" name="apellido"  placeholder="Ingrese su Apellido">
    <input class="controls" type="email" name="email" placeholder="Ingrese su Correo">
    <input class="controls" type="password" name="clave"  placeholder="Ingrese su Contraseña">
    <input class="botons" type="submit" name="registro" value="Registrar">
    <p><a href="iniciarsesion.php">¿Ya tengo Cuenta?</a></p>
  </section>
</form>   
<?php 
    include ("logica/conexion.php");
    include("logica/controladorRegistro.php");
    ?>

</body>
</html>