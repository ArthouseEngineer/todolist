<?php

/**
 * Class User
 */
class User
{

    // Дескриптор подключения к БД
    private $db;
    /**
     * User constructor.
     * @param $dbh - Work with database descriptor.
     */
    function __construct($dbh)
    {
        $this->db = $dbh;
    }

    /**
     * Method for registering a user using password hashing
     */
    public function register($uname, $umail, $upass)
    {
        try {

            $new_password = password_hash($upass, PASSWORD_DEFAULT);

            $stmt = $this->db->prepare("INSERT INTO users(name,email,password) VALUES(:uname, :umail, :upass)");

            // In order not to use bindparam, we pass parameters to the prepared query as an array at execution time
            $stmt->execute(array(":uname" => $uname, ":umail" => $umail, ":upass" => $new_password));
            return $stmt;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    /**
     * Method to authorization user
     */
    public function login($uname, $upass)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE name = :uname");
            $stmt->bindparam("uname", $uname);
            $stmt->execute();
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                if (password_verify($upass, $userRow['password'])) {
                    $_SESSION['user_session'] = $userRow['id'];
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function is_loggedin()
    {
        if (isset($_SESSION['user_session'])) {
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