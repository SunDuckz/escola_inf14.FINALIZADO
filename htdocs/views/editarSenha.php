<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Senha</title>
</head>
<?php
    require_once '../models/usuarioModel.php';

    session_start();


    if ($_SESSION['esta_logado'] !== true){
        header('Location: login.php');
        exit();
    }
    $idTipoUsuario = $_SESSION['id_tipo_usuario'];
    $usuarioModel = new usuarioModel();
    $idUsuario = $_GET['idUsuario'];
    $usuario = $usuarioModel->BuscarUsuarioPorId($idUsuario);

?>
<body>
    <header>
        <?php if ($idTipoUsuario == 1){
             require_once "../public/html/menuAdmin.html";
            }
            if ($idTipoUsuario == 2){
                require_once "../public/html/menuAlunos.html";
            }
        ?>
        <h1>Editar Usuario</h1>
    </header>
    <main>
    <form action="../routers/usuarioRouter.php" method="post">
            <label for="descricao">Senha</label>
            <br>
            <input type="password" name="senha" id="senha">
            <br>
            <input type="hidden" name="idUsuario" id="idUsuario" value="<?=$usuario->idUsuario ?>"required>
            <input type="hidden" name="rota" id="rota" value="alterarSenha">
            <input type="submit" value="Salvar">
        </form>
    </main>
</body>
</html>