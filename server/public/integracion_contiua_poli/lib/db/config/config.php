<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of config
 *
 * @author jgutierrez
 */
final class Config {

    /**
     * Devuelve la configuraci?n del Servidor de bases de datos
     * @return array
     */
    public static function getDbConfig() {
        $ini = parse_ini_file('config.ini', true);
        return $ini['mysql'];
        if (array_key_exists('default_db', $ini)) {
            if (!is_null($ini['default_db']['server'])) {
                $server = $ini['default_db']['server'];
                if (!is_null($server)) {
                    return $ini[$server];
                }
            }
        }
        throw new Exception("No se ha configurado el servidor de bases "
        . "de datos por defecto o la configuraci?n del servidor es "
        . "incorrecta");
    }

}
