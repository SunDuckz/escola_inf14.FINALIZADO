<?php
    require_once '../models/materiaModel.php';

    class materiaController {
        public function cadastrarMateria(string $descricao) {
            $materiaModel = new materiaModel();
            $materia = new materiaModel(null, $descricao);

            $retorno = $materiaModel->cadastrarMateria($materia);

            if ($retorno) {
                header('Location: ../views/gerenciamentoMaterias.php');
            }
            else {
                header('Location: ../views/cadastrarMateria.php');
            }

            exit();
        }
        public function excluirMateria(int $idMateria) {
            $materiaModel = new materiaModel();

            $materiaModel->excluirMateria($idMateria);

            header('Location: ../views/gerenciamentoMaterias.php');

            exit();

        }

        public function atualizarMateria(int $idMateria,string $descricao) {
            $materiaModel = new materiaModel();

            $materia = new materiaModel($idMateria,$descricao);
            $retorno = $materiaModel->atualizarMateria($materia);
            if ($retorno === true) {
                header('Location: ../views/gerenciamentoMaterias.php');
            }
            else {
                header("Location: ../views/editarMateria.php?idMateria= <?= $materia->idMateria ?>");
            }

            exit();
        }

    }



?>