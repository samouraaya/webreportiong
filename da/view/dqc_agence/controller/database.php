<?php

class Database
{
    private static $cont  = null;
	
	    public function __construct() {
        die('Init function is not allowed');
    }
  public static function connect()
  {
  try {
	  self::$cont = new PDO('odbc:ADVTUN', 'sa', 'neptune');
	 
  } catch (PDOException $e) {
	  die( 'Query failed: ' . $e->getMessage() );
  }
  return self::$cont;
  }
   public static function disconnect()
    {
        self::$cont = null;
    }
}


class Database1
{
    private static $dbName = 'repwizweb' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = 'My$ql0';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
    
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}

?>



