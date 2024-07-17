<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <script src="../public/javascript/script.js" text="text/javascript"></script>
</head>
<?php
    require_once '../models/usuarioModel.php';
    require_once '../models/tipoUsuarioModel.php';

    session_start();


    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1){
        header('Location: login.php');
        exit();
    }

    $usuarioModel = new usuarioModel();
    $tipoUsuarioModel = new tipoUsuarioModel();
    $idUsuario = $_GET['idUsuario'];
    $usuario = $usuarioModel->BuscarUsuarioPorId($idUsuario);
    $tiposUsuario = $tipoUsuarioModel->buscarTiposUsuario();

?>
<body>
    <header>
    <?php require_once "../public/html/menuAdmin.html"; ?>
        <h1>Editar Usuario</h1>
    </header>
    <main>
        <a href="editarSenha.php?idUsuario=<?= $idUsuario ?>">Editar Senha</a>
        <br>
        <br>
    <form action="../routers/usuarioRouter.php" method="post" onsubmit=" return validarCamposEditarUsuario(event);">
            <label for="descricao">Nome</label>
            <br>
            <input type="text" name="nome" id="nome" value="<?=$usuario->nome; ?>" required>
            <br>
            <label for="email">E-mail</label>
            <br>
            <input type="email" name="email" id="email" value="<?=$usuario->email; ?>"required>
            <br>
            <br>
            <select name="idTipoUsuario" id="idTipoUsuario">
                <option value="0">Selecione...</option>
                <?php foreach ($tiposUsuario as $tipoUsuario) :?>
                    <?php if($tipoUsuario->idTipoUsuario == $usuario->idTipoUsuario) :?>
                        <option value="<?= $tipoUsuario->idTipoUsuario; ?>" selected><?= $tipoUsuario->descricao; ?></option>
                    <?php else :?>
                        <option value="<?= $tipoUsuario->idTipoUsuario; ?>" ><?= $tipoUsuario->descricao; ?></option>
                    <?php endif; ?>
                <?php endforeach ?>
            </select>
            <br>
            <br>
            <input type="hidden" name="idUsuario" id="idUsuario" value="<?=$usuario->idUsuario ?>"required>
            <input type="hidden" name="rota" id="rota" value="salvar">
            <input type="submit" value="Salvar">
        </form>
    </main>
</body>
</html>