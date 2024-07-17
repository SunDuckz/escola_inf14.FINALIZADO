<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<?php
    require_once '../models/usuarioModel.php';

    session_start();
 
    if ($_SESSION['esta_logado'] !== true ){
        header('Location: login.php');
        exit();
    }

?>
<body>
    <header>
        <h1>Escola </h1>
    </header>
    <main>
        <p>Seja Bem-Vindo a Escola </p>
        <?php if ($_SESSION['id_tipo_usuario'] == 2) :?>
            <a href="alterarDadosAluno.php?idUsuario=<?=$_SESSION['id_usuario']?>">Alterar Dados Da Conta</a>
            <a href="notaAluno.php?idUsuario=<?=$_SESSION['id_usuario']?>">Ver Notas</a>
        <?php else :?>
            <ul>
                <li><a href="gerenciamentoMaterias.php">Gerenciar Materias</a></li>
                <li><a href="gerenciamentoNotas.php">Gerenciar Notas</a></li>
                <li><a href="gerenciamentoUsuario.php">Gerenciar Usuarios</a></li>
                <li><a href="gerenciamentoTipoUsuario.php">Gererenciar Tipos Usuario</a></li>
            </ul>
        <?php endif ?>
    </main>
</body>
</html>