<?php

    Class CadprodController{

        public function index(){
            $loader = new \Twig\Loader\FilesystemLoader('mvc/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('cadprod.html');
                $parametro = array();

                $conteudo = $template->render($parametro);
                echo $conteudo;

        }

        public function cadastrarProduto(){

            try {

                Produto::insert($_POST);
                echo '<script>alert("Produto cadastrado com sucesso!!");</script>';

                echo '<script>location.href="http://localhost/startbootstrap-sb-admin-2-master/cadprod"</script>';
            }
            catch (Exception $e){
                
                echo '<script>alert("'.$e->getMessage().'");</script>';

                echo '<script>location.href="http://localhost/startbootstrap-sb-admin-2-master/cadprod"</script>';


            }

        }

    }

?>