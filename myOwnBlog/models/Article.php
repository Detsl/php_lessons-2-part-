<?php

/**
 * Created by PhpStorm.
 * User: ghettogeek
 * Date: 26.10.16
 * Time: 14:45
 * Сделать модели Article, comments, users, roles, tags. Унаследовать их от класса Model. В кадом классе реализовать
 * абстрактные методы, описанные в модели. Учесть, что например, статьи мы должны получать с комментариями и тэгами.
 */

class Article extends Model
{
    public $article_id;
    public $header;
    public $content;
    public $owner;
    public $date;
    public $login;
    public $name;



    public static function getAll()
    {

        return self::getConnetcion()->fetchAll
        (
            "SELECT a.article_id, a.content, a.header, a.owner, a.date, users.name, users.login
            FROM devBlog.Articles a
            INNER JOIN devBlog.users ON a.owner = users.user_id;"
        );
    }

    /*
     *
     */
    public static function getById($id)
    {

        return self::getConnetcion()->fetchObject
        (
            "SELECT a.article_id, a.content, a.header, a.owner, a.date, users.name, users.login
            FROM devBlog.Articles a
            INNER JOIN devBlog.users ON a.owner = users.user_id
            WHERE a.article_id = $id;", Article::class

        );

    }


     public static function create(){

          return self::getConnetcion()->query
          (
              "INSERT INTO Articles (header, content, owner) 
              VALUE ('Some new text',\"a lot of new things\",2);"
          );
     }

     public static function update($id){

         return self::getConnetcion()->query(
             "UPDATE Articles SET header=\"xxx\", content=\"some text\", owner =\"1\"
             WHERE article_id = $id;"
         );

     }

     public static function delete($id){

         return self::getConnetcion()->query(
             "DELETE FROM devBlog.Articles WHERE article_id = $id;"
         );

     }
}
