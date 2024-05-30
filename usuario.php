<?php 
    require_once 'conexao.php';

    class Cadastro_entregador1 {
        private $conexao;

        public function __construct() {
            $this->conexao = new Conexao();
        }

        public function cadastrar($email, $senha, $nome, $telefone, $cnh, $cpf) {
            $conexao = $this->conexao->conectar();
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senhaHash')";
            if ($conexao->query($sql) === TRUE) {
                return true;
            } else {
                return false;
            }
        }

        public function login($email, $senha) {
            $conexao = $this->conexao->conectar();
            $sql = "SELECT * FROM usuarios WHERE email='$email'";
            $resultado = $conexao->query($sql);
            if ($resultado->num_rows == 1) {
                $usuario = $resultado->fetch_assoc();
                if (password_verify($senha, $usuario['senha'])) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
?>