<?php
    require_once 'conexao.php';

    class materiaDAO {
        public function cadastrarMateria(materiaModel $materia){
            $conexao = (new conexao)->getConexao();

            $sql = 'INSERT INTO materia VALUES (null,:descricao)';

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':descricao', $materia->descricao);
            return $stmt->execute();

        }

        public function buscarMaterias() {
            $conexao = (new conexao)->getConexao();

            $sql = 'SELECT * FROM materia';

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function excluirMateria (int $idMateria) {
            $conexao = (new conexao)->getConexao();

            $sql = 'DELETE FROM materia WHERE id_materia = :idMateria';

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idMateria',$idMateria);
            return $stmt->execute();
        }
        public function atualizarMateria(materiaModel $materia) {
            $conexao = (new conexao)->getConexao();

            $sql = 'UPDATE materia SET descricao = :descricao where id_materia = :idMateria';

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idMateria',$materia->idMateria);
            $stmt->bindParam(':descricao',$materia->descricao);

            return $stmt->execute();
        }

        public function buscarMateriaPorId(int $idMateria) {
            $conexao = (new conexao)->getConexao();

            $sql = 'SELECT * FROM materia WHERE id_materia = :idMateria';

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idMateria',$idMateria);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

?>