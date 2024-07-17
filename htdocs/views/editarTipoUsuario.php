<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tipos Usuario</title>
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
    $idTipoUsuario = $_GET['idTipoUsuario'];
    $tipoUsuario = $tipoUsuarioModel->buscarTipoUsuarioPorId($idTipoUsuario);

?>
<body>
    <header>
    <?php require_once "../public/html/menuAdmin.html"; ?>
        <h1>Editar Tipo Usuario</h1>
    </header>
    <main>
        <form action="../routers/tipoUsuarioRouter.php" method="post" onsubmit="return validarCamposTipoUsuario(event)">
                <label for="descricao">Nome</label>
                <br>
                <input type="text" name="descricao" id="descricao" value="<?=$tipoUsuario->descricao; ?>"required>
                <br>
                <br>
                <input type="hidden" name="idTipoUsuario" id="idTipoUsuario" value="<?=$tipoUsuario->idTipoUsuario ?>">
                <input type="hidden" name="rota" id="rota" value="salvar">
                <input type="submit" value="Salvar">
            </form>
        </main>
    </body>
</html>