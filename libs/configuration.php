<?php
    require 'libs/Config.php';
    $config=Config::getInstance();
    
    $config->set('controllerFolder', 'controller/');
    $config->set('modelFolder', 'model/');
    $config->set('viewFolder', 'view/');
    
    $config->set('dbhost', 'localhost');
    $config->set('dbname', 'db_entomologia');
    $config->set('dbuser', 'root');
    $config->set('dbpass', '');
    
?>
