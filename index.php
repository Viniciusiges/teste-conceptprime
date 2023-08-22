<?php
session_start();
if(isset($_SESSION['mensagem'])) {
    echo '<script>';
    echo 'window.onload = function() {';
    echo 'M.toast({html: \'' . $_SESSION['mensagem'] . '\'});';
    echo '}';
    echo '</script>';
    
    unset($_SESSION['mensagem']);
}
?>
<?php

include_once 'php_action/db_connect.php';
//Header
include_once 'includes/header.php';
?>

<div class="row">
    <div class="col s12 m10 push-m1">
        <h3 class="light">Registros</h3>
        <table class="striped centered highlight responsive-table">
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Sobrenome:</th>
                    <th>CEP:</th>
                    <th>Cidade:</th>
                    <th>Estado:</th>
                    <th>Logradouro:</th>
                    <th>Numero:</th>
                    <th>Bairro:</th>
                    <th>Complemento:</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $lista = [];
                $sql = "SELECT * FROM usuarios";
                $resultado = $connect->query($sql);
                if($resultado->rowCount() > 0){
                    $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);
                }
                ?>
                <?php foreach($lista as $dados):?>
                <tr>
                    <td><?= $dados['nome']; ?></td>
                    <td><?= $dados['sobrenome']; ?></td>
                    <td><?= $dados['cep']; ?></td>
                    <td><?= $dados['cidade']; ?></td>
                    <td><?= $dados['estado']; ?></td>
                    <td><?= $dados['logradouro']; ?></td>
                    <td><?= $dados['numero']; ?></td>
                    <td><?= $dados['bairro']; ?></td>
                    <td><?= $dados['complemento']; ?></td>
                    <td><a href="edit.php?id=<?php echo $dados['id'];?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>

                    <td><a href="#modal <?php echo $dados['id'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

                    <div id="modal <?php echo $dados['id'];?>" class="modal">
                        <div class="modal-content">
                            <h4>Opa!</h4>
                            <p>Tem certeza que deseja excluir este registro?</p>
                        </div>
                        <div class="modal-footer">
                            

                           <form action="php_action/delete.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
                            <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>

                           </form> 
                        </div>
                    </div>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <a href="add.php" class="btn">Adicionar</a>
    </div>
</div>

<?php 
//Footer
include_once 'includes/footer.php';
?>
