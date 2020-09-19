<?php


class Connectiom{

    public static $instance;

    function getConnection(){

        if(!isset(self::$instance)){

            self::$instance = new PDO("mysql:host=localhost;dbname=crud", "root", "", 
            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        return self::$instance;
    }
}