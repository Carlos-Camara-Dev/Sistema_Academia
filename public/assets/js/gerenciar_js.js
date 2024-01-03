
let cadastrar_personal = document.getElementById("cadastrar_personal"), gerenciar_personais = document.getElementById("gerenciar_personais"), gerenciar_personais_lista = document.getElementById("gerenciar_personais_lista"),
    cadastrar_aluno = document.getElementById("cadastrar_aluno"),
    cadastrar_aluno_treino = document.getElementById("cadastrar_aluno_treino"),
    gerenciar_alunos = document.getElementById("gerenciar_alunos"), gerenciar_alunos_lista = document.getElementById("gerenciar_alunos_lista"),
    cadastrar_treino = document.getElementById("cadastrar_treino"), gerenciar_treinos_lista = document.getElementById("gerenciar_treinos_lista"), gerenciar_treinos = document.getElementById("gerenciar_treinos"), gerenciar_excluir = document.getElementById("gerenciar_excluir");

// Gerenciar Adm's:
function abrir_gerenciar_personais() {
    if (gerenciar_personais.style.display != "flex") {
        gerenciar_personais.style.display = "flex";
        if (gerenciar_alunos.style.display != "none") {
            gerenciar_alunos.style.display = "none";
        }
        if (gerenciar_treinos.style.display != "none") {
            gerenciar_treinos.style.display = "none";
        }
        if (gerenciar_excluir.style.display != "none") {
            gerenciar_excluir.style.display = "none";
        }
    }
}
function abrir_gerenciar_personais_lista() {
    if (gerenciar_personais_lista.style.display != "flex") {
        gerenciar_personais_lista.style.display = "flex";
        if (cadastrar_personal.style.display != "none") {
            cadastrar_personal.style.display = "none";
        }
    }

} function abrir_cadastrar_personal() {
    if (cadastrar_personal.style.display != "flex") {
        cadastrar_personal.style.display = "flex";
        if (gerenciar_personais_lista.style.display != "none") {
            gerenciar_personais_lista.style.display = "none";
        }
    }
}
// Gerenciar Alunos:
function abrir_gerenciar_alunos() {
    if (gerenciar_alunos.style.display != "flex") {
        gerenciar_alunos.style.display = "flex";
        if (gerenciar_personais.style.display != "none") {
            gerenciar_personais.style.display = "none";
        }
        if (gerenciar_treinos.style.display != "none") {
            gerenciar_treinos.style.display = "none";
        }
        if (gerenciar_excluir.style.display != "none") {
            gerenciar_excluir.style.display = "none";
        }
    }
}
function abrir_cadastrar_aluno_treino() {
    if (cadastrar_aluno_treino.style.display != "flex") {
        cadastrar_aluno_treino.style.display = "flex";
        if (cadastrar_aluno.style.display != "none") {
            cadastrar_aluno.style.display = "none";
        }
        if (gerenciar_alunos_lista.style.display != "none") {
            gerenciar_alunos_lista.style.display = "none";
        }
    }
}
function abrir_gerenciar_alunos_lista() {
    if (gerenciar_alunos_lista.style.display != "flex") {
        gerenciar_alunos_lista.style.display = "flex";
        if (cadastrar_aluno.style.display != "none") {
            cadastrar_aluno.style.display = "none";
        }
        if (cadastrar_aluno_treino.style.display != "none") {
            cadastrar_aluno_treino.style.display = "none";
        }
    }

} function abrir_cadastrar_aluno() {
    if (cadastrar_aluno.style.display != "flex") {
        cadastrar_aluno.style.display = "flex";
        if (gerenciar_alunos_lista.style.display != "none") {
            gerenciar_alunos_lista.style.display = "none";
        }
        if (cadastrar_aluno_treino.style.display != "none") {
            cadastrar_aluno_treino.style.display = "none";
        }
    }
}
// Gerenciar Treinos:

function abrir_gerenciar_treino() {
    if (gerenciar_treinos.style.display != "flex") {
        gerenciar_treinos.style.display = "flex";
        if (gerenciar_personais.style.display != "none") {
            gerenciar_personais.style.display = "none";
        }
        if (gerenciar_alunos.style.display != "none") {
            gerenciar_alunos.style.display = "none";
        }
        if (gerenciar_excluir.style.display != "none") {
            gerenciar_excluir.style.display = "none";
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

// Exluir:
function abri_excluir() {
    if (gerenciar_excluir.style.display != "flex") {
        gerenciar_excluir.style.display = "flex";

        if (gerenciar_alunos.style.display != "none") {
            gerenciar_alunos.style.display = "none";
        }
        if (gerenciar_personais.style.display != "none") {
            gerenciar_personais.style.display = "none";
        }
        if (gerenciar_treinos.style.display != "none") {
            gerenciar_treinos.style.display = "none";
        }

    }
}
