<?php

/**
 * Created by PhpStorm.
 * User: ghettogeek
 * Date: 06.11.16
 * Time: 13:57
 * реализуем в интерфейсе метод подключения к базе данных
 */
interface IDbAccess
{

    public function getConnection();

}