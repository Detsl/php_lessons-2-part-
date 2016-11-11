<?php

/**
 * Created by PhpStorm.
 * User: ghettogeek
 * Date: 08.11.16
 * Time: 14:21
 */
class Users extends Model
{
    protected $userId;
    protected $userLogin;
    protected $userPass;
    protected $userName;
    protected $roleId;
    protected $userRegDate;

    static function getAll()
    {
        self::getConnetcion()->fetchAll
        ("SELECT u.user_id, u.login, u.password, u.name, u.reg_date, u.role_id, r.name_role
          FROM devBlog.users u
          INNER JOIN devBlog.roles r ON u.role_id = r.id_role;"
        );
    }

    static function getById($id)
    {
        self::getConnetcion()->fetchAll(
            "SELECT u.user_id, u.login, u.password, u.name, u.reg_date, u.role_id, r.name_role
          FROM devBlog.users u
          INNER JOIN devBlog.roles r ON u.role_id = r.id_role
          WHERE user_id = $id;"
        );
    }

    static function create()
    {
        self::getConnetcion()->query(
            "INSERT INTO devBlog.users (login, password, name, role_id)
              VALUE (\"Some new login\", \"1234\", \"Annet\", 1);"
        );
    }

    static function update($id)
    {
        self::getConnetcion()->query(
            "UPDATE devBlog.users SET name=\"xxx\", password=\"12345\"
            WHERE user_id = 5;"

        );
    }

    static function delete($id)
    {
        self::getConnetcion()->query(
        "DELETE FROM devBlog.users WHERE user_id = $id;"
        );
    }


}