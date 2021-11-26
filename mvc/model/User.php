<?php

    use lib\databases\Connection;

    Class User{

        private $id;
        private $name_usr;
        private $email_usr;
        private $password;

        public function validateUser(){

            $con = Connection::getConn();

            $query = 'SELECT * FROM usr WHERE email_usr = :email';
            $sql = $con->prepare($query);
            $sql->bindValue(':email', $this->email_usr);
            $sql->execute();

            if($sql->rowCount()){

                $result = $sql->fetch();

                if(password_verify($this->password, $result['senha'])){

                    $_SESSION['id'] = $result['id'];
                    $_SESSION['nome'] = $result['nome_usr'];
                    return true;

                }

            }

            throw new Exception("Email ou Senha Incorretos!");
            
        }

        public function setEmail($email){
            $this->email_usr = $email;
        }

        public function setNome($nome){
            $this->name_usr = $nome;
        }

        public function setSenha($password){
            $this->password = $password;
        }

        public function getEmail(){
            return $this->email_usr;
        }

        public function getNome(){
            return $this->name_usr;
        }

        public function getSenha(){
            return $this->password;
        }

        public static function insert($dadosPost){

            if(empty($dadosPost['nome']) OR empty($dadosPost['email'] OR empty($dadosPost['senha']))){

                throw new Exception("Preencha todos os campos");
                return false;

            }

            $con = Connection::getConn();
            $sql = "INSERT INTO usr (nome_usr, email_usr, senha) VALUES (:n, :m, :s)";
            $sql = $con->prepare($sql);
            $sql->bindValue(':n', $dadosPost['nome']);
            $sql->bindValue(':m', $dadosPost['email']);
            $sql->bindValue(':s', password_hash($dadosPost['senha'], PASSWORD_DEFAULT));

            $res = $sql->execute();
            
            if($res == 0){

                throw new Exception("Falha ao inserir no banco de dados");
                return false;

            }

            return true;
        }

    }
    

?>