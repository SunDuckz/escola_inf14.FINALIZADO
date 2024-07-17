<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Nota</title>
    <script src="../public/javascript/script.js" text="text/javascript"></script>
</head>
<?php
    require_once '../models/usuarioModel.php';
    require_once '../models/materiaModel.php';

    
    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1){
        header('Location: login.php');
        exit();
    }

    $materiaModel = new materiaModel();
    $materias = $materiaModel->buscarMaterias();
    $usuarioModel = new usuarioModel();
    $usuarios = $usuarioModel->buscarAlunos()


?>
<body>
    <header>
        <?php require_once "../public/html/menuAdmin.html"; ?>
        <h1>Cadastrar Nota</h1>
    </header>
    <main>
        <form action="../routers/notaRouter.php" method="post">
            <br>
            <label for="idUsuario">Aluno</label>
            <br>
            <select name="idUsuario" id="idUsuario">
                <option value="0">Selecione...</option>
                <?php foreach ($usuarios as $usuario) :?>
                    <option value="<?= $usuario->idUsuario ?>"><?=$usuario->nome?></option>
                <?php endforeach ?>
            </select>
            <br>
            <label for="idMateria">Matéria</label>
            <br>
            <select name="idMateria" id="idMateria">
                <option value="0">Selecione...</option>
                <?php foreach ($materias as $materia) :?>
                    <option value="<?= $materia->idMateria ?>"><?=$materia->descricao?></option>
                <?php endforeach ?>
            </select>
            <br>
            <label for="valorNota">Nota:</label>
            <br>
            <input type="number" name="valorNota" id="valorNota" required min="0" max="10" step=".1">
            <br>
            <br>
            <input type="hidden" name="rota" id="rota" value="cadastrar">
            <input type="submit" value="Cadastrar">
        </form>
    </main>
</body>
</html>