<?php
    require_once 'conexao.php';

    class tipoUsuarioDAO {

        public function buscarTiposUsuario() {
            $conexao = (new conexao)->getConexao();

            $sql = 'SELECT * FROM tipo_usuario';

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function cadastrarTipoUsuario(tipoUsuarioModel $tipoUsuario) {
            $conexao = (new conexao)->getConexao();

            $sql = 'INSERT INTO tipo_usuario VALUES (null,:descricao)';
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':descricao', $tipoUsuario->descricao);
            return $stmt->execute();
        }
        public function buscarTipoUsuarioPorId(int $idTipoUsuario) {
            $conexao = (new conexao)->getConexao();

            $sql = 'SELECT * from tipo_usuario WHERE id_tipo_usuario = :idTipoUsuario';
            $stmt = $conexao->prepare($sql);

            $stmt->bindParam(":idTipoUsuario",$idTipoUsuario);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        public function atualizarTipoUsuario (tipoUsuarioModel $tipoUsuario){
            $conexao = (new conexao)->getConexao();

            $sql = 'UPDATE tipo_usuario set descricao = :descricao WHERE id_tipo_usuario = :idTipoUsuario';
            $stmt = $conexao->prepare($sql);

            $stmt->bindValue(":descricao",$tipoUsuario->descricao);
            $stmt->bindParam(":idTipoUsuario",$tipoUsuario->idTipoUsuario);
            return $stmt->execute();
        }
        public function excluirTipoUsuario (int $idTipoUsuario){
            $conexao = (new conexao)->getConexao();

            $sql = 'DELETE FROM tipo_usuario WHERE id_tipo_usuario = :idTipoUsuario';

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idTipoUsuario',$idTipoUsuario);
            return $stmt->execute();
        }
    }

?>