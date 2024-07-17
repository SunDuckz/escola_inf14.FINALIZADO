<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Notas</title>
</head>
<?php
    require_once '../models/usuarioModel.php';

    session_start();


    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1){
        header('Location: login.php');
        exit();
    }

    $usuarioModel = new usuarioModel();
   
    $usuarios = $usuarioModel->buscarAlunos();
    
    ?>
<body>
    <header>
        <?php require_once "../public/html/menuAdmin.html"; ?>
        <h1>Gerenciar Notas</h1>
    </header>
    <main>
        <br>
        <a href="cadastrarNota.php">Cadastrar Nota</a>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios as $usuario) :?>
                    <tr>
                        <td><?= $usuario->nome; ?></td>
                        <td>
                            <a href="notaAdmin.php?idUsuario=<?= $usuario->idUsuario ?>">Visualizar e Editar Nota Do Aluno</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>