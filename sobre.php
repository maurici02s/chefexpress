<?php 
    require_once 'conexao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/CSS/sobre.css">
    <title>Sobre</title>
</head>
<body>
    <header> 
        <figure> 
            <img src="IMG/HOME/LOGO.png" alt="Logo do ChefExpress">
        </figure>

        <nav class="info">
            <ul class="menu">
                <li class="home"><a href="home.php">HOME</a></li>
                <li class="sobre"><a href="sobre.php">SOBRE</a></li>
                <li class="servicos"><a href="servicos.php">SERVIÇOS</a></li>
            </ul>
        </nav>

        
        <form action="">
            <button class="entrar"><a href="entrar.php">ENTRAR</a></button>
        </form>
    </header>

    <main>
        <section class="sobre_info">
            <h1>Sobre nós</h1>

            <p>No ChefExpress, estamos comprometidos em revolucionar a forma como as pessoas acessam e recebem seus produtos essenciais. Fundada com a missão de proporcionar conveniência, confiabilidade e eficiência, somos uma empresa de entrega dedicada a simplificar a vida dos nossos clientes.

            Nosso compromisso com a excelência começa com a ampla variedade de produtos que oferecemos. Desde alimentos frescos e refeições prontas até produtos de cuidados pessoais e artigos para o lar, nossa plataforma apresenta uma seleção diversificada de itens cuidadosamente selecionados de lojas locais confiáveis.</p>
        </section>

        <form action="">
            <button class="cadastrar"><a href="cadastro.php">CADASTRAR</a></button>
        </form>

        <figure>
            <img src="IMG/SOBRE/prato_de_comida.png" alt="">
        </figure>
    </main>


    <footer>
        <p>Copyright © 2024  | Todos os direitos reservados</p>
    </footer>
</body> 
</html>
