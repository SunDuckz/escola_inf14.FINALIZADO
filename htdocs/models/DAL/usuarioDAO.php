<?php
    require_once 'conexao.php';

    class usuarioDAO {
        public function buscarUsuarioPorEmailESenha(usuarioModel $usuario){
            $conexao = (new conexao)->getConexao();

            $sql = 'SELECT * FROM usuario WHERE email = :email and senha = :senha';

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':email',$usuario->email);
            $stmt->bindValue(':senha',$usuario->senha);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function atualizarDadosAluno (usuarioModel $usuario) {
            $conexao = (new conexao)->getConexao();

            $sql = 'UPDATE usuario SET nome = :nome, email = :email where id_usuario = :idUsuario';

            $stmt = $conexao->prepare($sql); 
            $stmt->bindValue(':nome',$usuario->nome);
            $stmt->bindValue(':email',$usuario->email);
            $stmt->bindValue(':idUsuario',$usuario->idUsuario);

            return $stmt->execute();
        } 
        
        public function BuscarUsuarioPorId (int $idUsuario) {
            $conexao = (new conexao)->getConexao();

            $sql = 'SELECT * FROM usuario WHERE id_usuario = :idUsuario';

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idUsuario',$idUsuario);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        }

        public function buscarUsuarios() {
            $conexao = (new conexao)->getConexao();

            $sql = 'SELECT * FROM usuario';

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function inserirUsuario(usuarioModel $usuario) {
            $conexao = (new conexao)->getConexao();

            $sql = 'INSERT INTO usuario VALUES(null,:idTipoUsuario,:nome,:email,:senha)';

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idTipoUsuario',$usuario->idTipoUsuario);
            $stmt->bindValue(':nome',$usuario->nome);
            $stmt->bindValue(':email',$usuario->email);
            $stmt->bindValue(':senha',$usuario->senha);
            return $stmt->execute();
        }
        public function atualizarUsuario(usuarioModel $usuario){
            $conexao = (new conexao)->getConexao();

            $sql = 'UPDATE usuario SET nome = :nome, email = :email,id_tipo_usuario = :idTipoUsuario where id_usuario = :idUsuario';

            $stmt = $conexao->prepare($sql); 
            $stmt->bindValue(':nome',$usuario->nome);
            $stmt->bindValue(':email',$usuario->email);
            $stmt->bindValue(':idUsuario',$usuario->idUsuario);
            $stmt->bindValue(':idTipoUsuario',$usuario->idTipoUsuario);
            return $stmt->execute();
        }

        public function excluirUsuario(int $idUsuario) {
            $conexao = (new conexao)->getConexao();

            $sql = 'DELETE FROM usuario WHERE id_usuario = :idUsuario';

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idUsuario',$idUsuario);

            return $stmt->execute();
        }
        public function buscarAlunos() {
            $conexao = (new conexao)->getConexao();

            $sql = 'SELECT * FROM usuario WHERE id_tipo_usuario = 2';

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function atualizarSenha(usuarioModel $usuario) {
            $conexao = (new conexao)->getConexao();

            $sql = 'UPDATE usuario SET senha = :senha WHERE id_usuario = :idUsuario';

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':senha',$usuario->senha);
            $stmt->bindValue(':idUsuario',$usuario->idUsuario);

            return $stmt->execute();
        }
        public function conferirSeEmailEstaUtilizado (string $email){
            $conexao = (new conexao)->getConexao();

            $sql = "SELECT * from usuario WHERE email = :email";
            
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':email',$email);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }


?>