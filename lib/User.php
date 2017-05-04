<?php

/**
 * Class User
 */

class User {

    // Дескриптор подключения к БД
    private $db;

	function __construct($dbh)
    {
	   $this->db = $dbh;
    }

    /**
     * Метод регистрации пользователя с использованием хеширования пароля
     */
    public function register($uname, $umail, $upass)
    {
	try {

	    $new_password = password_hash($upass, PASSWORD_DEFAULT);

	    $stmt = $this->db->prepare("INSERT INTO users(name,email,password) VALUES(:uname, :umail, :upass)");
	    $stmt->bindparam(":uname", $uname);
	    $stmt->bindparam(":umail", $umail);
	    $stmt->bindparam(":upass", $new_password);
	    $stmt->execute();

	    return $stmt;
	  } catch(PDOException $e) {
	       echo $e->getMessage();
	  }    

  }

    /**
     * Метод авторизации пользователя
     */
    public function login($uname, $umail, $upass)
  {
      try {
          $stmt = $this->db->prapare("SELECT * FROM users WHERE name =:uname OR email=: LIMIT 1");
          $stmt->execute(array(':uname' => $uname, ':umail' => $umail));
          $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
          if ($stmt->rowCount() > 0) {
              if (password_verify($upass, $userRow['password'])) {
                  $_SESSION['user_session'] = $userRow['user_id'];
              } else {
                  return false;
              }
          }
      }
      catch (PDOException $e)
      {
          echo $e->getMessage();
      }
  }

    public function is_loggedin()
    {
	if (isset($_SESSION['user_session'])) 
    {
    	return true;
    }
    }

    public function redirect($url)
    {
	header("location: $url ");
    }

    public function logout()
    {
	 session_destroy();
	 unset($_SESSION['user_session']);
	 return true;
    }
}