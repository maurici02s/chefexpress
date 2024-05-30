<?php 
    require_once 'conexao.php';

    class notificacao {
        private $db;
    
        public function __construct($db) {
            $this->db = $db;
        }
    
        public function create($userId, $message) {
            $sql = "INSERT INTO notificacoes (user_id, message, is_read, created_at) VALUES (?, ?, 0, NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$userId, $message]);
        }
    
        public function getUnreadNotificacoes($userId) {
            $sql = "SELECT * FROM notificacoes WHERE user_id = ? AND is_read = 0 ORDER BY created_at DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$userId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function markAsRead($notificacoesId) {
            $sql = "UPDATE notificacoes SET is_read = 1 WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$notificacoesId]);
        }
    }

    // Instanciar a classe Notificacoes
$notification = new Notificacoes($db);

// Criar uma nova notificação para o usuário com ID 1
$notification->create(1, "Nova mensagem recebida!");

// Obter notificações não lidas do usuário com ID 1
$unreadNotifications = $notification->getUnreadNotificacoes(1);

// Exibir as notificações (exemplo simples)
foreach ($unreadNotificacoes as $notificacoes) {
    echo $notificacoes['message'] . "
";
}

// Marcar a notificação com ID 5 como lida
$notificacoes->markAsRead(5);
?>

