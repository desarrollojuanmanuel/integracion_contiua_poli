<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'config.php';

/**
 * Description of PDOext
 *
 * @author jgutierrez
 */
class PDOext {

    /**
     *
     * @var type PDOext
     */
    private $_pdo;
    private static $_instance;

    /**
     * 
     */
    private function __construct() {
        try {
            $config = Config::getDbConfig();
            $this->_pdo = new PDO($config['dsn'], $config['user'], $config['password'], array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_EMULATE_PREPARES => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
            ));
        } catch (PDOException $e) {
            $this->_e = $e;
            $this->errorConexion();
        }
    }

    /**
     * Implementacion patron Singleton
     * @return PDOExt
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Inicia una transaccion.
     * @return boolean
     */
    public function beginTransaction() {
        return $this->_pdo->beginTransaction();
    }

    /**
     * Cancela los cambios. 
     * @return boolean
     */
    public function rollback() {
        return $this->_pdo->rollBack();
    }

    /**
     * Confirma una transacci?n.
     * @return boolean
     */
    public function commit() {
        return $this->_pdo->commit();
    }

    /**
     * Entrecomilla el string de entrada
     * @param string $string
     * @param int $parameter_type
     * @return string | boolean (FALSE) en caso de que el driver no lo soporte 
     */
    public function quote($string, $parameter_type = PDO::PARAM_STR) {
        return $this->_pdo->quote($string, $parameter_type);
    }

    /**
     * Ejecuta una sentencia SQL.
     * @param type $statement
     * @return \PDOStatement  Retorna FALSE en caso de error
     */
    public function query($statement) {
        return $this->_pdo->query($statement);
    }

    /**
     * Establece el valor de un atributo PDO
     * @param int $attribute
     * @param mixed $value
     * @return boolean
     */
    public function setAttribute($attribute, $value) {
        return $this->_pdo->setAttribute($attribute, $value);
    }

    /**
     * Devuelve un array con los controladores disponibles para PDO
     * @return array
     */
    public function getAvailableDrivers() {
        return $this->_pdo->getAvailableDrivers();
    }

    /**
     * Devuelve el codigo del ultimo error
     * @return mixed
     */
    public function errorCode() {
        return $this->_pdo->errorCode();
    }

    /**
     * Devuelve un arreglo con la informacion de error.
     * @return array
     */
    public function errorInfo() {
        return $this->_pdo->errorInfo();
    }

    /**
     * Devuelve el ultimo ID insertado.
     * @param string $name
     * @return int
     */
    public function lastInsertId($name = null) {
        return $this->_pdo->lastInsertId($name);
    }

    /**
     * Indica si se encuentra en una transaccion.
     * @return boolean
     */
    public function inTransaction() {
        return $this->_pdo->inTransaction();
    }

    /**
     * Obtiene un atributo de la conexion a la base de datos.  
     * @param int $attribute
     * @return mixed
     */
    public function getAttribute($attribute) {
        return $this->_pdo->getAttribute($attribute);
    }

    /**
     * Devuelve el n?mero de filas afectadas o falso en caso de error, (Evaluar con ===)
     * @param mixed $statement
     * @return boolean | int
     */
    public function exec($statement) {
        return $this->_pdo->exec($statement);
    }

    /**
     * Prepara una sentencia para su ejecuci?n
     * @param string $statement
     * @param array $driver_options
     * @return \PDOStatement
     */
    public function prepare($statement, array $driver_options = array()) {
        return $this->_pdo->prepare($statement, $driver_options);
    }

    /**
     * Devuelve un string con la informaci?n del error
     * @return string
     */
    public function error() {
        return implode(PHP_EOL, (array) $this->_pdo->errorInfo());
    }

    /**
     * 
     */
    private function errorConexion() {
        $error = array(
            utf8_encode("Código de error") => $this->_e->getCode(),
            utf8_encode("Error de conexión en la línea") => $this->_e->getLine(),
            utf8_encode("Localización del error") => $this->_e->getFile(),
            utf8_encode("Mensaje de error") => $this->_e->getMessage()
        );
        var_dump($error);
    }

}
