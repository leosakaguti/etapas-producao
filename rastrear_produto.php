<?php
require_once("valida_acesso.php");
?>
<?php
require_once("conexao.php");

try {

    $produtos = [];
    $id_usuario = $_SESSION["usuario_id"];

    $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO, USUARIO, SENHA);

    $sql = "select * from etapa_produto where usuario_comprador = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam("i", $id_usuario);
    $stmt->execute();
    $resultado = $stmt->getResult();
    $produtos = $resultado->fetchAll();    
} catch (Exception $e) {
    $erros[] = $e->getMessage();
    $_SESSION["erros"] = $erros;
} finally {
    $conexao = null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastreio de produtos</title>
    <link href="./css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="./css/fontawesome/fontawesome.min.css" rel="stylesheet">
    <link href="./css/fontawesome/brands.min.css" rel="stylesheet">
    <link href="./css/fontawesome/solid.min.css" rel="stylesheet">
    <link href="./css/datatables/datatables.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <?php
        if (!count($produtos)) {
        ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                Nenhum produto em produção encontrado!
            </div>
        <?php
        } else {
        ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="lista">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome Produto</th>
                            <th>Etapa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($produtos as $produto) {
                        ?>
                            <tr id="<?php echo $produto['id_produto'].$produto['id_etapa']; ?>">
                                <td><?php echo $produto["id_produto"]; ?></td>
                                <td><?php echo $produto["nome_produto"]; ?></td>
                                <td><?php echo $produto["desc_etapa"]; ?></td>
                                <td>
                                    <a id="botao_visualizar" chave="<?php echo $produto['id_produto'].$produto['id_etapa']; ?>" class="btn btn-info btn-sm" title="Visualizar"><i class="fas fa-eye"></i></a>
                                    <a id="botao_editar" chave="<?php echo $produto['id_produto'].$produto['id_etapa']; ?>" class="btn btn-success btn-sm" title="Editar"><i class="fas fa-edit"></i></a>
                                    <a id="botao_excluir" chave="<?php echo $produto['id_produto'].$produto['id_etapa']; ?>" class="btn btn-danger btn-sm" title="Excluir"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php echo $barra_paginacao; ?>
            </div>
        <?php
        }
        ?>
    </div>
    <script src="./js/jquery/jquery-3.6.0.js"></script>
    <script src="./js/datatables/datatables.min.js"></script>
</body>

</html>