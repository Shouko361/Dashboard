<?php

    Class CadpostController{

        public function index(){
            $loader = new \Twig\Loader\FilesystemLoader('mvc/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('cadpost.html');
                $parametro = array();

                $conteudo = $template->render($parametro);
                echo $conteudo;

        }

        public function cadastrarPost(){

            try {

                Postagem::insert($_POST);

                echo '<script>alert("Postado com sucesso!!");</script>';

                echo '<script>location.href="http://localhost/startbootstrap-sb-admin-2-master/cadpost"</script>';
            }
            catch (Exception $e){
                
                echo '<script>alert("'.$e->getMessage().'");</script>';

                echo '<script>location.href="http://localhost/startbootstrap-sb-admin-2-master/cadpost"</script>';


            }

        }

    }

?>