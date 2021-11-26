<?php

    namespace lib\databases;

    abstract Class Connection{

        private static $con;

        public static function getConn(){

            if(!self::$con){
                self::$con = new \PDO('mysql: host=localhost; dbname=sb_login', 'root', 'qwe123@@');
            }

            return self::$con;
        }
    }

?>