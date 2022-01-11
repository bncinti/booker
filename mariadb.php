 <?php

 include_once('config.php');

 class Mariadb{
    public static function connectDb(){
        global $db;
        $conn = new mysqli(
            $db['host'],
            $db['user'],
            $db['pass'],
            $db['name']
        );
        if ($conn->connect_error) {
            error_log('Hiba! A kapcsolódás sikertelen.');
        }
        $conn->set_charset('utf-8');
        return $conn;
    }
 }