<?php 
    require_once 'conexao.php';


// Classe Mensagem
class Mensagem {
    private $id;
    private $remetenteId;
    private $destinatarioId;
    private $mensagem;
    private $dataHora;

    public function __construct($remetenteId, $destinatarioId, $mensagem) {
        $this->remetenteId = $remetenteId;
        $this->destinatarioId = $destinatarioId;
        $this->mensagem = $mensagem;
        $this->dataHora = date('Y-m-d H:i:s'); // Define a data e hora atual
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getRemetenteId() {
        return $this->remetenteId;
    }

    public function getDestinatarioId() {
        return $this->destinatarioId;
    }

    public function getMensagem() {
        return $this->mensagem;
    }

    public function getDataHora() {
        return $this->dataHora;
    }

    // Método para salvar a mensagem no banco de dados
    public function salvar($db) {
        try {
            $sql = "INSERT INTO mensagens (remetente_id, destinatario_id, mensagem, data_hora) VALUES (?, ?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->execute([$this->remetenteId, $this->destinatarioId, $this->mensagem, $this->dataHora]);
            $this->id = $db->lastInsertId();
            return true;
        } catch (PDOException $e) {
            // Lidar com erros de banco de dados
            return false;
        }
    }

    // Método estático para buscar mensagens entre dois usuários
    public static function buscarMensagens($db, $usuario1Id, $usuario2Id) {
        try {
            $sql = "SELECT * FROM mensagens 
                    WHERE (remetente_id = ? AND destinatario_id = ?) 
                       OR (remetente_id = ? AND destinatario_id = ?)
                    ORDER BY data_hora ASC";
            $stmt = $db->prepare($sql);
            $stmt->execute([$usuario1Id, $usuario2Id, $usuario2Id, $usuario1Id]);
            $mensagens = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $mensagem = new Mensagem($row['remetente_id'], $row['destinatario_id'], $row['mensagem']);
                $mensagem->id = $row['id'];
                $mensagem->dataHora = $row['data_hora'];
                $mensagens[] = $mensagem;
            }
            return $mensagens;
        } catch (PDOException $e) {
            // Lidar com erros de banco de dados
            return [];
        }
    }
}


// Conexão com o banco de dados 
$hostname = "localhost";
$bancodedados = "pi";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_error) {
    echo "falha ao conecetar :(" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
}
else
    echo "Conectado ao Banco de Dados";

try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // IDs do estabelecimento e do entregador
    $estabelecimentoId = 1;
    $entregadorId = 2;

    // criar uma nova mensagem do estabelecimento para o entregador
    $mensagem = new Mensagem($estabelecimentoId, $entregadorId, "O pedido está pronto para retirada.");
    if ($mensagem->salvar($db)) {
        echo "Mensagem enviada com sucesso.";
    } else {
        echo "Erro ao enviar a mensagem.";
    }

    // buscar mensagens entre o estabelecimento e o entregador
    $mensagens = Mensagem::buscarMensagens($db, $estabelecimentoId, $entregadorId);

    // Exibir as mensagens
    foreach ($mensagens as $msg) {
        echo "[$msg->getDataHora()] " . ($msg->getRemetenteId() == $estabelecimentoId ? "Estabelecimento" : "Entregador") . ": " . $msg->getMensagem() . "
";
    }

} catch(PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

?>