<?php

    use lib\databases\Connection;

    Class Produto{

        public static function selecionaTodos(){

            $con = Connection::getConn();

            $sql = "SELECT * FROM produtos ORDER BY id";
            $query = $con->prepare($sql);
            $query->execute();

            $result = array();

            while ($row = $query->fetchObject('Produto')){

                $result[] = $row;

            }

            if(!$result){

                throw new Exception("Não foi encontrado nenhum registro em nosso banco de dados!");

            }

            return $result;

        }

        public static function insert($dadosPost){

            if(empty($dadosPost['nome-produto']) OR empty($dadosPost['descricao'] OR empty($dadosPost['valor']))){

                throw new Exception("Preencha todos os campos");
                return false;

            }

            $con = Connection::getConn();
            $sql = "INSERT INTO produtos (nome, descricao, valor) VALUES (:nome, :descricao, :valor)";
            $sql = $con->prepare($sql);
            $sql->bindValue(':nome', $dadosPost['nome-produto']);
            $sql->bindValue(':descricao', $dadosPost['descricao']);
            $sql->bindValue(':valor', $dadosPost['valor']);
            $res = $sql->execute();
            
            if($res == 0){

                throw new Exception("Falha ao inserir no banco de dados");
                return false;

            }

            return true;

        }

    }

?>