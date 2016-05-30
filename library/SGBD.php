<?php
    /*error_reporting(E_PARSE);*/
    
    /*Servidor*/
    define("HOST", 'localhost');
    /*Base de datos*/
    define("DB", 'prueba');
    /*Nombre del usuario*/
    define("USER", "root");
    /*Contraseña*/
    define("PASS", "");
    

    
    
    class SGBD {
        public static function sql($query){
            $mysqli = new mysqli(HOST, USER, PASS, DB);
            if ($mysqli->connect_errno) {
                echo "Error: Fallo al conectarse a MySQL debido a:";
                echo "<strong> ".$mysqli->connect_error."</strong>";
                exit();
            }else{
                $mysqli->autocommit(FALSE);
                $mysqli->begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
                if(!$con = $mysqli->query($query)){
                    echo 'Error de sintaxis en la consulta solicitada';
                    $mysqli->rollback();  
                }else{
                    $mysqli->commit();
                }
                return $con;
            }
            $mysqli->close();
        }

        /*Funcion para insertar datos*/
        public static function Insert($tabla, $campos, $valores) {
            if (!$consul = SGBD::sql("INSERT INTO $tabla ($campos) VALUES($valores)")) {
                echo "Ha ocurrido un error al tratar de guardar los datos";
            }
            return $consul;
        }

        /*Funcion para eliminar datos*/
        public static function Delete($tabla, $condicion) {
            if (!$consul = SGBD::sql("DELETE FROM $tabla WHERE $condicion")) {
                echo "Ha ocurrido un error al tratar de eliminar los datos";
            }
            return $consul;
        }

        /*Funcion para actualizar datos*/
        public static function Update($tabla, $campos, $condicion) {
            if (!$consul = SGBD::sql("UPDATE $tabla SET $campos WHERE $condicion")) {
                echo "Ha ocurrido un error al tratar de actualizar los datos";
            }
            return $consul;
        }

        /*Funcion para limpiar cadenas de texto evitando inyeccion SQL*/
        public static function CleanString($data) {
            $data = addslashes($data);
            /*Lista de palabras y caracteres a limpiar*/
            $data = str_ireplace("<script>", "", $data);
            $data = str_ireplace("</script>", "", $data);
            $data = str_ireplace("DROP", "", $data);
            $data = str_ireplace("UPDATE", "", $data);
            $data = str_ireplace("DELETE", "", $data);
            $data = str_ireplace("SELECT", "", $data);
            $data = str_ireplace("FROM", "", $data);
            $data = str_ireplace("--", "", $data);
            $data = str_ireplace("^", "", $data);
            $data = str_ireplace("[", "", $data);
            $data = str_ireplace("]", "", $data);
            $data = str_ireplace("\\", "", $data);
            $data = str_ireplace("=", "", $data);
            return $data;
        }
    }