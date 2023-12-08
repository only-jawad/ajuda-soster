const baseUrl = document.getElementById('hddBaseUrl').value;

const inputNome = document.getElementById('txtNome');
const inputPeso = document.getElementById('txtPeso');
const inputAltura = document.getElementById('txtAltura');
const inputOrganizacao = document.getElementById('selOrganizacao');
const inputCategoria = document.getElementById('selCategoria');

const divErros = document.getElementById('divMsgErro');

function inserirLutador() {
    // Estrutura FormData para enviar os parâmetros no corpo da requisição do tipo POST
    var dados = new FormData();
    dados.append("nome", inputNome.value);
    dados.append("peso", inputPeso.value);
    dados.append("altura", inputAltura.value);
    dados.append("idOrganizacao", inputOrganizacao.value);
    dados.append("idCategoria", inputCategoria.value);

    // Requisição AJAX
    var xhttp = new XMLHttpRequest();

    var url = baseUrl + "/api/inserir_lutador.php";

    xhttp.open("POST", url);
    xhttp.onload = function () {
        var resposta = xhttp.responseText;

        if (resposta) {
            divErros.innerHTML = resposta;
            divErros.style.display = "block";
        } else {
            // Redirecionar para a listagem
            window.location = "listar.php";
        }
    };
    xhttp.send(dados);
}
