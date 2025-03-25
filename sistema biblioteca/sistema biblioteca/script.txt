// Função para limpar o formulário
function limparFormulario() {
    document.getElementById("formCadastro").reset();
}

// Função para validar o formulário
function validarFormulario(event) {
    event.preventDefault(); // Impede o envio imediato do formulário

    var email = document.getElementById("email").value;
    var confirmarEmail = document.getElementById("confirmarEmail").value;
    var senha = document.getElementById("senha").value;
    var confirmarSenha = document.getElementById("confirmarSenha").value;

    // Verificar se os e-mails coincidem
    if (email !== confirmarEmail) {
        alert("Os e-mails não coincidem!");
        return;
    }

    // Verificar se as senhas coincidem
    if (senha !== confirmarSenha) {
        alert("As senhas não coincidem!");
        return;
    }

    // Enviar o formulário via POST
    document.getElementById("formCadastro").submit();

    // Mostrar o alerta de sucesso
    alert("Cadastro salvo com sucesso!");

    // Limpar o formulário
    limparFormulario();
}
