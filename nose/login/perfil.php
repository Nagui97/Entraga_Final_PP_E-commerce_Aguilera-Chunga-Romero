<?php

session_start();

$usuario = $_SESSION['username'];

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleperfil.css">

    <title>perfil</title>
</head>
<body>
   <header>
        <div class="main">
            <div class="topbar">
                <img class="logo" src="../imagenes/1989_logo-removebg-preview.png">
                <a href="logica/cerrarSesion.php">cerrarSesion</a>
                <a href="1989ayudaynosotros/1989kiara/ayuda1989.html">Ayuda</a>
                <a href="1989ayudaynosotros/1989kiara/nosotros1989.html">Nosotros</a>
                <a href="inicio.html">Home</a>
            </header><!--fin-->

            <section class="container">
                <div class="caja">
                    <img src="../imagenes/icono-removebg-preview.png" class="icono"/>
                            <div action="perfil.php" class="mt-3">
                                <ul>
                               
                                    <label name="correo">Email:<?php   $usuario = $_SESSION['username'];
                                        echo "<p>$usuario <p>"; ?> </label>
                                    <label name="nombre">Contraseña:<?php   $usuario = $_SESSION['pwd'];
                                        echo "<p>$usuario <p>"; ?> </label>
                                       

                                </ul>
                            </div>
                        </div><!--fin-->
            </section>
        </body>