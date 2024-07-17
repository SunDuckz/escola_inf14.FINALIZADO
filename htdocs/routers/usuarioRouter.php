<?php
    require '../controllers/userController.php';

    $usuarioController = new usuarioController;
    $rota = $_POST['rota'];

    switch($rota) {
        case 'entrar':
            $email = $_POST['email'];
            $senha = $_POST['password'];

            $usuarioController->validarUsuario($email,$senha);

            break;
        case 'alterarAluno':
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $idUsuario = $_POST['idUsuario'];

            $usuarioController->atualizarDadosAluno($nome,$email,$idUsuario);
            break;
        case 'cadastrar':
            $idTipoUsuario = $_POST['idTipoUsuario'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['password'];

            $usuarioController->cadastrarUsuario($idTipoUsuario,$nome,$email,$senha);
            break;

        case 'salvar':
            $idUsuario = $_POST['idUsuario'];
            $idTipoUsuario = $_POST['idTipoUsuario'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];

            $usuarioController->atualizarUsuario($idUsuario,$idTipoUsuario,$nome,$email);
            break;
        case 'excluir':
            $idUsuario = $_POST['idUsuario'];

            $usuarioController->excluirUsuario($idUsuario);
            break;

        case 'alterarSenha':
            $idUsuario = $_POST['idUsuario'];
            $senha = $_POST['senha'];

            if ($senha == ''){
                header("Location: ../views/gerenciamentoUsuario.php");
                break;
            }
            else{
            $usuarioController->atualizarSenha($idUsuario,$senha);
            break;
            }

    }
        

?>