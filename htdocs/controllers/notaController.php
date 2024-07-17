<?php
    require_once '../models/notaModel.php';

    class notaController {
        public function cadastrarNota(int $idUsuario,int $idMateria, float $valor) {
            $notaModel = new notaModel();
            $nota = new notaModel(null, $idUsuario,$idMateria,$valor);
            $retorno = $notaModel->cadastrarNota($nota);

            if ($retorno) {
                header('Location: ../views/gerenciamentoNotas.php');
            }
            else {
                header('Location: ../views/cadastrarNota.php');
            }

            exit();
        }
        public function alterarNota(int $idUsuario,int $idMateria,float $valor){
            $notaModel = new notaModel();
            $nota = new notaModel(null,$idUsuario,$idMateria,$valor,null);

            $retorno = $notaModel->alterarNota($nota);

            if ($retorno == false){
                header("Location: ../views/notaAdmin.php?idUsuario=$idUsuario");
            }
        }
        public function excluirNota (int $idNota){
            $notaModel = new notaModel();

            $notaModel->excluirNota($idNota);

            header('Location: ../views/gerenciamentoNotas.php');

            exit();

        }
    }



?>