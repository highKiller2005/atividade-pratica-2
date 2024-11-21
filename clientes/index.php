<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/htmx.org@2.0.3" integrity="sha384-0895/pl2MU10Hqc6jd4RvrthNlDiE9U1tWmX7WRESftEDRosgxNsQG/Ze9YMRzHq" crossorigin="anonymous"></script>
    <title>Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <a href="/index.php">Voltar</a>
    |
    <a href="cadastrar.php">Cadastrar novo cliente</a>

    <table hx-get="/api/cliente.php" hx-swap="outerHTML" hx-trigger="load"></table>
</body>
</html>