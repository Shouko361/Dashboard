<?php

    Class CadusrController{

        public function index(){

            $loader = new \Twig\Loader\FilesystemLoader('mvc/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('cadusr.html');

                $parametro = array();

                $conteudo = $template->render($parametro);
                echo $conteudo;

        }

        public function cadastrar(){

            try {

                User::insert($_POST);
                echo '<script>alert("Cadastrado com sucesso!!");</script>';

                echo '<script>location.href="http://localhost/startbootstrap-sb-admin-2-master/cadusr"</script>';
            }
            catch (Exception $e){
                
                echo '<script>alert("'.$e->getMessage().'");</script>';

                echo '<script>location.href="http://localhost/startbootstrap-sb-admin-2-master/cadusr"</script>';


            }

        }

    }

?>