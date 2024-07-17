<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Matérias</title>
</head>
<?php
    require_once '../models/materiaModel.php';

    session_start();


    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1){
        header('Location: login.php');
        exit();
    }

    $materiaModel = new materiaModel();
   
    
    $materias = $materiaModel->buscarMaterias();
    
    ?>
<body>
    <header>
        <?php require_once "../public/html/menuAdmin.html"; ?>
        <h1>Gerenciar matérias</h1>
    </header>
    <main>
        <a href="cadastrarMateria.php">Cadastrar matéria</a>
        <br>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($materias as $materia) :?>
                    <tr>
                        <td><?= $materia->descricao; ?></td>
                        <td>
                            <a href="editarMateria.php?idMateria=<?= $materia->idMateria ?>">Editar</a>
                            <form action="../routers/materiaRouter.php" method="post">
                                <input type="hidden" name="idMateria" id="idMateria" value="<?= $materia->idMateria ?>">
                                <input type="hidden" name="rota" id="rota" value="excluir">
                                <input type="submit" value="Excluir">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>