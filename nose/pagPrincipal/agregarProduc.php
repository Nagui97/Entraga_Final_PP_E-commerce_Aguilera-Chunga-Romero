<?php include 'templates/cabecera.php'; ?>

<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    

    <form method="POST">
        
        <h1 class="titulo">Datos del Producto</h1>
        <input class="cajas" name="nombre" type="text" placeholder="Nombre" required maxlength="100">
        <input class="cajas" name="precio" type="double" placeholder="Precio" required maxlength="30">
        <input class="cajas" name="imagen" type="text" placeholder="Direccion de la imagen" >
        <input class="cajas" name="descripcion" type="text" placeholder="Descripcion" >
        <input type="submit" class="btn" name="boton" value="Publicar">
        

    </form>
    <?php 
    include ("../login/logica/conexion.php");
    include("../login/logica/agregar.php");
    ?>
    
</body>
