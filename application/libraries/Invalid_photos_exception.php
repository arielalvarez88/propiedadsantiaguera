<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class Invalid_photos_exception extends Exception
{
    public function __construct()
    {
        parent::__construct("Se produjo un error al subir sus fotos, asegúrese que sus archivos sean fotos e intentelo denuevo.");
    }
}
?>
