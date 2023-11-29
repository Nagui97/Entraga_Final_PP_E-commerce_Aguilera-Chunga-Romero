
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
        <li><a href="../1989ayudaynosotros/1989kiara/ayuda1989.html">Ayuda</a></li>
        <li class="#"><a href="../1989ayudaynosotros/1989kiara/nosotros1989.html">Nosotros</a></li>
      </ul>
    </nav>
  </header>

  <form action="logica/loguear.php" method="POST">
  <section class="form-register">
    <h4>Inciar Sesion</h4>
    <input class="controls" type="email" name="usuario"  placeholder="Ingrese su Correo">
    <input class="controls" type="password" name="clave"  placeholder="Ingrese su Contraseña">
    <input class="botons" type="submit" value="Acceder">
    <p>No tengo cuenta<a href="registro.php"> Registrarse</a></p>
  </section>
</form>
</body>
</html>