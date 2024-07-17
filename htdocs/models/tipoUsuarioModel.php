<?php
    require_once 'DAL/tipoUsuarioDAO.php';

    class tipoUsuarioModel {
        public ?int $idTipoUsuario;
        public ?string $descricao;

        public function __construct(?int $idTipoUsuario = null, ?string $descricao = null) {
            $this->idTipoUsuario = $idTipoUsuario;
            $this->descricao = $descricao;
        }

        public function buscarTiposUsuario(){
            $tipoUsuarioDAO = new tipoUsuarioDAO;

            $tiposUsuario = $tipoUsuarioDAO->buscarTiposUsuario();

            foreach ($tiposUsuario as $chave => $tipoUsuario) {
                $tiposUsuario[$chave] = new tipoUsuarioModel(
                    $tipoUsuario['id_tipo_usuario'],
                    $tipoUsuario['descricao']
                );
                
        }
                return $tiposUsuario;
        }
        public function cadastrarTipoUsuario(self $tipoUsuario) {
            $tipoUsuarioDAO = new tipoUsuarioDAO;

            return $tipoUsuarioDAO->cadastrarTipoUsuario($tipoUsuario);
        }
        public function buscarTipoUsuarioPorId(int $idTipoUsuario){
            $tipoUsuarioDAO = new tipoUsuarioDAO;
            
            $tipoUsuario = $tipoUsuarioDAO->buscarTipoUsuarioPorId($idTipoUsuario);
            $tipoUsuario = new tipoUsuarioModel($tipoUsuario['id_tipo_usuario'],
            $tipoUsuario['descricao']);

            return $tipoUsuario;
        }
        public function atualizarTipoUsuario(self $tipoUsuario){
            $tipoUsuarioDAO = new tipoUsuarioDAO;

            return $tipoUsuarioDAO->atualizarTipoUsuario($tipoUsuario);
        }
        public function excluirTipoUsuario (int $idTipoUsuario){
            $tipoUsuarioDAO = new tipoUsuarioDAO;

            return $tipoUsuarioDAO->excluirTipoUsuario($idTipoUsuario);

        }
    }

    
?>