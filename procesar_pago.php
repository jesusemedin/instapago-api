<?php
// echo "<pre>";
//     var_dump($_POST);
// echo "</pre>";
// CAMBIAMOS EL FORMATO DE LA FECHA YA QUE EL HTML ENVIA EL FORMATO EN YYYY/MM
// E INSTAPAGO LA REQUIERE EN EL FORMATO MM/YYYY
$month = substr($_POST['vencimiento'], 5);
$year = substr($_POST['vencimiento'], 0, 4);

// DECLATAMOS LAS VARIABLES A SER PROCESADAS
$keyID = "6C467BB9-796A-4F81-9722-95C826669D66";
$publicKeyId = "afa9fa1364125ab5ce917d22d936a3d2";
$vencimiento = $month . "/" . $year;
$numero_tarjeta = $_POST['numero_tarjeta'];
$codigo_seguridad = $_POST['codigo_seguridad'];
$nombre_en_tarjeta = $_POST['nombre_en_tarjeta'];
$cedula = $_POST['cedula'];
$monto_total = $_POST['monto_total'];

$url =  'https://api.instapago.com/payment';

$fields = array(
    "KeyID" => $keyID,
    "PublicKeyId" => $publicKeyId,
    "Amount" => $monto_total,
    "Description" => "Pago",
    "CardHolder" => $nombre_en_tarjeta,
    "CardHolderId" => $cedula,
    "CardNumber" => $numero_tarjeta,
    "CVC" => $codigo_seguridad,
    "ExpirationDate" => $vencimiento,
    "StatusId" => 2
);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);
curl_close($ch);
$resultado = json_decode($server_output, true);

$pago_procesado = $resultado['success'];
$id_pago = $resultado['id'];
$mensaje = $resultado['message'];
if ($pago_procesado == 1) {
    header("Location: resumen_pago.php?KeyID={$keyID}&PublicKeyId={$publicKeyId}&Id={$id_pago}&mensaje_final={$mensaje} ");
} else { ?>
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
            <div class="final-message red">
                <?php
                    echo  "Lo sentimos, no hemos podido procesar su tarjeta de crédito. El
                    mensaje del banco fue: " . $mensaje;
                ?>
            </div>
        </div>
    </body>
    </html>
<?php } ?>