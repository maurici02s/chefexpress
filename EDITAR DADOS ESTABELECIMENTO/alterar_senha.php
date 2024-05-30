<?php 
require_once 'Estabelecimento.php'; 

// Conexão com o banco de dados 
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['estabelecimento_id']; // Obter o ID do estabelecimento da sessão
    $senhaAtual = $_POST['senha_atual'];
    $novaSenha = $_POST['nova_senha'];
    $confirmarSenha = $_POST['confirmar_senha'];

    $estabelecimento = Estabelecimento::buscarPorId($db, $id);

    if ($estabelecimento) {
        // 1. Verificar se a senha atual está correta
        if ($estabelecimento->autenticar($senhaAtual)) { 

            // 2. Verificar se a nova senha e a confirmação são iguais
            if ($novaSenha === $confirmarSenha) {

                // 3. Atualizar a senha no banco de dados
                if ($estabelecimento->atualizarSenha($novaSenha, $db)) {
                    echo "Senha alterada com sucesso!";
                } else {
                    echo "Erro ao alterar a senha.";
                }

            } else {
                echo "A nova senha e a confirmação não coincidem.";
            }
        } else {
            echo "Senha atual incorreta.";
        }
    } else {
        echo "não encontrado.";
    }
}
?>