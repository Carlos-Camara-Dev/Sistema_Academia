
let cadastrar_adm = document.getElementById("cadastrar_adm"), gerenciar_adms = document.getElementById("gerenciar_adms"), gerenciar_adms_lista = document.getElementById("gerenciar_adms_lista"),
    cadastrar_aluno = document.getElementById("cadastrar_aluno"),
    gerenciar_alunos = document.getElementById("gerenciar_alunos"), gerenciar_alunos_lista = document.getElementById("gerenciar_alunos_lista"),
    cadastrar_treino = document.getElementById("cadastrar_treino"), gerenciar_treinos_lista = document.getElementById("gerenciar_treinos_lista"), gerenciar_treinos = document.getElementById("gerenciar_treinos");

// Gerenciar Adm's:
function abrir_gerenciar_adms() {
    if (gerenciar_adms.style.display != "flex") {
        gerenciar_adms.style.display = "flex";
        if (gerenciar_alunos.style.display != "none") {
            gerenciar_alunos.style.display = "none";
        }
        if (gerenciar_treinos.style.display != "none") {
            gerenciar_treinos.style.display = "none";
        }
    }
}
function abrir_gerenciar_adms_lista() {
    if (gerenciar_adms_lista.style.display != "flex") {
        gerenciar_adms_lista.style.display = "flex";
        if (cadastrar_adm.style.display != "none") {
            cadastrar_adm.style.display = "none";
        }
    }

} function abrir_cadastrar_adm() {
    if (cadastrar_adm.style.display != "flex") {
        cadastrar_adm.style.display = "flex";
        if (gerenciar_adms_lista.style.display != "none") {
            gerenciar_adms_lista.style.display = "none";
        }
    }
}
// Gerenciar Alunos:
function abrir_gerenciar_alunos() {
    if (gerenciar_alunos.style.display != "flex") {
        gerenciar_alunos.style.display = "flex";
        if (gerenciar_adms.style.display != "none") {
            gerenciar_adms.style.display = "none";
        }
        if (gerenciar_treinos.style.display != "none") {
            gerenciar_treinos.style.display = "none";
        }
    }
}
function abrir_gerenciar_alunos_lista() {
    if (gerenciar_alunos_lista.style.display != "flex") {
        gerenciar_alunos_lista.style.display = "flex";
        if (cadastrar_aluno.style.display != "none") {
            cadastrar_aluno.style.display = "none";
        }
    }

} function abrir_cadastrar_aluno() {
    if (cadastrar_aluno.style.display != "flex") {
        cadastrar_aluno.style.display = "flex";
        if (gerenciar_alunos_lista.style.display != "none") {
            gerenciar_alunos_lista.style.display = "none";
        }
    }
}
// Gerenciar Treinos:

function abrir_gerenciar_treino() {
    if (gerenciar_treinos.style.display != "flex") {
        gerenciar_treinos.style.display = "flex";
        if (gerenciar_adms.style.display != "none") {
            gerenciar_adms.style.display = "none";
        }
        if (gerenciar_alunos.style.display != "none") {
            gerenciar_alunos.style.display = "none";
        }

    }
} function abrir_gerenciar_treinos_lista() {
    if (gerenciar_treinos_lista.style.display != "flex") {
        gerenciar_treinos_lista.style.display = "flex";
        if (cadastrar_treino.style.display != "none") {
            cadastrar_treino.style.display = "none";
        }
    }

} function abrir_cadastrar_treino() {
    if (cadastrar_treino.style.display != "flex") {
        cadastrar_treino.style.display = "flex";
        if (gerenciar_treinos_lista.style.display != "none") {
            gerenciar_treinos_lista.style.display = "none";
        }
    }
}