<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap">
    <link rel="stylesheet" href="css/styles.css">
    <title>Instapago</title>
</head>

<body>
    <h1 class="header">Pasarela de pago</h1>
    <div class="main-container">
        <form action="">
            <div class="input-group">
                <label for="numero_tarjeta">No. Tarjeta: </label>
                <input type="number" name="numero_tarjeta" id="numero_tarjeta" minlength="15" maxlength="16" required>
            </div>
            <div class="input-group">
                <label for="codigo_seguridad">Codigo de Seguridad: </label>
                <input type="password" name="codigo_seguridad" id="codigo_seguridad" maxlength="3" required>
            </div>
            <div class="input-group">
                <label for="vencimiento">Vencimiento: </label>
                <input type="month" name="vencimiento" id="vencimiento" required>
            </div>
            <div class="input-group">
                <label for="nombre_en_tarjeta">Nombre en la tarjeta: </label>
                <input type="text" name="nombre_en_tarjeta" id="nombre_en_tarjeta" required>
            </div>
            <div class="input-group">
                <label for="monto_total">Monto: </label>
                <input type="number" name="monto_total" id="monto_total" required>
            </div>

            <input type="submit" value="Comprar" id="submit" class="submit">

            <div class="agradecimiento">
                <p>Esta transaccion sera procesada de forma segura gracias a la plataforma de</p>
                <img src="img/pequeño.png" alt="logo">
            </div>
        </form>
    </div>

    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>