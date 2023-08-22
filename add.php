<?php
include_once 'includes/header.php';
?>

<div class="row">
    <div class="col s12 m10 push-m1">
        <h3 class="light">Novo Cadastro</h3>
        <form action="php_action/create.php" method="POST">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" required>
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome" required>
                <label for="sobrenome">Sobrennome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="cep" id="cep" required placeholder="Insira somente n° Ex: 01310930">
                <label for="cep">CEP</label>
                <button type="button" id="btn-cep" class="btn blue">Buscar</button>

            </div>
            <div class="input-field col s12">
                <input type="text" name="cidade" id="cidade"  required  placeholder="">
                <label for="cidade" >Cidade</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="estado" id="estado" required placeholder="">
                <label for="estado">Estado</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="logradouro" id="logradouro" required placeholder="">
                <label for="logradouro">Logradouro</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="bairro" id="bairro" required placeholder="">
                <label for="bairro">Bairro</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="numero" id="numero" required>
                <label for="numero">Numero</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="complemento" id="complemento">
                <label for="complemento">Complemento</label>
            </div>
            <button type="submit" name="btn-cadastrar" class="btn">Cadastrar</button>
            <a href="index.php" class="btn green">Lista de Registros</a>
        </form>


    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $("#btn-cep").on("click", function() {
        let numCep = $("#cep").val();
        let url = "https://viacep.com.br/ws/"+numCep+"/json";

        $.ajax({
            url: url,
            type: "get",
            dataType: "json",

            success:function(dados) {
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