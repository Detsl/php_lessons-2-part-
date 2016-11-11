<?php

/**
 * Created by PhpStorm.
 * User: ghettogeek
 * Date: 26.10.16
 * Time: 14:30
 * Класс Model сделать абстрактным, убрать из него методы подключения к базе, делегировав подключение классу Db, через метод getConnection или конструктор.
Описать абстрактные методы:
getAll, create, update, delete без параметров
и метод getById с параметром id. Методы getAll и getById ПОКА оставляем в контексте ОБЪЕКТА.

 */




abstract class Model  {

    protected static $conn;

    /**
     * @return Db
     */
    public static function  getConnetcion()
    {
        if (is_null(self::$conn)){
            self::$conn = Db::getInstance();

        }

        return  self::$conn;
    }

    abstract static function getAll();

    abstract static function getById($id);

    abstract static function create();

    abstract static function update($id);

    abstract static function delete($id);

}
