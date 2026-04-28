<?php
// administrador/funciones/conecta.php
define("HOST", 'localhost');
define("BD", 'cms_d06');
define("USER_BD", 'root');
define("PASS_BD", '');
define("PORT", 3306);

function conecta() {
    $con = new mysqli(HOST, USER_BD, PASS_BD, BD, PORT);
    
    return $con;
}