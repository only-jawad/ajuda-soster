<?php
// API para inserir um lutador
require_once(__DIR__ . "/../controller/LutadorController.php");
require_once(__DIR__ . "/../model/Lutadores.php");
require_once(__DIR__ . "/../model/Categoria.php");
require_once(__DIR__ . "/../model/Organizacoes.php");

$msgErro = '';
$lutador = null;

    // Captura os campos do formulário
    $nome = trim($_POST['nome']) ?? null;
    $altura = $_POST['altura'] ?? null;
    $peso = $_POST['peso'] ?? null;
    $categoriaId = $_POST['idCategoria'] ?? null;
    $organizacaoId = $_POST['idOrganizacao'] ?? null;

    // Criar o objeto lutador
    $lutador = new Lutador();
    $lutador->setNome($nome);
    $lutador->setAltura($altura);
    $lutador->setPeso($peso);

    $categoria = new Categoria();
    $categoria->setId($categoriaId);

    $organizacao = new Organizacao();
    $organizacao->setId($organizacaoId);

    $lutador->setCategoria($categoria);
    $lutador->setOrganizacao($organizacao);

    // Chama o controller para salvar o lutador
    $lutadorCont = new LutadorController();
    $erros = $lutadorCont->inserir($lutador);

$msgErro = "";
if($erros)
    $msgErro = implode("<br>", $erros);

echo $msgErro;

