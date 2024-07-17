<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuario</title>
    <script src="../public/javascript/script.js" text="text/javascript"></script>
</head>
<?php
    require_once '../models/tipoUsuarioModel.php';
    
    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1){
        header('Location: login.php');
        exit();
    }

    $tipoUsuarioModel = new tipoUsuarioModel();

    $tiposUsuario = $tipoUsuarioModel->buscarTiposUsuario()


?>
<body>
    <header>
        <?php require_once "../public/html/menuAdmin.html"; ?>
        <h1>Cadastrar Usuario</h1>
    </header>
    <main>
        <form action="../routers/usuarioRouter.php" method="post">
            <br>
            <label for="nome">Nome</label>
            <br>
            <input type="text" name="nome" id="nome" required>
            <br>
            <label for="email">E-mail</label>
            <br>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="senha">Senha</label>
            <br>
            <input type="password" name="password" id="password" required>
            <br>
            <label for="idtipoUsuario">Tipo do Usuario</label>
            <br>
            <select name="idTipoUsuario" id="idTipoUsuario">
                <option value="0">Selecione...</option>
                <?php foreach ($tiposUsuario as $tipoUsuario) :?>
                    <option value="<?= $tipoUsuario->idTipoUsuario ?>"><?=$tipoUsuario->descricao?></option>
                <?php endforeach ?>
            </select>
            <br>
            <br>
            <input type="hidden" name="rota" id="rota" value="cadastrar">
            <input type="submit" value="Cadastrar">
        </form>
    </main>
</body>
</html>