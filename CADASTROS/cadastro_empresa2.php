<?php
    require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = new Usuario();
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    
    if ($usuario->cadastrar($rua, $bairro, $numero, $cep, $cidade)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar empresa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/CSS/cadastrar_empresa_2.css">
</head>
<body>
    <main> 
        <section>
            <figure>
                <img src="IMG/CADASTRAR E LOGIN/LOGO.png" alt="">
            </figure>
    
            <div class="instrucoes">
                <h1>Crie seua conta</h1>
                <p>Seja um parceiro ChefExpress!</p>
            </div>
    
            <div class="inserir">
                <form action="">
                    <input type="text" name="Rua" id="" placeholder="Rua">
                    <input type="text" name="Bairro" id="" placeholder="Bairro">
                    <input type="number" name="Número" id="" placeholder="Número">
                    <input type="number" name="CEP" id="" placeholder="CEP">
                    <input type="text" name="Cidade" id="" placeholder="Cidade">
                </form>
            </div>
    
            <div>
                <form action="">
                    <input type="checkbox" name="" id="">
                    <label for="">Aceitar <a href="">termos e condições</a></label>
                </form>
            </div>
    
            <button class="bnt_finalizar">Finalizar</button>  
    
            <nav>
                <p>Já tem conta?<a href="">Entar</a></p></p>
            </nav>
        </section>
    
        <div>
            <figure>
                <img src="IMG/CADASTRAR E LOGIN/empresario.png" alt="">
            </figure>
        </div>
    </main>

   
</body>
</html>