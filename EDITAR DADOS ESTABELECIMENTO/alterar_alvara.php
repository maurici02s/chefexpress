<?php   
    require_once 'Estabelecimento.php'; 

    require_once 'conexao.php';

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_SESSION['estabelecimento_id']; // Obter o ID da sessão
        $emailAtual = $_POST['alvara_atual'];
        $novoEmail = $_POST['novo_alvara'];
    
        $estabelecimento = Estabelecimento::buscarPorId($db, $id);
    
        if ($estabelecimento) {
            if ($estabelecimento->getAlvara() === $alvaraAtual) {
    
                // 2. Atualizar o email no banco de dados
                $estabelecimento->setAlvara($novoAlvara);
                if ($estabelecimento->salvar($db)) {
                    echo "Alvará alterado com sucesso!";
                } else {
                    echo "Erro ao alterar o Alvará.";
                }
    
            } else {
                echo "Alvará atual incorreto.";
            }
        } else {
            echo "Alvará não encontrado.";
        }
    }
?>