<?php namespace App\Models;

use App\Config\dbconn;
use PDO;
use PDOException;

class MysqlModel extends dbconn
{
    
    protected static $tabla = 'dual';
    protected static $id = 0;
    
    public static function findAll()
    {
        $consulta = "SELECT * FROM " . static::$tabla;
        return self::select($consulta);
    }

    public static function findOne($key = 0)
    {
        $consulta = "SELECT * FROM " . static::$tabla . " where " . static::$id . "='$key'";
        return self::select($consulta);
    }

    public static function delete($key = 0)
    {
        $consulta = "DELETE FROM " . static::$tabla . " where " . static::$id . "='$key'";
        return self::del($consulta);
    }

    public static function new($cols, $vals)
    {
        $consulta = "INSERT INTO " . static::$tabla . " ( $cols ) VALUES  ( $vals )"  ;
        return self::insert($consulta);
    }
    public static function put($colsval,$key = 0)
    {
        $consulta = "UPDATE " . static::$tabla . " SET  $colsval  WHERE ". static::$id . "='$key'"  ;
        return self::update($consulta);
    }
    private static function select($query_sql)
    {
        $filas = null;
        try {
            $aux = new dbconn;
            $stmt  = $aux->pdo->prepare($query_sql);
            $r = $stmt ->execute();
            $r = $stmt->fetchAll(PDO::FETCH_OBJ);
            $filas = $r;            
            $aux = null;

            if(! empty($r)) {
                 $response = $filas;
    
            } else {
                $response = array('message' => "No records found!");               
            }            

        } catch (PDOException $e) {
            $response= array('message' => $e->getMessage()); 
        }
            return $response;
    }

    private static function del($query_sql){
        try {
            $aux = new dbconn;
            $stmt  = $aux->pdo->prepare($query_sql);
            $stmt ->execute();         
            $response = "Record deleted successfully";

        } catch (PDOException $e) {
            $response = $response= array('message' => $e->getMessage()); 
        }
            return $response;
    }

    private static function insert($query_sql){
        try {
            $aux = new dbconn;
            $stmt  = $aux->pdo->prepare($query_sql);
            $stmt ->execute();         
            $resp = "Insert successfully";

        } catch (PDOException $e) {
            $resp ="Error: " . $e->getMessage();
             
        }
        return $resp;
    }
    private static function update($query_sql){
        try {
            $aux = new dbconn;
            $stmt  = $aux->pdo->prepare($query_sql);
            $stmt ->execute();         
            $resp = "update successfully";

        } catch (PDOException $e) {
            $resp ="Error: " . $e->getMessage();
             
        }
        return $resp;
    }
    
}
