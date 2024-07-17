<?php
    require_once '../models/usuarioModel.php';

    class usuarioController {
        public function validarUsuario (string $email, string $senha) {
            $email = str_replace(' ','',$email);
            $senha = md5(str_replace(' ','',$senha));

            $usuarioModel = new usuarioModel();
            $usuario = new usuarioModel(null,null,null,$email,$senha);
            $retorno = $usuarioModel->buscarUsuarioPorEmailESenha($usuario);

            session_start();
            
            if ($retorno) {
                $_SESSION['esta_logado'] = true;
                $_SESSION['id_tipo_usuario'] = $retorno['id_tipo_usuario'];
                $_SESSION['id_usuario'] = $retorno['id_usuario'];

                header('Location: ../views/principal.php');
            }
            else {
                header("Location: ../views/login.php");
            }
            exit();
        }
        public function atualizarDadosAluno ( string $nome,string $email, int $idUsuario) {
            $email = str_replace(' ','',$email);

            $usuarioModel = new usuarioModel();
            $usuario = new usuarioModel($idUsuario,null,$nome,$email,null);
            $retorno = $usuarioModel->atualizarDadosAluno($usuario);

            $emailJaCadastrado = $usuarioModel->conferirSeEmailEstaUtilizado($email);

            if ($emailJaCadastrado === false || $retorno){
                header('Location: ../views/principal.php');
                exit();
            }
            else {
                header("Location: ../views/alterarDadosAluno.php");        
            }
        }
        public function cadastrarUsuario(int $idTipoUsuario,string $nome,string $email,string $senha) {
            $email = str_replace(' ', '', $email);
            $senha = md5(str_replace(' ', '', $senha));

            $usuarioModel = new usuarioModel();
            $usuario = new usuarioModel(null,$idTipoUsuario,$nome,$email,$senha);
            #Verificar Email

            $emailJaCadastrado = $usuarioModel->conferirSeEmailEstaUtilizado($email);

            if ($emailJaCadastrado === false){
                $usuarioModel->inserirUsuario($usuario);
                header('Location: ../views/cadastrarUsuario.php');
    
            exit();
            }
            else{
                header("Location: ../views/gerenciamentoUsuario.php");
                exit();
            }
            
        }
        public function atualizarUsuario(int $idUsuario,int $idTipoUsuario,string $nome, string $email) {
            $email = str_replace(' ','',$email);

            $usuarioModel = new usuarioModel();
            $usuario = new usuarioModel($idUsuario,$idTipoUsuario,$nome,$email,null);
            $retorno = $usuarioModel->atualizarUsuario($usuario);

            if ($retorno === true) {
                header('Location: ../views/gerenciamentoUsuario.php');
            }
            else {
                header('Location: ../views/editarUsuario.php');
            }
        }
        public function excluirUsuario(int $idUsuario){
        $usuarioModel = new usuarioModel();
            
        $usuarioModel->excluirUsuario($idUsuario);

        header('Location: ../views/gerenciamentoUsuario.php');

        exit();
        }
        public function atualizarSenha(int $idUsuario,string $senha) {
            $senha = md5(str_replace(' ','',$senha));

            $usuarioModel = new usuarioModel();
            $usuario = new usuarioModel($idUsuario,null,null,null,$senha);
            $retorno = $usuarioModel->atualizarSenha($usuario);

            if ($retorno === true || $_SESSION['id_tipo_usuario'] == 1) {
                header('Location: ../views/gerenciamentoUsuario.php');
            }
            if ($retorno === true || $_SESSION['id_tipo_usuario'] == 2) {
                header('Location: ../views/principal.php');
            }
        }
        
    }
?>