<?php

    session_start();

    require_once 'lib/databases/Connection.php';
    require_once 'mvc/model/User.php';
    require_once 'mvc/model/Comentario.php';
    require_once 'mvc/model/Produto.php';
    require_once 'mvc/model/Postagem.php';
    require_once 'mvc/core/Core.php';
    require_once 'mvc/controller/PostController.php';
    require_once 'mvc/controller/ProdutosController.php';
    require_once 'mvc/controller/CadpostController.php';
    require_once 'mvc/controller/CadusrController.php';
    require_once 'mvc/controller/HomeController.php';
    require_once 'mvc/controller/LoginController.php';
    require_once 'mvc/controller/CadprodController.php';
    require_once 'mvc/controller/ControleusrController.php';
    require_once 'mvc/controller/GerencprodController.php';
    require_once 'mvc/controller/GerencpostController.php';

    require_once 'vendor/autoload.php';

    $core = new Core;

    if(isset($_SESSION['id'])){

        $template = file_get_contents('mvc/template/estrutura.html');
        $template = str_replace('{{nome}}', $_SESSION['nome'], $template);
        ob_start();    
            $core->start($_GET);

            $saida = ob_get_contents();
        ob_end_clean();

    $tpl = str_replace('{{conteudo_aqui}}', $saida, $template);

    echo $tpl;

    }else{

        $core->start($_GET);

    }

    
?>