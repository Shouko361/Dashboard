<?php

    Class ProdutosController{

        public function index(){

            try {

                $colect = Produto::selecionaTodos();

                $loader = new \Twig\Loader\FilesystemLoader('mvc/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('produtos.html');

                $parametro = array();
                $parametro['produto'] = $colect;

                $conteudo = $template->render($parametro);
                echo $conteudo;

            } 
            catch (Exception $e) {

                echo $e->getMessage();

            }
            
        }

    }

?>