<?php

    use lib\databases\Connection;

    Class Postagem{

        public static function selecionaTodos(){

            $con = Connection::getConn();

            $sql = "SELECT * FROM postagens ORDER BY id_post";
            $query = $con->prepare($sql);
            $query->execute();

            $result = array();

            while ($row = $query->fetchObject('Postagem')){

                $result[] = $row;

            }

            if(!$result){

                throw new Exception("Não foi encontrado nenhum registro em nosso banco de dados!");

            }

            return $result;

        }

        public static function selecionaPorId($idPost){

            $con = Connection::getConn();

            $sql = "SELECT * FROM postagens WHERE id_post = :id";
            $query = $con->prepare($sql);
            $query->bindValue(':id', $idPost, PDO::PARAM_INT);
            $query->execute();

            $resultado = $query->fetchObject('Postagem');

            if(!$resultado){

                throw new Exception("Não foi encontrado nenhum registro em nosso banco de dados!! Por favor tente mais tarde!");

            }
            else{

				$resultado->comentario = Comentario::selecionarComentarios($resultado->id_post);
            
            }
            return $resultado;

        }

        public static function insert($dadosPost){

            if(empty($dadosPost['titulo']) OR empty($dadosPost['conteudo'])){

                throw new Exception("Preencha todos os campos");
                return false;

            }

            $con = Connection::getConn();
            $sql = "INSERT INTO postagens (titulo, conteudo) VALUES (:titulo, :conteudo)";
            $sql = $con->prepare($sql);
            $sql->bindValue(':titulo', $dadosPost['titulo']);
            $sql->bindValue(':conteudo', $dadosPost['conteudo']);
            $res = $sql->execute();
            
            if($res == 0){

                throw new Exception("Falha ao inserir no banco de dados");
                return false;

            }

            return true;

        }

    }

?>