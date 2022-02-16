<?php
require_once("valida_acesso.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="./css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="./css/fontawesome/fontawesome.min.css" rel="stylesheet">
    <link href="./css/fontawesome/brands.min.css" rel="stylesheet">
    <link href="./css/fontawesome/solid.min.css" rel="stylesheet">
    <link href="./css/sistema/menu.css" rel="stylesheet">
</head>

<body>
    <div class="container-expand-xl">
        <nav class="navbar navbar-expand-lg navbar-fixed-top bg-info">
            <div class="container">
                <a class="navbar-brand text-dark h4 my-auto" href="#">Etapas de Produção</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="btn btn-outline-dark texto-nav" aria-current="page" href="rastrear_produto.php"><i class="fas fa-box me-2"></i>Rastrear produto</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn btn-outline-dark dropdown-toggle ms-2 texto-nav" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Produto
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item disabled" href="cad_produto.php">Cadastrar Produto</a></li>
                                <li><a class="dropdown-item disabled" href="consulta_produto.php">Consultar Produtos</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <p class="my-auto h4 me-3">Bem vindo <?php echo $_SESSION["usuario"] ?>!</p>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-dark texto-nav" aria-current="page" href="sair.php">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="menu-background w-75 mx-auto">
        </div>

    </div>
    <script src="./js/jquery/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/19a385d9b8.js" crossorigin="anonymous"></script>
</body>

</html>