<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'cofig.inc';
/**
 * Description of index
 *
 * @author Juan M. Gutierrez
 */
abstract class ClassIndex {

    static function load() {
        $work =  $GLOBALS['work'];
        header("Location: http://localhost:8080/$work/modulos/admin/index.php?action=login");
    }

}

ClassIndex::load();
