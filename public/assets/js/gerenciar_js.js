
let gerenciar_alunos = document.getElementById("gerenciar_alunos"), gerenciar_treinos = document.getElementById("gerenciar_treinos"), cadastrar_aluno = document.getElementById("cadastrar_aluno");

function abrir_gerenciar_aluno() {
    if (gerenciar_alunos.style.display != "flex") {
        gerenciar_alunos.style.display = "flex";
        if (gerenciar_treinos.style.display != "none") {
            gerenciar_treinos.style.display = "none";
        }
        if (cadastrar_aluno.style.display != "none") {
            cadastrar_aluno.style.display = "none";
        }
    }
} function abrir_gerenciar_treino() {
    if (gerenciar_treinos.style.display != "flex") {
        gerenciar_treinos.style.display = "flex";
        if (gerenciar_alunos.style.display != "none") {
            gerenciar_alunos.style.display = "none";
        }
        if (cadastrar_aluno.style.display != "none") {
            cadastrar_aluno.style.display = "none";
        }
    }
} function abrir_cadastrar_aluno() {
    if (cadastrar_aluno.style.display != "flex") {
        cadastrar_aluno.style.display = "flex";
        if (gerenciar_alunos.style.display != "none") {
            gerenciar_alunos.style.display = "none";
        }
        if (gerenciar_treinos.style.display != "none") {
            gerenciar_treinos.style.display = "none";
        }
    }
}