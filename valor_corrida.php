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

// Exemplo de uso:
$distancia = 10; // Distância da corrida em km
$corrida = new Corrida($distancia);
$valor = $corrida->calcularValor();

echo "Valor da corrida: R$ " . number_format($valor, 2);
?>