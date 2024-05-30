<?php
   require_once 'conexao.php';
class CartaoCredito {
    private $numero;
    private $nomeTitular;
    private $validade;
    private $cvc;
    
    public function __construct($numero, $nomeTitular, $validade, $cvc) {
        $this->numero = $numero;
        $this->nomeTitular = $nomeTitular;
        $this->validade = $validade;
        $this->cvc = $cvc;
    }
    
    public function getNumero() {
        return $this->numero;
    }
    
    public function getNomeTitular() {
        return $this->nomeTitular;
    }
    
    public function getValidade() {
        return $this->validade;
    }
    
    public function getCvc() {
        return $this->cvc;
    }
    

    public function setNumero($numero) {
        $this->numero = $numero;
    }
    
    public function setNomeTitular($nomeTitular) {
        $this->nomeTitular = $nomeTitular;
    }
    
    public function setValidade($validade) {
        $this->validade = $validade;
    }
    
    public function setCvc($cvc) {
        $this->cvc = $cvc;
    }
}

$cartao = new CartaoCredito("1234567890123456", "Fulano de Tal", "12/25", "123");
echo "Número do Cartão: " . $cartao->getNumero() . "<br>";
echo "Nome do Titular: " . $cartao->getNomeTitular() . "<br>";
echo "Validade: " . $cartao->getValidade() . "<br>";
echo "CVC: " . $cartao->getCvc() . "<br>";

?>