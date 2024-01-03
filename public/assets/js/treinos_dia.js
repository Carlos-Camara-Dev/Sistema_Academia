let segunda = document.getElementById("treino_segunda"),
    terca = document.getElementById("treino_terca"),
    quarta = document.getElementById("treino_quarta"),
    quinta = document.getElementById("treino_quinta"),
    sexta = document.getElementById("treino_sexta");

function abrir_segunda() {
    if (segunda.style.display != "flex") {
        segunda.style.display = "flex";
        if (terca.style.display != "none") {
            terca.style.display = "none";
        }
        if (quarta.style.display != "none") {
            quarta.style.display = "none";
        }
        if (quinta.style.display != "none") {
            quinta.style.display = "none";
        }
        if (sexta.style.display != "none") {
            sexta.style.display = "none";
        }
    }
}
function abrir_terca() {
    if (terca.style.display != "flex") {
        terca.style.display = "flex";

        if (segunda.style.display != "none") {
            segunda.style.display = "none";
        }
        if (quarta.style.display != "none") {
            quarta.style.display = "none";
        }
        if (quinta.style.display != "none") {
            quinta.style.display = "none";
        }
        if (sexta.style.display != "none") {
            sexta.style.display = "none";
        }
    }
}
function abrir_quarta() {
    if (quarta.style.display != "flex") {
        quarta.style.display = "flex";

        if (segunda.style.display != "none") {
            segunda.style.display = "none";
        }
        if (terca.style.display != "none") {
            terca.style.display = "none";

        }
        if (quinta.style.display != "none") {
            quinta.style.display = "none";
        }
        if (sexta.style.display != "none") {
            sexta.style.display = "none";
        }
    }
}

function abrir_quinta() {
    if (quinta.style.display != "flex") {
        quinta.style.display = "flex";

        if (segunda.style.display != "none") {
            segunda.style.display = "none";
        }
        if (terca.style.display != "none") {
            terca.style.display = "none";

        } if (quarta.style.display != "none") {
            quarta.style.display = "none";
        }
        if (sexta.style.display != "none") {
            sexta.style.display = "none";
        }
    }
}
function abrir_sexta() {
    if (sexta.style.display != "flex") {
        sexta.style.display = "flex";
        if (segunda.style.display != "none") {
            segunda.style.display = "none";
        }
        if (terca.style.display != "none") {
            terca.style.display = "none";

        } if (quarta.style.display != "none") {
            quarta.style.display = "none";
        } if (quinta.style.display != "none") {
            quinta.style.display = "none";

        }
    }
}





