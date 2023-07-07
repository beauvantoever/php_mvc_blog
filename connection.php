<?php
    class Db {
        private static $instance = null;
        private function __construct() {}
        private function __clone() {}
        public static function getInstance() {
            if (!isset(self::$instance)) {
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                try {
                    self::$instance = new PDO('mysql:host=localhost;dbname=php_mvc', 'root', 'root', $pdo_options);
                } catch (PDOException $e) {
                    die("Database connection error: " . $e->getMessage());
                }
            }
            return self::$instance;
        }
        
    }
?>
