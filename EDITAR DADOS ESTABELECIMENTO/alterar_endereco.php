<?php   
    require_once 'Estabelecimento.php'; 

    require_once 'conexao.php';

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_SESSION['estabelecimento_id'];
        $emailAtual = $_POST['endereco_atual'];
        $novoEmail = $_POST['novo_endereco'];
    
        $estabelecimento = Estabelecimento::buscarPorId($db, $id);
    
        if ($estabelecimento) {
            if ($estabelecimento->getEndereco() === $enderecoAtual) {
    
                // 2. Atualizar o email no banco de dados
                $estabelecimento->setEndereco($novoEndereco);
                if ($estabelecimento->salvar($db)) {
                    echo "Endereco alterado com sucesso!";
                } else {
                    echo "Erro ao alterar o Endereco.";
                }
    
            } else {
                echo "Endereco atual incorreto.";
            }
        } else {
            echo "Endereco não encontrado.";
        }
    }
?>