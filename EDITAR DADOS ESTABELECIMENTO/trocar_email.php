<?php   
    require_once 'Estabelecimento.php'; 

    require_once 'conexao.php';


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_SESSION['estabelecimento_id']; // Obter o ID da sessão
        $emailAtual = $_POST['email_atual'];
        $novoEmail = $_POST['novo_email'];
    
        $estabelecimento = Estabelecimento::buscarPorId($db, $id);
    
        if ($estabelecimento) {
            // 1. Verificar se o email atual está correto
            if ($estabelecimento->getEmail() === $emailAtual) {
    
                // 2. Atualizar o email no banco de dados
                $estabelecimento->setEmail($novoEmail);
                if ($estabelecimento->salvar($db)) {
                    echo "Email alterado com sucesso!";
                } else {
                    echo "Erro ao alterar o email.";
                }
    
            } else {
                echo "Email atual incorreto.";
            }
        } else {
            echo "Email não encontrado.";
        }
    }
?>