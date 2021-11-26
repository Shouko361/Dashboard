<?php

    use lib\databases\Connection;


    class Comentario {

            public static function selecionarComentarios($idPost){

                $con = Connection::getConn();

                $sql = "SELECT * FROM comentario WHERE id_post = :id";
                $sql = $con->prepare($sql);
                $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
                $sql->execute();

                $resultado = array();

                while ($row = $sql->fetchObject('Comentario')) {
                    $resultado[] = $row;
                }

                return $resultado;
            }

            public static function inserir($reqPost){

                $con = Connection::getConn();

                $sql = "INSERT INTO comentario (nome, comentario, id_post) VALUES (:nom, :msg, :idp)";
                $sql = $con->prepare($sql);
                $sql->bindValue(':nom', $reqPost['nome']);
                $sql->bindValue(':msg', $reqPost['comentario']);
                $sql->bindValue(':idp', $reqPost['id']);
                $sql->execute();

                if ($sql->rowCount()) {
                    return true;
                }

                throw new Exception("Falha na inserção");
            }
        }

?>