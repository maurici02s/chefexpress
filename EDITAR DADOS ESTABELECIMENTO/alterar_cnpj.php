<?php   
    require_once 'Estabelecimento.php'; 

    require_once 'conexao.php';

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_SESSION['estabelecimento_id'];
        $emailAtual = $_POST['cnpj_atual'];
        $novoEmail = $_POST['novo_cnpj'];
    
        $estabelecimento = Estabelecimento::buscarPorId($db, $id);
    
        if ($estabelecimento) {
            if ($estabelecimento->getCnpj() === $cnpjAtual) {
    
                // 2. Atualizar o email no banco de dados
                $estabelecimento->setCnpj($novoCnpj);
                if ($estabelecimento->salvar($db)) {
                    echo "Cnpj alterado com sucesso!";
                } else {
                    echo "Erro ao alterar o Cnpj.";
                }
    
            } else {
                echo "Cnpj atual incorreto.";
            }
        } else {
            echo "Cnpj não encontrado.";
        }
    }
?>