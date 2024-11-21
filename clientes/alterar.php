<?php
    require_once '../db.php';
    $id = $_GET["id"];
    $dados = Database::buscar("cliente", $id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes | Cadastrar</title>
    <script src="https://unpkg.com/htmx.org@2.0.3" integrity="sha384-0895/pl2MU10Hqc6jd4RvrthNlDiE9U1tWmX7WRESftEDRosgxNsQG/Ze9YMRzHq" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Cadastrar novo Cliente</h1>
    
    <form hx-put="/api/cliente.php?id=<?= $dados["id"] ?>" hx-target=".mensagem" hx-swap="outerHTML">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= $dados["nome"] ?>" required>
        
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?= $dados["email"] ?>" required>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="<?= $dados["cpf"] ?>" required>
        
        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" value="<?= $dados["telefone"] ?>" required>
        
        <button type="submit">Salvar</button>
    </form>

    <div class="mensagem"></div>

    <a href="/clientes">Voltar para clientes</a>
</body>
</html>