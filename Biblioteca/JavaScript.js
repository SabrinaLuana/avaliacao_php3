function limparform() {
    document.getElementById("formCadastro").reset();
    
}


function validarform() {
    event.preventDefault()

    document.getElementById("formCadastro").submit();

    alert("Cadastro salvo com sucesso!");

    limparFormulario();
}