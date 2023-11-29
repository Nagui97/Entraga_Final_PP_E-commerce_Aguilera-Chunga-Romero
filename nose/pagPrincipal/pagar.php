<?php
include 'global/config.php';
include 'global/conexion.php';
include 'Carrito.php';
include 'templates/cabecera.php';
?>

<?php
if($_POST){

    $total=0;
    $SID=session_id();
    $Correo=$_POST['direc'];

    foreach($_SESSION['CARRITO'] as $indice=>$producto) {
        $total=$total + ($producto['PRECIO']*$producto['CANTIDAD']);
    }

        $sentencia=$pdo->prepare("INSERT INTO `tblVentas` (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`) 
        VALUES (NULL,:ClaveTransaccion, '', NOW() , :Correo , :Total, 'pendiente');");
        
        $sentencia->bindParam(":ClaveTransaccion",$SID );
        $sentencia->bindParam(":Correo",$Correo );
        $sentencia->bindParam(":Total",$total);

        $sentencia->execute();
        $idVenta=$pdo->lastInsertId();

        foreach($_SESSION['CARRITO'] as $indice=>$producto) {
            $sentencia=$pdo->prepare("INSERT INTO `tblDetalleVenta` 
            (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`) 
            VALUES (NULL, :IDVENTA, :IDPRODUCTO,:PRECIOUNITARIO , :CANTIDAD);");

            $sentencia->bindParam(":IDVENTA",$idVenta );
            $sentencia->bindParam(":IDPRODUCTO",$producto['ID'] );
            $sentencia->bindParam(":PRECIOUNITARIO",$producto['PRECIO']);
            $sentencia->bindParam(":CANTIDAD",$producto['CANTIDAD']);
            $sentencia->execute();
        }
    //echo "<h3>".$total."</h3>";
    //para borrar todos los elementos de la tabla TRUNCATE TABLE nombreTabla

}
?>

<div class="jumbotron">
    <h1 class="display-4">Paso Final!</h1>
    <hr class="my-4">
    <p class="lead">Estas a punto de pagar con paypal tu compra de: 
        <h4>$<?php echo number_format($total,2); ?></h4>
    </p>
    <p>Comentario</p>

</div>
    <style>
        /* Media query for mobile viewport */
        @media screen and (max-width: 400px) {
            #paypal-button-container {
                width: 100%;
            }
        }
        
        /* Media query for desktop viewport */
        @media screen and (min-width: 400px) {
            #paypal-button-container {
                width: 250px;
            }
        }
    </style>

<body>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({
            // Call your server to set up the transaction
            createOrder: function(data, actions) {
                return fetch('/demo/checkout/api/paypal/order/create/', {
                    method: 'post'
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    return orderData.id;
                });
            },

            // Call your server to finalize the transaction
            onApprove: function(data, actions) {
                return fetch('/demo/checkout/api/paypal/order/' + data.orderID + '/capture/', {
                    method: 'post'
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    // Three cases to handle:
                    //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                    //   (2) Other non-recoverable errors -> Show a failure message
                    //   (3) Successful transaction -> Show confirmation or thank you

                    // This example reads a v2/checkout/orders capture response, propagated from the server
                    // You could use a different API or structure for your 'orderData'
                    var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

                    if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                        return actions.restart(); // Recoverable state, per:
                        // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                    }

                    if (errorDetail) {
                        var msg = 'Sorry, your transaction could not be processed.';
                        if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                        if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                        return alert(msg); // Show a failure message (try to avoid alerts in production environments)
                    }

                    // Successful capture! For demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                    // Replace the above to show a success message within this page, e.g.
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }
        }).render('#paypal-button-container');
    </script>
    <br>
    <br>
    <h3>En caso de querer pagar en efectivo, use el sigueinte codigo: <?php
     $num1 = rand(1,1000000000);
     echo  $num1 ;?></h3>
     <p>Acerquese a cualquier pago facil o rapipago</p>



</body>

</html>