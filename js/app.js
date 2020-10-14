eventslisteners();
function eventslisteners() {
    document.querySelector('#numero_tarjeta').addEventListener('input', checkCardNumber)
}

function checkCardNumber(e){
    const numero_tarjeta = document.querySelector('#numero_tarjeta')

    if (numero_tarjeta.value.length > numero_tarjeta.maxLength) {
        numero_tarjeta.value = numero_tarjeta.value.slice(0, numero_tarjeta.maxLength);
    } else {
        console.log(numero_tarjeta.value.length);
    }
}
