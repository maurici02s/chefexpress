<!DOCTYPE html>
<html>
<head>
    <title>Buscar entregador</title>
</head>
<body>

<h2>Sua Localização</h2>

<form action="processar_endereco.php" method="post">
    <label for="endereco">Endereço:</label>
    <input type="text" id="endereco" name="endereco" required>

    <label for="complemento">Complemento:</label>
    <input type="text" id="complemento" name="complemento">

    <label for="referencia">Referência:</label>
    <input type="text" id="referencia" name="referencia">

    <button type="save">+ Salvar endereco</button>

    <button type="submit">Buscar Entregador</button>
</form>

</body>
</html>

<?php

require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $endereco = $_POST['endereco'];
    $complemento = $_POST['complemento'];
    $referencia = $_POST['referencia'];

    $entregadorDisponivel = buscarEntregador($endereco); 

    if ($entregadorDisponivel) {
        echo "Entregador encontrado! Aguarde...";
    } else {
        echo "Nenhum entregador disponível no momento. Tente novamente mais tarde.";
    }

} else {
    echo "Método de requisição inválido.";
}

use Illuminate\Support\Facades\DB; // faltar importar classe DB para usar raw queries

function buscarEntregador($endereco) {
    $coordenadas = getCoordenadas($endereco); 

    if ($coordenadas) {
        $latitude = $coordenadas['latitude'];
        $longitude = $coordenadas['longitude'];

        // busca entregadores disponiveis no banco de dados dentro do raio de 5km
        $entregadores = DB::select(
            "SELECT * FROM entregadores 
             WHERE 6371 * 2 * ASIN(SQRT(POWER(SIN((? - latitude) * PI() / 180 / 2), 2) + COS(? * PI() / 180) * COS(latitude * PI() / 180) * POWER(SIN((? - longitude) * PI() / 180 / 2), 2))) < 5", 
            [$latitude, $latitude, $longitude]
        );

        // 3. Retornar o primeiro entregador encontrado (ou null se não houver)
        return $entregadores ? $entregadores[0] : null;
    }

    return null;
}

function getCoordenadas($endereco) {

    $apiKey = 'SUA_API_KEY_GOOGLE_MAPS';
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($endereco) . "AIzaSyA2gmMHnT_bdZ_q4smxpmlRFnzjXH2DOuU" . $apiKey;
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if ($data['status'] === 'OK' && isset($data['results'][0]['geometry']['location'])) {
        return $data['results'][0]['geometry']['location'];
    }

    return null;
}

?>