<?php
// echo "<pre>";
// var_dump($_GET);
// echo "</pre>";
$url =  'https://api.instapago.com/payment';
$keyID = "6C467BB9-796A-4F81-9722-95C826669D66";
$publicKeyId = "afa9fa1364125ab5ce917d22d936a3d2";
$id = $_GET['Id'];
$mensaje = $_GET['mensaje_final'];
$consulta = file_get_contents("https://api.instapago.com/payment?KeyId={$keyID}&PublicKeyId={$publicKeyId}&Id={$id}");
$respuesta = json_decode($consulta, true);
$voucher = $respuesta['voucher'];
$referencia = $respuesta['reference'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Resumen Compra</title>
</head>
<body>
    <h1 class="header">Resumen Compra</h1>
    <div class="main-container">
        <div class="final-message green">
            <h2 class="header"><?php echo $mensaje ?></h2>
            <p class="header">Referencia: <?php echo $referencia ?></p>
        </div>
    </div>
</body>
</html>