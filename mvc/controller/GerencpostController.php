<?php

    Class GerencpostController{

        public function index(){

            $loader = new \Twig\Loader\FilesystemLoader('mvc/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('gerenciamento_de_postagens.html');

                $parametro = array();

                $conteudo = $template->render($parametro);
                echo $conteudo;

        }

    }

?>