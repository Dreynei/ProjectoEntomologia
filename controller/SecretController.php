<?php

class SecretController {
    public function __construct() {
        $this->view=new View();
    } // constructor
    
    public function mostrar() {
        $this->view->show("secretView.php", null);
    } // mostrar
}
