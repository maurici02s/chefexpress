<?php

require_once 'conexao.php';


class Estabelecimento {
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $alvara;
    private $cnpj;
    private $localizacao;
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getAlvara() {
        return $this->alvara;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getLocalizacao() {
        return $this->localizacao;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setAlvara($alvara) {
        $this->alvara = $alvara;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function setLocalizacao($localizacao) {
        $this->localizacao = $localizacao;
    }

    // Método para buscar os dados do estabelecimento pelo ID
    
    public static function buscarPorId($db, $id) {
        // Consulta SQL para buscar o estabelecimento
        $sql = "SELECT * FROM estabelecimentos WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);

        // Criar objeto Estabelecimento com os dados do banco
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $estabelecimento = new Estabelecimento();
            $estabelecimento->id = $row['id'];
            $estabelecimento->nome = $row['nome'];
            $estabelecimento->email = $row['email'];
            $estabelecimento->telefone = $row['telefone'];
            $estabelecimento->alvara = $row['alvara'];
            $estabelecimento->cnpj = $row['cnpj'];
            $estabelecimento->localizacao = $row['localizacao'];
            return $estabelecimento;
        } else {
            return null;
        }
    }
}

try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ID do estabelecimento 
    $estabelecimentoId = 1; 

    // Buscar os dados do estabelecimento
    $estabelecimento = Estabelecimento::buscarPorId($db, $estabelecimentoId);

    if ($estabelecimento) {
        ?>

        <h1>Perfil do Estabelecimento</h1>

        <p><strong>Nome:</strong> <?php echo $estabelecimento->nome; ?></p>
        <p><strong>Email:</strong> <?php echo $estabelecimento->email; ?></p>
        <p><strong>Telefone:</strong> <?php echo $estabelecimento->telefone; ?></p>
        <p><strong>Alvará:</strong> <?php echo $estabelecimento->alvara; ?></p>
        <p><strong>CNPJ:</strong> <?php echo $estabelecimento->cnpj; ?></p>
        <p><strong>Localização:</strong> <?php echo $estabelecimento->localizacao; ?></p>

        <a href="editar_informacoes.php?id=<?php echo $estabelecimento->id; ?>" class="btn btn-primary">Editar Informações</a>
        <a href="alterar_senha.php?id=<?php echo $estabelecimento->id; ?>" class="btn btn-secondary">Alterar Senha</a>

        <?php
    } else {
        echo "Estabelecimento não encontrado.";
    }

} catch(PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>