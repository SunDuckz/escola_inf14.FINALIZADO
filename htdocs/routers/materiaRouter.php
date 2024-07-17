<?php
    require_once '../controllers/materiaController.php';

    $materiaController = new materiaController();
    $rota = $_POST['rota'];

    switch ($rota) {
        case 'cadastrar':
            $descricao = $_POST['descricao'];
            
            $materiaController->cadastrarMateria($descricao);
            break;
        case 'excluir':
            $idMateria = $_POST['idMateria'];

            $materiaController->excluirMateria($idMateria);
            break;
        case 'salvar':
            $idMateria = $_POST['idMateria'];
            $descricao = $_POST['descricao'];

            $materiaController->atualizarMateria($idMateria,$descricao);
            break;
    }


?>