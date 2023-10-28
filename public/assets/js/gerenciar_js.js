
let gerenciar_alunos = document.getElementById("gerenciar_alunos"), gerenciar_treinos = document.getElementById("gerenciar_treinos"), cadastrar_usuario = document.getElementById("cadastrar_usuario"),
    cadastrar_treino = document.getElementById("cadastrar_treino"),
    cadastrar_aluno = document.getElementById("gerenciar_cadastrar_aluno"),
    cadastrar_adm = document.getElementById("gerenciar_cadastrar_adm");

function abrir_gerenciar_aluno() {
    if (gerenciar_alunos.style.display != "flex") {
        gerenciar_alunos.style.display = "flex";
        if (gerenciar_treinos.style.display != "none") {
            gerenciar_treinos.style.display = "none";
        }
        if (cadastrar_usuario.style.display != "none") {
            cadastrar_usuario.style.display = "none";
        }
        if (cadastrar_treino.style.display != "none") {
            cadastrar_treino.style.display = "none";
        }
    }
} function abrir_gerenciar_treino() {
    if (gerenciar_treinos.style.display != "flex") {
        gerenciar_treinos.style.display = "flex";
        if (gerenciar_alunos.style.display != "none") {
            gerenciar_alunos.style.display = "none";
        }
        if (cadastrar_usuario.style.display != "none") {
            cadastrar_usuario.style.display = "none";
        }
        if (cadastrar_treino.style.display != "none") {
            cadastrar_treino.style.display = "none";
        }
    }
} function abrir_cadastrar_usuario() {
    if (cadastrar_usuario.style.display != "flex") {
        cadastrar_usuario.style.display = "flex";
        if (gerenciar_alunos.style.display != "none") {
            gerenciar_alunos.style.display = "none";
        }
        if (gerenciar_treinos.style.display != "none") {
            gerenciar_treinos.style.display = "none";
        }
        if (cadastrar_treino.style.display != "none") {
            cadastrar_treino.style.display = "none";
        }
    }
} function abrir_cadastrar_treino() {
    if (cadastrar_treino.style.display != "flex") {
        cadastrar_treino.style.display = "flex";
        if (gerenciar_alunos.style.display != "none") {
            gerenciar_alunos.style.display = "none";
        }
        if (gerenciar_treinos.style.display != "none") {
            gerenciar_treinos.style.display = "none";
        }
        if (cadastrar_usuario.style.display != "none") {
            cadastrar_usuario.style.display = "none";
        }
    }
}
function abrir_cadastrar_adm() {
    if (cadastrar_adm.style.display != "flex") {
        cadastrar_adm.style.display = "flex";
        if (cadastrar_aluno.style.display != "none") {
            cadastrar_aluno.style.display = "none";
        }
    }
} function abrir_cadastrar_aluno() {
    if (cadastrar_aluno.style.display != "flex") {
        cadastrar_aluno.style.display = "flex";
        if (cadastrar_adm.style.display != "none") {
            cadastrar_adm.style.display = "none";
        }
    }
}
