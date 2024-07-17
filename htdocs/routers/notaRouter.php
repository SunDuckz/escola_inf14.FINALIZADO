<?php
    require_once '../controllers/notaController.php';

    $notaController = new notaController;
    $rota = $_POST['rota'];

    switch ($rota) {
        case 'cadastrar':
            $idUsuario = $_POST['idUsuario'];
            $idMateria = $_POST['idMateria'];
            $valor = $_POST['valorNota'];

            $notaController->cadastrarNota($idUsuario,$idMateria,$valor);
            break;
        case 'salvar':
            $idMateria = $_POST['idMateria'];
            $idUsuario = $_POST['idUsuario'];
            $valor = $_POST['valor'];

            $notaController->alterarNota($idUsuario,$idMateria,$valor);
            break;
        case 'excluir':
            $idNota = $_POST['idNota'];

            $notaController->excluirNota($idNota);
            break;
            }




?>