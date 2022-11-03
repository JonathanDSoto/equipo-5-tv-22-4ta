<?php
    session_start();

    if(!isset($_SESSION['super_token'])){
        $_SESSION['super_token'] = 
        md5( uniqid(mt_rand(), true) );
    }

    //Recuerden cambiar el BASE_PATH a como lo necesiten
    if(!defined('BASE_PATH')){
        define('BASE_PATH', 'http://localhost/');
    }
