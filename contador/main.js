
const contadorDeTiempo = new Date('Sep,24 2021 19:00:00').getTime();

const time = setInterval(() => {

    let tiempoActual = new Date().getTime();
    let intervalo =  contadorDeTiempo - tiempoActual;
    
    let  dias = Math.floor(intervalo / (1000 * 60 * 60 * 24));
    let  horas = Math.floor((intervalo % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let  minutos = Math.floor((intervalo % (1000 * 60 * 60)) / (1000 * 60));
    let  segundos = Math.floor((intervalo % (1000 * 60)) / 1000);

    document.getElementById("contador-tiempo").innerHTML = dias + "d " + horas + "h "
    + minutos + "m " + segundos + "s ";

    if(intervalo < 0){
        clearInterval(time);

        document.getElementById("contador-tiempo").innerHTML = "La web será actualizada en breves momentos";
    }

}, 1000); 