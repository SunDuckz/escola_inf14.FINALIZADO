<?php
    require_once 'DAL/usuarioDAO.php';

    class usuarioModel {
        public ?int $idUsuario;
        public ?int $idTipoUsuario;
        public ?string $nome;
        public ?string $email;
        public ?string $senha;

        public function __construct(?int $idUsuario = null, ?int $idTipoUsuario = null, ?string $nome = null, ?string $email = null, ?string $senha = null) {
            $this->idUsuario = $idUsuario;
            $this->idTipoUsuario = $idTipoUsuario;
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
        }

        public function buscarUsuarioPorEmailESenha(self $usuario){
            $usuarioDAO = new usuarioDAO;
            
            return $usuarioDAO->buscarUsuarioPorEmailESenha($usuario);
        }

        public function atualizarDadosAluno(self $usuario) {
            $usuarioDAO = new usuarioDAO;

            return $usuarioDAO->atualizarDadosAluno($usuario);
        }
        public function BuscarUsuarioPorId (int $idUsuario) {
            $usuarioDAO = new usuarioDAO;
            $usuario = $usuarioDAO->BuscarUsuarioPorId($idUsuario);
            $usuario = new usuarioModel($usuario['id_usuario'],
            $usuario['id_tipo_usuario'],
            $usuario['nome'],
            $usuario['email'],
            $usuario['senha']);
            return $usuario ;
        }
        public function buscarUsuarios() {
            $usuarioDAO = new usuarioDAO;

            $usuarios = $usuarioDAO->buscarUsuarios();

            foreach ($usuarios as $chave => $usuario) {
                $usuarios[$chave] = new usuarioModel(
                    $usuario['id_usuario'],
                    $usuario['id_tipo_usuario'],
                    $usuario['nome'],
                    $usuario['email'],
                    $usuario['senha']);
                }
                return $usuarios;
        }
        public function inserirUsuario (self $usuario) {
            $usuarioDAO = new usuarioDAO;

            $retorno = $usuarioDAO->inserirUsuario($usuario);
            return $retorno;
        }
        public function atualizarUsuario (self $usuario) {
            $usuarioDAO = new usuarioDAO;

            $retorno = $usuarioDAO->atualizarUsuario($usuario);
            return $retorno;
        }
        public function excluirUsuario (int $idUsuario) {
            $usuarioDAO = new usuarioDAO;

            return $usuarioDAO->excluirUsuario($idUsuario);
        }
        public function buscarAlunos() {
            $usuarioDAO = new usuarioDAO;

            $usuarios = $usuarioDAO->buscarUsuarios();

            foreach ($usuarios as $chave => $usuario) {
                $usuarios[$chave] = new usuarioModel(
                    $usuario['id_usuario'],
                    $usuario['id_tipo_usuario'],
                    $usuario['nome'],
                    $usuario['email'],
                    $usuario['senha']);
                }
                return $usuarios;
            }
            public function atualizarSenha(self $usuario) {
                $usuarioDAO = new usuarioDAO;

                return $usuarioDAO->atualizarSenha($usuario);
            }
            public function conferirSeEmailEstaUtilizado(string $email){
                $usuarioDAO = new usuarioDAO;
            
                return $usuarioDAO->conferirSeEmailEstaUtilizado($email);
            }
    }
?>