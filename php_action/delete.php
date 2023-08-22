<?php 

session_start();

require_once 'db_connect.php';

/*echo '<pre>';
print_r($_POST);
echo '</pre>'; */

if(!empty($_POST)) {


   try {
        $sql = "DELETE FROM usuarios WHERE id = :id";
 
        
        $stmt = $connect->prepare($sql);

        $dados = array(
            ':id' =>$_POST['id'],

        );

        if($stmt->execute($dados)){
            $_SESSION['mensagem'] = "Deletado com sucesso";
            header("Location: ../index.php");
        }
    } catch (PDOException $e) {
        die($e->getMessage());
            $_SESSION['mensagem'] = "Erro ao deletar";
            header("Location: ../index.php");
    }

}else{
    header("Location: ../index.php?msgErro=Erro de Dados.");
}
die();
?>