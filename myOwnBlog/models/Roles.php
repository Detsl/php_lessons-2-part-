<?php

/**
 * Created by PhpStorm.
 * User: ghettogeek
 * Date: 08.11.16
 * Time: 14:21
 */
class Roles extends Model
{
    protected $id_role;
    protected $name_role;

    static function getAll()
    {
        self::getConnetcion()->fetchAll(
            "SELECT r.id_role, r.name_role 
              FROM devBlog.roles r;"
        );
    }

    static function getById($id)
    {
        self::getConnetcion()->fetchObject(
            "SELECT r.id_role, r.name_role
            FROM devBlog.roles r
            WHERE id_role = $id;"
        );
    }

    static function create()
    {
        self::getConnetcion()->query(
            "INSERT INTO devBlog.roles (id_role, name_role) 
            VALUE (4,\"someman\");"
        );
    }

    static function update($id)
    {
        self::getConnetcion()->query(
            "UPDATE devBlog.roles SET name_role = \"superman\"
              WHERE  id_role = $id;"
        );
    }

    static function delete($id)
    {
        self::getConnetcion()->query(
            "DELETE FROM devblog.roles 
            WHERE id_role = $id"
        );
    }

}