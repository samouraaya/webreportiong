<?php

class Database6
{
    private static $cont  = null;
	
	    public function __construct() {
        die('Init function is not allowed');
    }
  public static function connect()
  {
  try {
	  self::$cont = new PDO ("odbc:MSSQL", "extractor", "advans");
	 
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
/*
	Connexion à la base de données SYBASE 
*/
class Database
{
    private static $cont  = null;
	
	    public function __construct() {
        die('Init function is not allowed');
    }
  public static function connect()
  {
  try {
	  self::$cont = new PDO ('odbc:MSSQL', 'extractor', 'advans');
	 
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
/*
	Connexion à la base de données SYBASE 
*/
class test
{
    private static $cont  = null;
	
	    public function __construct() {
        die('Init function is not allowed');
    }
  public static function connect()
  {
  try {
	  self::$cont = new PDO ("odbc:test", "syahyaoui", "@dvans2014");
	 
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
/*
	Connexion à la base de données MYSQL de Webreporting
*/
class Database1
{
    private static $dbName = 'webreporting' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '2015@dvans';
     
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
class Database2
{
    private static $dbName = 'budget' ;
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
/*
	Connexion à la base de données MYSQL CRM 
*/
class Database3
{
    private static $dbName = 'vtigercrmtunisia' ;
    private static $dbHost = '10.80.1.35' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '2015@dvans';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
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

class visite_suivi
{
    private static $dbName = 'impaye' ;
    private static $dbHost = '10.80.1.24' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '2015@dvans';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
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
class gde_formation 
{
    private static $dbName = 'gde_formation' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '2015@dvans';
     
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



