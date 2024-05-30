<?php   
    require_once 'Estabelecimento.php'; 

    require_once 'conexao.php';

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_SESSION['estabelecimento_id']; // Obter o ID da sessão
        $emailAtual = $_POST['telefone_atual'];
        $novoEmail = $_POST['novo_telefone'];
    
        $estabelecimento = Estabelecimento::buscarPorId($db, $id);
    
        if ($estabelecimento) {
            if ($estabelecimento->getTelefone() === $emailAtual) {
    
                // 2. Atualizar o email no banco de dados
                $estabelecimento->setTelefone($novoTelefone);
                if ($estabelecimento->salvar($db)) {
                    echo "Telefone alterado com sucesso!";
                } else {
                    echo "Erro ao alterar o telefone.";
                }
    
            } else {
                echo "Telefone atual incorreto.";
            }
        } else {
            echo "Telefone não encontrado.";
        }
    }
?>