<?php

session_start();

/**
 * Класс для авторизации
 */
class auth
{
    // TODO: Нормальная выборка из БД
    private  $_login = "demo";
    private $_password = "password";

    public  function  isAuth()
    {
        if (isset($_SESSION["is_auth"]))
        {
            return $_SESSION["is_auth"];
        }
        else return false;
    }

    public  function auth($login,$password)
    {
        if ($login == $this->_login && $password == $this->_password) {
            $_SESSION["is_auth"] = true;
            $_SESSION["login"] = $login;
            return true;
        }
        else {
            $_SESSION["is_auth"] = false;
            return false;
            }
    }

    public  function  getLogin()
    {
        if ($this->isAuth())
        {
            return $_SESSION["login"];
        }
    }

    public  function  out()
    {
        $_SESSION = array();
        session_destroy();
    }

}