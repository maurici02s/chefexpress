<?php 
    require_once 'conexao.php';



// Classe Endereco (Endereco.php)
class Endereco {
    private $id;
    private $userId;
    private $rua;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;
    private $cep;

    // Construtor (opcional - para criar objetos Endereco)
    public function __construct($userId, $rua, $numero, $bairro, $cidade, $estado, $cep, $complemento = null) {
        $this->userId = $userId;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
    }

    // Getters e Setters (para acessar e modificar os atributos)
    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    // ... (getters e setters para os demais atributos)

    // Método para salvar o endereço no banco de dados
    public function salvar($db) {
        // Assumindo que você tem uma conexão com o banco de dados em $db
        try {
            $sql = "INSERT INTO enderecos (user_id, rua, numero, complemento, bairro, cidade, estado, cep)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                $this->userId,
                $this->rua,
                $this->numero,
                $this->complemento,
                $this->bairro,
                $this->cidade,
                $this->estado,
                $this->cep
            ]);
            $this->id = $db->lastInsertId(); // Define o ID do endereço após a inserção
            return true;
        } catch (PDOException $e) {
            // Lidar com erros de banco de dados
            return false;
        }
    }

    // Método estático para buscar todos os endereços do banco de dados
    public static function buscarTodos($db) {
        try {
            $sql = "SELECT * FROM enderecos";
            $stmt = $db->query($sql);
            $enderecos = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $endereco = new Endereco(
                    $row['user_id'],
                    $row['rua'],
                    $row['numero'],
                    $row['bairro'],
                    $row['cidade'],
                    $row['estado'],
                    $row['cep'],
                    $row['complemento']
                );
                $endereco->id = $row['id'];
                $enderecos[] = $endereco;
            }
            return $enderecos;
        } catch (PDOException $e) {
            // Lidar com erros de banco de dados
            return []; // Retorna um array vazio em caso de erro
        }
    }
}


try {
    $db = new PDO("mysql:host=$localhost;dbname=$pi", $dbUser, $dbPass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ... (código para criar um novo endereço e salvar no banco de dados)

    // Buscar todos os endereços do banco de dados
    $enderecos = Endereco::buscarTodos($db);

    // Exibir os endereços (exemplo simples)
    foreach ($enderecos as $endereco) {
        echo "Endereço: " . $endereco->getRua() . ", " . $endereco->getNumero() . "
";
    }

} catch(PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>