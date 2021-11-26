<?php

    Class PostController{

        public function index($params){

            try {
                
                $post = Postagem::selecionaPorId($params);

                $loader = new \Twig\Loader\FilesystemLoader('mvc/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('postagem.html');

                $parametro = array();
                $parametro['id'] = $post->id_post;

                $parametro['titulo'] = $post->titulo;

                $parametro['conteudo'] = $post->conteudo;

                $parametro['comentario'] = $post->comentario;


                $conteudo = $template->render($parametro);
                echo $conteudo;

            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            
        }

        public function addComent(){

            try {
                
                Comentario::inserir($_POST);
                echo '<script>alert("Comentario adicionado com sucesso!! :)");</script>';

                echo '<script>location.href="http://localhost/startbootstrap-sb-admin-2-master/post/index/'.$_POST['id'].'"</script>';



            } catch (Exception $e) {
                
                echo '<script>alert("'.$e->getMessage().'");</script>';

                echo '<script>location.href="http://localhost/startbootstrap-sb-admin-2-master/post/index/'.$_POST['id'].'"</script>';

            }

        }

    }

?>