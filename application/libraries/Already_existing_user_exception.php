<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Already_existing_user_exception extends Exception
{
    public function __construct() {
        parent::__construct("Este email se encuentra registrado en nuestra base de datos, por favor intente con otro diferente.");
    }
}

?>
