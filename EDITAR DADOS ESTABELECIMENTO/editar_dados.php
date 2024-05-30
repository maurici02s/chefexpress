<?php 
    require_once 'conexao.php';

    require_once 'Estabelecimento.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['estabelecimento_id']; // Obter o ID da sessão
    
    $estabelecimento = Estabelecimento::buscarPorId($db, $id);

    if ($estabelecimento) {
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $alvara = $_POST['alvara'];
        $cnpj = $_POST['cnpj'];
        $localizacao = $_POST['localizacao'];
        
        $estabelecimento->setEmail($email);
        $estabelecimento->setTelefone($telefone);
        $estabelecimento->setAlvara($alvara);
        $estabelecimento->setCnpj($cnpj);
        $estabelecimento->setLocalizacao($localizacao);

        if ($estabelecimento->salvar($pi)) { 
            echo "Informações atualizadas com sucesso!";
        } else {
            echo "Erro ao atualizar as informações.";
        }
    } else {
        echo "Estabelecimento não encontrado.";
    }
}
?>