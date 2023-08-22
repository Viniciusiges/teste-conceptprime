<?php
include_once 'includes/header.php';
include_once 'php_action/db_connect.php';

$usuario = [];
$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = "SELECT * FROM usuarios WHERE id = :id";
    $resultado = $connect->prepare($sql);
    $resultado->bindValue(':id', $id);
    $resultado->execute();

    if ($resultado->rowCount() > 0) {
        $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
}
?>

<div class="row">
    <div class="col s12 m10 push-m1">
        <h3 class="light">Editar Cliente</h3>
        <form action="php_action/update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" required value="<?php echo $usuario['nome']; ?>">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome" required value="<?php echo $usuario['sobrenome']; ?>">
                <label for="sobrenome">Sobrennome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="cep" id="cep" required value="<?php echo $usuario['cep']; ?>">
                <label for="cep">CEP</label>
                <button type="button" id="btn-cep" class="btn blue">Buscar</button>
            </div>
            <div class="input-field col s12">
                <input type="text" name="cidade" id="cidade" required readonly value="<?php echo $usuario['cidade']; ?>">
                <label for="cidade">Cidade</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="estado" id="estado" required readonly value="<?php echo $usuario['estado']; ?>">
                <label for="estado">Estado</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="logradouro" id="logradouro" required 
                value="<?php echo $usuario['logradouro']; ?>">
                <label for="logradouro">Logradouro</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="bairro" id="bairro" required value="<?php echo $usuario['bairro']; ?>">
                <label for="bairro">Bairro</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="numero" id="numero" required value="<?php echo $usuario['numero']; ?>">
                <label for="numero">Numero</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="complemento" id="complemento" value="<?php echo $usuario['complemento']; ?>">
                <label for="complemento">Complemento</label>
            </div>
            <button type="submit" name="btn-editar" class="btn">Atualizar</button>
            <a href="index.php" class="btn green">Lista de Clientes</a>
        </form>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $("#btn-cep").on("click", function() {
        let numCep = $("#cep").val();
        let url = "https://viacep.com.br/ws/" + numCep + "/json";

        $.ajax({
            url: url,
            type: "get",
            dataType: "json",

            success: function(dados) {
                $("#cidade").val(dados.localidade);
                $("#estado").val(dados.uf);
                $("#logradouro").val(dados.logradouro);
                $("#bairro").val(dados.bairro);

            }
        })

    });
</script>

<?php
include_once 'includes/footer.php';
?>