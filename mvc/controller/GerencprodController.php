<?php

    Class GerencprodController{

        public function index(){

            $loader = new \Twig\Loader\FilesystemLoader('mvc/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('gerenciamento_de_produtos.html');

                $parametro = array();

                $conteudo = $template->render($parametro);
                echo $conteudo;

        }

    }

?>