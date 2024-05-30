<?php
    require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = new Usuario();
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    if ($usuario->cadastrar($nome, $email, $senha, $telefone, $cnh, $cpf)) {
        echo "Próxima etapa";
    } else {
        echo "Erro ao cadastrar";
    }

    header("Location: cadastro_entregador2.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Cadastro de entregador</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/CSS/cadastrar_entregador.css">


</head>
<body>

    <main>
        <section>
            <figure>
                <img src="/IMG/CADASTRAR E LOGIN/LOGO.png" alt="">
            </figure>
    
            <div class="instrucoes">
                <h1>Crie seua conta</h1>
                <p>Seja um parceiro ChefExpress!</p>
            </div>
    
            <div class="inserir">
                <form action="">
                    <input type="text" name="Nome" id="" placeholder="Nome">
                    <input type="email" name="E-mail" id="" placeholder="E-mail">
                    <input type="password" name="Senha" id="" placeholder="Senha">
                    <input type="number" name="CPF" id="" placeholder="CPF">
                    <input type="number" name="Telefone" id="" placeholder="Telefone">
                    <input type="submit" value="Continuar">
                </form>
            </div>
    
            <nav>
                <p>Já tem conta?<a href="">Entrar</a></p></p>
            </nav>
    
        </section>
    
        <div>
            <figure>
                <img src="IMG/CADASTRAR E LOGIN/olhando_tablet.png" alt="">
            </figure>
        </div>

    </main>
   
</body>
</html>