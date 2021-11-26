<?php

    Class LoginController{

        public function index(){

            $loader = new \Twig\Loader\FilesystemLoader('mvc/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('login.html',['auto_reload' =>true]);
            $params['error'] = $_SESSION['msg_error'] ?? null;

            return $template->render($params);

        }

        public function checking(){

            try {

                $user = new User;
                $user->setEmail($_POST['email']);
                $user->setSenha($_POST['senha']);
                $user->validateUser();

                header('location: http://localhost/startbootstrap-sb-admin-2-master/home');
                
            } catch (\Throwable $th) {

                $_SESSION['msg_error'] = array('error' => $th->getMessage(), 'count' => 0);

                header('location: http://localhost/startbootstrap-sb-admin-2-master/login');

            }

        }

    }

?>