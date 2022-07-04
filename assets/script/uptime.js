var p = document.getElementById('uptime');
var span = document.getElementById('uptime-text');

setInterval(function(){

    let novaHora = new Date(null);
    var userTimezoneOffset = novaHora.getTimezoneOffset() * 60;
    novaHora.setSeconds(uptime + userTimezoneOffset);

    let dia = uptime / (3600 * 24);
    let hora = novaHora.getHours();
    let minuto = novaHora.getMinutes();
    let segundo = novaHora.getSeconds();    

    document.getElementById('uptime-text').textContent = Math.floor(dia)+" dia"+(dia > 1 ? "s" : "")+", "+
        hora+' hora'+(hora > 1 ? "s" : "")+", "+
        minuto+' minuto'+(minuto > 1 ? "s" : "")+" e "+
        segundo+' segundo'+(segundo > 1 ? "s" : "");

    uptime = uptime + 1;
},1000)