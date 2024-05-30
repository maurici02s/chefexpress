<?php
    require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = new Usuario();
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $alvara = $_POST['alvara'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    
    if ($usuario->cadastrar($nome, $cnpj, $alvara, $email, $senha)) {
        echo "Próxima etapa";
    } else {
        echo "Erro ao cadastrar";
    }

    header("Location: cadastro_empresa2.php");
exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/cadastrar_empresa_1.css">
    <title>Cadastrar empresa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/CSS/cadastrar_empresa_1.css">
</head>
<body>

    <main>
        <section>
            <figure>
                <img src="IMG/CADASTRAR E LOGIN/LOGO.png" alt="">
            </figure>
    
            <div>
                <h1>Crie sua conta</h1>
                <p>Seja um parceiro ChefExpress!</p>
            </div>
    
    
            <div class="inserir">
                <form action="">
                    <input type="text" name="Nome" id="" placeholder="Nome">
                    <input type="number" name="cnpj" id="" placeholder="CNPJ">
                    <input type="number" name="Alvará" id="" placeholder="Alvará">
                    <input type="email" name="E-mail" id="" placeholder="E-mail">
                    <input type="password" name="Senhha" id="" placeholder="Senha">
                </form>
            </div>
    
            <button>Continuar</button>
    
            <nav>
                <P>Já tem conta? <a href="">Entrar</a></P>
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