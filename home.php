<?php 

?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header> 
        <figure> 
            <img src="IMG/HOME/LOGO.png" alt="">
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

    <article>
        <div class="info_negocio">
            <div class="apresentacao">
                <h1>
                    Transforme seu negócio!
                </h1>

                <p>Os parceiros do ChefExpress não apenas se beneficiam 
                    da sua facilidade de uso, mas também recebem suporte 
                    e recursos para aprimorar seus serviços de entrega.</p>

                <form action="">
                    <button class="cadastrar">
                        <a href="cadastro.php">CADASTRAR</a>
                    </button>
                </form>
            </div>

            <div class="entregador">
                <figure>
                    <img src="IMG/HOME/entregaodor_segurando_presente.png" alt="">
                </figure>
            </div>
        </div>

        <div class="info_delivery">
            <figure>
                <img src="IMG/HOME/mao-segurando-smartphone.png" alt="">
            </figure>

            <div class="apresentacao_2">
                <h2>O app delivery ideal 
                    para o seu negócio!</h2>
                
                <p>Por meio de nossa plataforma, as empresas 
                    podem chamar motoboys para realizar a entrega
                    de seus produtos. Seguro, rápido e fácil.
                </p>
            </div>
        </div>

        <div class="como_funciona">
            <div class="solicitar-entrega">
                <figure><img src="IMG/HOME/digitando.png" alt=""></figure>

                <h3>Solicitar entrega</h3>

                <p>A empresa solicita a entrega pelo app ou site.</p>
            </div>

            <div class="buscar_entregador">
                <figure>
                    <img src="IMG/HOME/entregador_usando_celular.png" alt="">
                </figure>

                <h3>Buscar entregador</h3>
                <p>O entregador recebe a notificação pelo site e aceita a chamada.</p>
            </div>

            <div class="realizar_entrega">
                <figure>
                    <img src="IMG/HOME/entregador_entregando.png" alt="">
                </figure>

                <h3>Realizar entrega</h3>

                <p>O cliente final recebe o produto em minutos.</p>
            </div>
        </div>
    </article>

    <aside>
        <section class="perguntas_frequentes">
            <h2>Perguntas frequentes</h2>
    
            <details>
                <summary>Como posso me cadastrar?</summary>
    
                <p>Para se inscrever, basta visitar nosso  site e clicar no botão “Cadastrar”. Você será guiado através de um  processo simples para criar sua conta e começar a oferecer entregas aos  seus clientes.</p>
    
            </details>
    
            <details>
                <summary>Quais os requisitos para me tornar entregador no ChefExpress?</summary>
    
                <p>Para se tornar um entregador no Chefexpress, você precisa ter um  veículo próprio e uma carteira de motorista válida. Além disso, é  necessário registrar-se em nosso site e fornecer informações básicas  sobre você e seu veículo.</p>
    
            </details>
    
            <details>
                <summary>Como faço para rastrear meu pedido?</summary>
    
                <p>Para se inscrever como empresa no Chefexpress, basta visitar nosso  site e clicar no botão de empresa. Você será guiado através de um  processo simples para criar sua conta e começar a oferecer entregas aos  seus clientes.</p>
    
            </details>
    
            <details>
                <summary>Como faço para me inscrever como empresa no ChefExpress</summary>
    
                <p>Para se inscrever como empresa no ChefExpress, basta visitar nosso  site e clicar no botão de empresa. Você será guiado através de um  processo simples para criar sua conta e começar a oferecer entregas aos  seus clientes.</p>
    
            </details>
        </section>
    
        <div class="bnt_fim">
            <button class="cadastrar_fim"><a href="cadastro.php">CADASTRAR</a></button>
            <button class="entrar_fim"><a href="entrar.php">ENTRAR</a></button>
        </div>
    </aside>
    

    <footer>
        <p>Copyright © 2024  | Todos os direitos reservados</p>
    </footer>
</body>
</html>