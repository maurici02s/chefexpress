<?php 
    require_once 'conexao.php';

    class Usuario {
        private $conexao;
    
        public function __construct() {
            $this->conexao = new Conexao();
        }
    
        public function login($email, $senha) {
            $conexao = $this->conexao->conectar();
            $email = $conexao->real_escape_string($email);
            $senha = $conexao->real_escape_string($senha);
            $sql = "SELECT * FROM usuarios WHERE email='$email'";
            $resultado = $conexao->query($sql);
            if ($resultado->num_rows == 1) {
                $usuario = $resultado->fetch_assoc();
                if (password_verify($senha, $usuario['senha'])) {
                    return $usuario;
                }
            }
            return null;
        }
    }

    session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = new Usuario();
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuarioLogado = $usuario->login($email, $senha);
    if ($usuarioLogado) {
        // Login bem-sucedido, redirecionar para a página de perfil ou dashboard
        $_SESSION['usuario'] = $usuarioLogado;
        header("Location: perfil.php");
        exit();
    } else {
        $erroLogin = "Email ou senha incorretos.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem Vindo de Volta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/CSS//entrar.css">

</head>
<body>

    <main>
        <div class="entregador">
            <figure>
                <img src="/IMG/CADASTRAR E LOGIN/sorrindo.png" alt="">
            </figure>
        </div>

        <section>
            <figure>
                <img src="/IMG/CADASTRAR E LOGIN/LOGO.png" alt="">
            </figure>


           <div class="instrucos">
             <h1>Bem vindo de volta!</h1>
             <p>Use seu e-mail e senha para entrar!</p>
           </div>


           <form action="">
             <input type="email" name="e-mail" id="" placeholder="E-mail">
             <input type="password" name="senha" id="" placeholder="Senha">
           </form>

          <div class="check">
            <form action="">
                <input type="checkbox">
                <label for="">Lembre-me</label>
              </form>
   
              <p><a href="">Esqueceu a senha?</a></p>
          </div>

           <button>Entrar</button>


           <nav>
            <p>Ainda não tem cont? <a href="">Cadastrar</a></p>
           </nav>
        
        </section>
        
    </main>
</body>
</html>