<?php
    /* iniciou a sessão do usuario */
    session_start();
    /*compontente connect.php que serve para conectar o usuario */
    include("infra/db/connect.php");
    /* fala para o sistema pegar o POST */
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        /*Pega o que o Usuario colocou em usuario e em senha */
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        /* vé se tem o usuario no banco de dados */
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
        /* da o resuldado do que foi encontrado */
        $resultado = $conn->query($sql);
        /* se ele não achar o usuario logo é 0 então se ele achar e 1 */
        if ($resultado->num_rows > 0){
            /*guarda a sessão para que possa quando o usario entrar novamente ele volte já conectado */
            $_SESSION["usuario"] = $usuario;
            /* manda o usuario para a home.php */
            header("Location: public/home.php");
            /* tira o usuario do local atual */
            exit();
        }else{
            /* se o usuario não for encontrado ele mostra que deu errado */
            $erro = "Usuário ou senha inválidos!";
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Sitema de Login Simples</h1>

    <form method="POST">
        <label>Usuário:</label>
        <input type="text" name="usuario">
        <br>
        <label>Senha:</label>
        <input type="password" name="senha">
        <br>
        <?php
            /* mostra o erro para o usuario levando o back end para o front end */
            if(isset($erro)){
                echo $erro;
            };

            // esse erro serve ara alguma coisa
        
        ?>
        <br>
        <button type="submit">Entrar</button>
    </form>

</body>
</html>