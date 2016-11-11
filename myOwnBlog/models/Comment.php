<?php

/**
 * Created by PhpStorm.
 * User: ghettogeek
 * Date: 26.10.16
 * Time: 14:55
 */
include 'Model.php';

class Comment extends Model
{
    protected $comment_id;
    protected $comment_text;
    protected $owner_id;
    protected $article_id;
    protected $name;



    static function getAll()
    {
            self::getConnetcion()->fetchAll(
                "SELECT c.comment_id, c.comment_text, c.owner_id, c.article_id, u.name
                FROM devBlog.comments c
                INNER JOIN devBlog.users u ON c.owner_id = u.user_id;"
            );
    }

    static function getById($id)
    {
         self::getConnetcion()->fetchObject(
             "SELECT c.comment_id, c.comment_text, c.owner_id, c.article_id, u.name
              FROM devBlog.comments c
              INNER JOIN devBlog.users u ON c.owner_id = u.user_id
              WHERE c.comment_id = $id;", Comment::class
         );
    }

    static function create()
    {
        self::getConnetcion()->query(
            "INSERT INTO devBlog.comments (comment_text, owner_id, article_id)
            VALUE (\"бла бла бла \",2,3);"
        );
    }

    static function update($id)
    {
        self::getConnetcion()->query(
        "UPDATE devBlog.comments SET  comment_text = \"оч.круто!\"
        WHERE comment_id = 2;"
        );
    }

    static function delete($id)
    {
        self::getConnetcion()->query(
            "DELETE FROM devBlog.comments 
            WHERE comment_id = $id; "
        );
    }


}