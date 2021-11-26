<?php

    Class ControleusrController{

        public function index(){

            $loader = new \Twig\Loader\FilesystemLoader('mvc/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('controle_de_usuarios.php');

                $parametro = array();

                $conteudo = $template->render($parametro);
                echo $conteudo;

        }

        public function listusr(){

            $con = Connection::getConn();

            $query = "SELECT * FROM usr ORDER BY id";
            $sql_usr = $con->prepare($query);
            $sql_usr->execute();


        }
    }

?>