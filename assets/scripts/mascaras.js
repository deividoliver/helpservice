function mascaraData(campo, e)
{
    var kC = (document.all) ? event.keyCode : e.keyCode;
    var data = campo.value;

    if (kC != 8 && kC != 46)
    {
        if (data.length == 2)
        {
            campo.value = data += '/';
        } else if (data.length == 5)
        {
            campo.value = data += '/';
        } else
            campo.value = data;
    }
}


function mask(e, id, mask) {
    var tecla = (window.event) ? event.keyCode : e.which;
    if ((tecla > 47 && tecla < 58)) {
        mascara(id, mask);
        return true;
    } else {
        if (tecla == 8 || tecla == 0) {
            mascara(id, mask);
            return true;
        } else
            return false;
    }
}
function mascara(id, mask) {
    var i = id.value.length;
    var carac = mask.substring(i, i + 1);
    var prox_char = mask.substring(i + 1, i + 2);
    if (i == 0 && carac != '#') {
        insereCaracter(id, carac);
        if (prox_char != '#')
            insereCaracter(id, prox_char);
    } else if (carac != '#') {
        insereCaracter(id, carac);
        if (prox_char != '#')
            insereCaracter(id, prox_char);
    }
    function insereCaracter(id, char) {
        id.value += char;
    }
}

function mascara(id, mask) {
    var i = id.value.length;
    var carac = mask.substring(i, i + 1);
    var prox_char = mask.substring(i + 1, i + 2);
    if (i == 0 && carac != '#') {
        insereCaracter(id, carac);
        if (prox_char != '#')
            insereCaracter(id, prox_char);
    } else if (carac != '#') {
        insereCaracter(id, carac);
        if (prox_char != '#')
            insereCaracter(id, prox_char);
    }
    function insereCaracter(id, char) {
        id.value += char;
    }
}

