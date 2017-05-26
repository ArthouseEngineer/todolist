<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 12.05.2017
 * Time: 8:57
 */
 class User
{
   private $name;
   private $email;
   // Dependency injection

   public function setEmail($email)
   {
       $this->email = trim($email); // Удаляет пробелы с начала и конца строки
   }

   public  function setName($name)
   {
       $this->name = trim($name);
   }

   public  function __construct($name,$email)
   {
       $this->setName($name);
       $this->setEmail($email);
   }

   public  static  function  isValidEmail($email)
   {
       return filter_var($email,FILTER_VALIDATE_EMAIL);
   }

 }