<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Validation_not_passed_exception extends Exception
{
    public function __construct() {
        parent::__construct(validation_errors());
    }
}

?>
