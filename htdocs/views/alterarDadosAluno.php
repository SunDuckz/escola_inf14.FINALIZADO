<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Dados do Perfil</title>
    <script src="../public/javascript/script.js" text="text/javascript"></script>
</head>
<?php 
    require_once '../models/usuarioModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true ){
        header('Location: login.php');
        exit();
    }
    
    $usuarioModel = new usuarioModel();
    $idUsuario = intval($_SESSION['id_usuario']);
    
    $usuario = $usuarioModel->BuscarUsuarioPorId($idUsuario);

?>
<body>
    <header>
    <?php require_once "../public/html/menuAlunos.html"; ?>
        <h1>Alterar Dados Perfil</h1>
    </header>
    <main>
        <form action="../routers/usuarioRouter.php" method="post" onsubmit="return validarCamposEditarUsuario(event);">
            <label for="nome">Nome</label>
            <br>
            <input type="text" name="nome" id="nome" value="<?= $usuario->nome?>"required>
            <br>
            <label for="email">E-mail</label>
            <br>
            <input type="email" name="email" id="email" value="<?= $usuario->email?>"required>
            <br>
            <br>
            <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $_SESSION['id_usuario'] ?>">
            <input type="hidden" name="rota" id="rota" value="alterarAluno">
            <input type="submit" value="Alterar">
        </form>
        <br>
        <a href="editarSenha.php?idUsuario=<?= $idUsuario ?>">Alterar Senha</a>
    </main>
</body>
</html>