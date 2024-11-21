<?php
require_once "../db.php";
function get_put_data() {
    $put_data = file_get_contents("php://input");
    $query_string = urldecode($put_data);
    $parametros = explode('&', $query_string);
    $resultado = [];
    foreach ($parametros as $param) {
        // Dividindo cada par na chave e no valor
        list($chave, $valor) = explode('=', $param);
        
        // Armazenando o par chave => valor no hashmap
        $resultado[$chave] = $valor;
    }

    return $resultado;
}

$method = $_SERVER["REQUEST_METHOD"];

if ($method === "POST") {
    if (
        isset($_POST["nome"]) &&
        isset($_POST["email"]) &&
        isset($_POST["cpf"]) &&
        isset($_POST["telefone"])
    ) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $cpf = $_POST["cpf"];
        $telefone = $_POST["telefone"];

        Database::criar(
            "cliente", 
            ["nome", "email", "cpf", "telefone"],
            [$nome, $email, $cpf, $telefone]
        );

        $mensagem = "Sucesso! 😊";
    } else {
        $mensagem = "Erro 😢";
    }

    include "../view/mensagem.php";
}

if ($method === "GET") {
    $table = 'cliente';
    $headers = ["Id", "Nome", "Email", "CPF", "Telefone"];
    $data = Database::listar("cliente");
    include "../view/table.php";
}

if ($method === "PUT") {
    $_PUT = get_put_data();
    if (
        isset($_PUT["nome"]) &&
        isset($_PUT["email"]) &&
        isset($_PUT["cpf"]) &&
        isset($_PUT["telefone"]) && 
        isset($_GET["id"])
    ) {
        $nome = $_PUT["nome"];
        $email = $_PUT["email"];
        $cpf = $_PUT["cpf"];
        $telefone = $_PUT["telefone"];
        $id = $_GET["id"];

        Database::atualizar(
            "cliente", 
            [
                "nome" => $nome,
                "email" => $email,
                "cpf" => $cpf,
                "telefone" => $telefone
            ],
            $id
        );

        $mensagem = "Sucesso! 😊";
    } else {
        $mensagem = "Erro 😢";
    }

    include "../view/mensagem.php";
}

if ($method === "DELETE") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        Database::excluir("cliente", $id);

        $table = 'cliente';
        $headers = ["Id", "Nome", "Email", "CPF", "Telefone"];
        $data = Database::listar("cliente");

        include "../view/table.php";
    }
}