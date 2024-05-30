<?php 
    require_once 'conexao.php';

    class Corrida {
        private $distancia;
    
        public function __construct($distancia) {
            $this->distancia = $distancia;
        }
    
        public function calcularValor() {
            $valorPorKm = 2.0;
            return $this->distancia * $valorPorKm;
        }
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $endereco = $_POST['endereco'];
        $distancia = $_POST['distancia']; // Passar a distância calculada para o formulário
        
        $corrida = new Corrida($distancia);
        $valor = $corrida->calcularValor();
    
        // Processar a confirmação da corrida (salvar no banco de dados, etc.)
        // ...
    
        echo "Corrida confirmada! Valor: R$ " . number_format($valor, 2);
    }
?>