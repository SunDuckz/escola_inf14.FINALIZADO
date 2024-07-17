<?php
    require_once '../models/tipoUsuarioModel.php';

    class tipoUsuarioController {
        public function cadastrarTipoUsuario(string $descricao) {
            $tipoUsuarioModel = new tipoUsuarioModel();
            $tipoUsuario = new tipoUsuarioModel(null, $descricao);

            $retorno = $tipoUsuarioModel->cadastrarTipoUsuario($tipoUsuario);

            if ($retorno) {
                header('Location: ../views/gerenciamentoTipoUsuario.php');
            }
            else {
                header('Location: ../views/cadastrarTipoUsuario.php');
            }

            exit();
          }
          public function atualizarTipoUsuario(int $idTipoUsuario,string $descricao){
                $tipoUsuarioModel = new tipoUsuarioModel();
                $tipoUsuario = new tipoUsuarioModel($idTipoUsuario,$descricao);

                $retorno = $tipoUsuarioModel->atualizarTipoUsuario($tipoUsuario);

                if ($retorno){
                    header('Location: ../views/gerenciamentoTipoUsuario.php');
                }
                else {
                    header('Location: ../views/editarTipoUsuario.php');
                }
          }
          public function excluirTipoUsuario(int $idTipoUsuario) {
            $tipoUsuarioModel = new tipoUsuarioModel();

            $tipoUsuarioModel->excluirTipoUsuario($idTipoUsuario);

            header('Location: ../views/gerenciamentoTipoUsuario.php');

            exit();
          }
    }
?>