<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Tipo Usuario</title>
    <script src="../public/javascript/script.js" text="text/javascript"></script>
</head>
<?php

?>
<body>
    <header>
        <?php require_once "../public/html/menuAdmin.html"; ?>
        <h1>Cadastrar Tipo Usuario</h1>
    </header>
    <main>
        <form action="../routers/tipoUsuarioRouter.php" method="post" onsubmit="return validarCamposTipoUsuario(event);">
            <label for="nome">Tipo Usuario</label>
            <br>
            <input type="text" name="descricao" id="descricao" required>
            <br>
            <br>
            <input type="hidden" name="rota" id="rota" value="cadastrar">
            <input type="submit" value="Cadastrar">
        </form>
    </main>
</body>
</html>