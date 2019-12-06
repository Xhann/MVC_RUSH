<?php

namespace WebFramework;

use Exception;
use \PDO;

class ORM {

  private $db;
  private $objectInPersistance = [];

  private $persistArray=[];

  private static $instance = null;

  /**
   * Private constructor so nobody else can instantiate it.
   */
  private function __construct()
  {
  }

  /**
   * Retrieve the static instance of the ORM.
   *
   * @return ORM - Instance of the ORM
   */
  public static function getInstance()
  {
      if (is_null(self::$instance)) {
          self::$instance = new ORM();
      }

      return self::$instance;
  }

  /**
   * Connect to a database.
   *
   * @param array $config - Database configuration
   * @return PDO - Instance of PDO used to interact with the connected DB.
   */
  public function connect(array $config)
  {
    try {
      $this->db = new PDO(
        "{$config['driver']}:host={$config['host']};dbname={$config['dbname']}",
        $config['username'],
        $config['password'],
        $config['options']
      );

      return $this->db;
    }
    catch (Exception $e) {
      echo $e->getMessage();
    }
  }




  /**
   * Make a model instance managed by the ORM.
   *
   * @param Model $object - Object that will be persisted.
   */
  public function persist($object)
  {
    //var_dump($object);
    $this->persistArray[]=$object;
    // TODO: Implement this function

  }

  /**
   * Synchronize each managed models with the database.
   */
  public function flush()
  {
    foreach ($this->persistArray as $object)
    {

    $sql = "INSERT INTO users (username, password, email, privileges, status, creation_date, modification_date) VALUES (:username, :password, :email, :privileges, :status, :creation_date, :modification_date)";                     
    $stmt = $this->db->prepare($sql);

   // var_dump($object->getUsername(),$object->getPassword(),$object->getEmail(),$object->getPriv(),$object->getStatus(),$object->getCreationDate()->format('Y-m-d H:i:s'),$object->getModificationDate()->format('Y-m-d H:i:s'));                             
    $stmt->bindValue(':username', $object->getUsername(),PDO::PARAM_STR);
    $stmt->bindValue(':password', password_hash($object->getPassword(),PASSWORD_DEFAULT),PDO::PARAM_STR); 
    $stmt->bindValue(':email', $object->getEmail(),PDO::PARAM_STR);       
    $stmt->bindValue(':privileges', $object->getPrivileges(),PDO::PARAM_STR);
    $stmt->bindValue(':status', $object->getStatus(),PDO::PARAM_STR);
    $stmt->bindValue(':creation_date', $object->getCreationDate()->format('Y-m-d H:i:s'),PDO::PARAM_STR);
    $stmt->bindValue(':modification_date', $object->getModificationDate()->format('Y-m-d H:i:s'),PDO::PARAM_STR);

    $stmt->execute();

    }
    
    // IF UPDATE
    // TODO: Implement this function
  }

  public static function checkEmailDuplicates($email)
  {
      $orm=ORM::getInstance();
      $stmt=$orm->db->prepare("SELECT * FROM users WHERE email= ?");
      $stmt->bindParam(1, $email, PDO::PARAM_STR);
      $stmt->execute();
      $duplicate=$stmt->fetch();
      return $duplicate;
  }
  public static function checkUser($username,$password)
  {
      
      $orm=ORM::getInstance();
      $stmt=$orm->db->prepare("SELECT password FROM users WHERE username= ?");
      $stmt->bindParam(1, $username, PDO::PARAM_STR);
      $stmt->execute();
      $hash=$stmt->fetch();
      return password_verify($password,$hash[0]);
  }

  public static function getUserByUsername($username)
  {
      $orm=ORM::getInstance();
      $stmt=$orm->db->prepare("SELECT * FROM users WHERE username= ?");
      $stmt->bindParam(1, $username, PDO::PARAM_STR);
      $stmt->execute();
      $result=$stmt->fetch(PDO::FETCH_ASSOC);
      return $result;

  }
}
