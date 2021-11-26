<?php

    Class HomeController{

        public function index(){

            try {

                $colect = Postagem::selecionaTodos();

                $loader = new \Twig\Loader\FilesystemLoader('mvc/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('home.html');

                $parametro = array();
                $parametro['postagens'] = $colect;

                $conteudo = $template->render($parametro);
                echo $conteudo;

            } 
            catch (Exception $e) {

                echo $e->getMessage();

            }
            
        }

        public function logout(){

            unset($_SESSION['id']);
            session_destroy();

            header('location: http://localhost/startbootstrap-sb-admin-2-master/');

        }

    }

?>