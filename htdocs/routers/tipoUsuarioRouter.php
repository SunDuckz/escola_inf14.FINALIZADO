<?php
    require_once '../controllers/tipoUsuarioController.php';

    $tipoUsuarioController = new tipoUsuarioController;
    $rota = $_POST['rota'];

    switch ($rota) {
        case 'cadastrar':
            $descricao = $_POST['descricao'];

            $tipoUsuarioController->cadastrarTipoUsuario($descricao);
            break;
        case 'salvar':
            $idTipoUsuario = $_POST['idTipoUsuario'];
            $descricao = $_POST['descricao'];

            $tipoUsuarioController->atualizarTipoUsuario($idTipoUsuario,$descricao);
            break;
        case 'excluir':
            $idTipoUsuario = $_POST['idTipoUsuario'];

            $tipoUsuarioController->excluirTipoUsuario($idTipoUsuario);
            break;
    }

