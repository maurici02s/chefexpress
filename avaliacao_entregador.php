<?php 

require_once 'conexao.php';
class Avaliacao {
    private $entregadorId;
    private $nota;
    private $comentario;

    public function __construct($entregadorId, $nota, $comentario = '') {
        $this->entregadorId = $entregadorId;
        $this->nota = $nota;
        $this->comentario = $comentario;
    }

    // Getters
    public function getEntregadorId() {
        return $this->entregadorId;
    }

    public function getNota() {
        return $this->nota;
    }

    public function getComentario() {
        return $this->comentario;
    }

    // metodo para salvar a avaliação no banco de dados
    public function salvar($db) {
        try {
            $sql = "INSERT INTO avaliacoes (entregador_id, nota, comentario) VALUES (?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->execute([$this->entregadorId, $this->nota, $this->comentario]);
            return true;
        } catch (PDOException $e) {
            // Lidar com erros de banco de dados
            return false;
        }
    }
}

try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Dados da avaliação
    $entregadorId = 1;  // ID do entregador
    $nota = 5;          // Nota de 1 a 5

    // Criar um objeto Avaliacao
    $avaliacao = new Avaliacao($entregadorId, $nota, $comentario);

    // Salvar a avaliação no banco de dados
    if ($avaliacao->salvar($db)) {
        echo "Avaliação salva com sucesso!";
    } else {
        echo "Erro ao salvar a avaliação.";
    }

} catch(PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>