<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 12.05.2017
 * Time: 9:59
 */
class ParrentClass
{
    public  function  console()
    {
        echo "Im parent";
    }
}

class  ChildClass extends ParrentClass
{
    public function useParrentClass()
    {
        $this->console(); // Вызвали метод родительского класса
    }
}