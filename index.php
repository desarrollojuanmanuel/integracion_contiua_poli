<?php
      
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author Juan M. Gutierrez
 */
abstract class ClassIndex {

    static function load() {
        header("Location: http://localhost/trabajo/modulos/admin/index.php?action=login");
    }

}

ClassIndex::load();
