<?php 

session_start();

require_once 'db_connect.php';

/*echo '<pre>';
print_r($_POST);
echo '</pre>'; */

if(!empty($_POST)) {


   try {
        $sql = "INSERT INTO usuarios (nome, sobrenome, cep, cidade, estado, logradouro, numero, bairro, complemento)
                VALUES
                (:nome, :sobrenome, :cep, :cidade, :estado, :logradouro, :numero, :bairro, :complemento)";
        
        $stmt = $connect->prepare($sql);

        $dados = array(
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
            $_SESSION['mensagem'] = "Cadrastrado com sucesso";
            header("Location: ../index.php");
        }
    } catch (PDOException $e) {
        die($e->getMessage());
            $_SESSION['mensagem'] = "Erro ao cadastrar";
            header("Location: ../index.php");
    }

}else{
    header("Location: ../index.php?msgErro=Erro de Dados.");
}
die();
?>