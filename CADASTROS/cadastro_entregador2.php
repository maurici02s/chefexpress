<?php
    require_once 'conexao.php';

$cores = array("Preto", "Branco", "Prata", "Vermelho");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = new Usuario();
    $localizacao = $_POST['localizacao'];
    $cnh = $_POST['cnh'];
    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $cor = $_POST['cor'];
    if ($usuario->cadastrar($nome, $email, $senha, $telefone, $cnh, $cpf, $localizacao, $placa, $modelo, $marca, $cor)) {
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
    <title>Cadastro entregador</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/CSS/cadastrar_entregador_2.css">
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
                <form method="post" action="">
                    <input type="text" name="Localização" id="" placeholder="Localização">
                    <input type="number" name="CNH" id="" placeholder="CNH">
                    <input type="text" name="Placa" id="" placeholder="Placa">
                    <input type="text" name="Modelo" id="" placeholder="Modelo">
                    <input type="text" name="Marca" id="" placeholder="Marca">

                    <label for="">Cor: </label>

                    <select id=cor_veiculo>
                    <?php foreach ($cores as $cor) { ?>
                <option value="<?php echo $cor; ?>"><?php echo $cor; ?></option>
            <?php } ?>
                    </select>
                </form>
            </div>

            <div>
                <form action="">
                    <input type="checkbox" name="" id="">
                    <label for="">Aceitar <a href="">termos e condições</a></label>
                </form>
            </div>

            <button>Continuar</button>
    
            <nav>
                <p>Já tem conta?<a href="">Entar</a></p></p>
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