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
