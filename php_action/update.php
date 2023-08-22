<?php 

session_start();

require_once 'db_connect.php';

/*echo '<pre>';
print_r($_POST);
echo '</pre>'; */

if(!empty($_POST)) {


   try {
        $sql = "UPDATE usuarios SET nome = :nome, sobrenome = :sobrenome, cep = :cep, cidade = :cidade, estado = :estado, logradouro = :logradouro, numero = :numero, bairro = :bairro, complemento = :complemento WHERE id = :id";
 
        
        $stmt = $connect->prepare($sql);

        $dados = array(
            ':id' =>$_POST['id'],
            ':nome' => $_POST['nome'],
            ':sobrenome' => $_POST['sobrenome'],
            ':cep' => $_POST['cep'],
            ':cidade' => $_POST['cidade'],
            ':estado' => $_POST['estado'],
            ':logradouro' => $_POST['logradouro'],
            ':numero' => $_POST['numero'],
            ':bairro' => $_POST['bairro'],
            ':complemento' => $_POST['complemento']
        );

        if($stmt->execute($dados)){
            $_SESSION['mensagem'] = "Atualizado com sucesso";
            header("Location: ../index.php");
        }
    } catch (PDOException $e) {
        die($e->getMessage());
            $_SESSION['mensagem'] = "Erro ao atualizar";
            header("Location: ../index.php");
    }

}else{
    header("Location: ../index.php?msgErro=Erro de Dados.");
}
die();
?>