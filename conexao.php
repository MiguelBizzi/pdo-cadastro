<?php
    class Conexao {
        public function conectar(){
            try{
                $pdo = new PDO("mysql:host=localhost; dbname=primeiraaplicacao;", "root", "");
            }catch (Exception $e){
                echo "Error $e";
                return "";
            }
            return $pdo;
        }                                                                                                                                      

    }

?>