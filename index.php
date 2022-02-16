<?php
session_start();
?>
<?php
require_once("conexao.php");

if (filter_input(INPUT_SERVER, "REQUEST_METHOD") === "POST") {
    try {
        $erros = [];
        $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);

        $sql = "select * from usuario where usuario = ? and senha = SHA2(?, 512)";

        $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO, USUARIO, SENHA);

        $pre = $conexao->prepare($sql);
        $pre->execute(array(
            $login,
            $senha
        ));

        $resultado = $pre->fetch();
        if (!$resultado) {
            throw new Exception("Login e ou senha inválido(s)!");
        } else {
            $_SESSION["usuario_id"] = $resultado["id_usuario"];
            $_SESSION["usuario"] = $resultado["usuario"];
        }

        header("HTTP 1/1 302 Redirect");
        header("Location: menu.php");
    } catch (Exception $e) {
        $erros[] = $e->getMessage();
        $_SESSION["erros"] = $erros;
    } finally {
        $conexao = null;
    }
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="./css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="./css/fontawesome/brands.min.css" rel="stylesheet">
    <link href="./css/fontawesome/solid.min.css" rel="stylesheet">
    <link href="./css/sistema/login.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4dd93295c5.js" crossorigin="anonymous"></script>
    <script src="./js/jquery/jquery-3.6.0.js"></script>
    <script src="./js/bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body>
    <main class="form-signin">
        <?php
        if (isset($_SESSION["erros"])) {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>";
            echo "<button type='button' class='btn-close btn-sm' data-bs-dismiss='alert'
                aria-label='Close'></button>";
            foreach ($_SESSION["erros"] as $chave => $valor) {
                echo $valor . "<br>";
            }
            echo "</div>";
        }
        unset($_SESSION["erros"]);
        ?>
        <form id="formlogin" action="index.php" method="post">
            <h1 class="h3 mb-3 fw-normal">Login</h1>
            <div class="form-floating mb-2">
                <input type="texto" class="form-control" id="login" name="login" maxlength="10" placeholder="Login" required="required">
                <label for="login">Login</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="senha" name="senha" maxlength="15" placeholder="Senha"> <label for="senha">Senha</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Logar</button>
        </form>
    </main>
</body>

</html>