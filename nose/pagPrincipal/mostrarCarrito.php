<?php

include 'global/config.php';
//include 'global/conexion.php';
include 'Carrito.php';
include 'templates/cabecera.php';
?>

<br>
<h3>Lista del Carrito</h3>
<?php if(!empty($_SESSION['CARRITO'])){ ?>

<table class="table table-light">
    <tbody>
        <tr>
            <th width="40%" class="text-center">Descripcion</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%" >--</th>
        </tr>
        <?php $total=0;?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) {?>
        <tr>
            <td width="40%"><?php echo $producto['NOMBRE']?></td>
            <td width="15%" class="text-center"><?php echo $producto['CANTIDAD']?></td>
            <td width="20%" class="text-center"><?php echo $producto['PRECIO']?></td>
            <td width="20%" class="text-center"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2); ?></td>
            <td width="5%"> 

            <form action="" method="POST">

            <input type="hidden"
             name="id" 
             id="id" 
             value="<?php echo openssl_encrypt($producto['ID'],COD,KEY); ?>">
                <button class="btn btn-danger" 
                type="submit" 
                name="btnAccion" 
                value="Eliminar">Eliminar</button>
        
            </form>    
            
            </td> 
        </tr>
        <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);?>
        <?php }?>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>$<?php echo number_format($total,2);?></h3></td>
        </tr>

        
        <tr>
      
            <td colspan="5">
            <form action="pagar.php" method="post"> 
                <div class="alert alert-success"> 
                <div class="form-group">
                    <?php   $usuario = $_SESSION['username'];
                    echo "<h1>Bienvenido $usuario </h1>";
                    ?>

                    <label for="my-input">Ingrese la Direccion a la que se va a mandar los productos: </label>
                    <input id="direc" name="direc" 
                    class="form-control" 
                    type="text"
                    required>
                    
                    <label for="my-input"> Ingrese un Telefono: </label>
                    <input id="tel" name="tel" 
                    class="form-control" 
                    type="text"
                    required>

                </div> 
                <small id="emailHelp"
                class="form-text text-muted"
                >
                El producto llegara al domicilio ingresado, en caso de algun inconveniente nos contactaremos con usted
                </small>
            </div> 
            <button class="btn btn-primary btn-lg btn-blok" type="submit"
            name="btnAccion"
            value="proceder">
                Procede a pagar>>
            </button>
        </form>
            </td>
        </tr>



    </tbody>
</table> 
<?php }else{ ?>
    <div class="alert alert-succes">
    no hay productos seleccionados
    </div>       
<?php }?>
