<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
</head>
<?php
    
    require_once '../models/notaModel.php';

    session_start();


    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1){
        header('Location: login.php');
        exit();
    }

    $notaModel = new notaModel;
    $idUsuario = $_GET['idUsuario'];
    
    $notas = $notaModel->buscarNotasPorId($idUsuario);
    $qntDeMaterias = 0;
    $notaTotal = 0;
    foreach ($notas as $nota){
        $nota1 = $nota->valor;
        $notaTotal = $notaTotal + $nota1;
        $qntDeMaterias += 1;
    }

    if ($notaTotal !== 0) {
        $media = $notaTotal/$qntDeMaterias;
        $media = round($media,1);
    }



    ?>
<body>
    <header>
        <?php require_once "../public/html/menuAdmin.html"; ?>
        <h1>visualizar e editar Notas</h1>
    </header>
    <main>
        <br>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Matéria</th>
                    <th>Notas</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($notas as $nota) :?>
                    <tr>
                        <td><?= $nota->materia->descricao ?></td>
                        <td><?= $nota->valor ?></td>
                        <td><a href="editarNota.php?idMateria=<?= $nota->idMateria?>&idUsuario=<?= $idUsuario ?>">Editar Nota</a>
                        <form action="../routers/notaRouter.php" method="post">
                            <input type="hidden" name="idNota" id="idNota" value="<?= $nota->idNota ?>">
                                <input type="hidden" name="rota" id="rota" value="excluir">
                                <input type="submit" value="Excluir">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php if ($notaTotal !== 0) :?>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><b>Média: </b></td>
                    <td><b><?=$media?></b></td>
                </tr>
            </tbody>
        </table>
    <?php endif ?>
    </main>
</body>
</html>