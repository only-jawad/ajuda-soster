<?php
// API para inserir um lutador
require_once(__DIR__ . "/../../controller/LutadorController.php");
require_once(__DIR__ . "/../../model/Lutador.php");

$msgErro = '';
$lutador = null;

if (isset($_POST['submetido'])) {
    // Captura os campos do formulário
    $nome = trim($_POST['nome']) ?? null;
    $altura = $_POST['altura'] ?? null;
    $peso = $_POST['peso'] ?? null;

    // Criar o objeto lutador
    $lutador = new Lutador();
    $lutador->setNome($nome);
    $lutador->setAltura($altura);
    $lutador->setPeso($peso);

    // Chama o controller para salvar o lutador
    $lutadorCont = new LutadorController();
    $erros = $lutadorCont->inserir($lutador);

    if (empty($erros)) {
        // Enviar uma resposta vazia (sucesso)
        echo '';
        exit;
    } else {
        // Enviar os erros como resposta
        echo implode("<br>", $erros);
        exit;
    }
}

// Se chegar até aqui, a requisição não foi tratada corretamente
echo 'Erro: Requisição inválida.';
exit;
