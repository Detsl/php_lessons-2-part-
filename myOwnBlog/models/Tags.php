<?php

/**
 * Created by PhpStorm.
 * User: ghettogeek
 * Date: 08.11.16
 * Time: 16:00
 */
class Tags extends Model
{
    protected $tagId;
    protected $tagName;

    static function getAll()
    {
        self::getConnetcion()->fetchAll(
            "SELECT  t.tag_id, t.tag_name
            FROM devBlog.tags t"

        );
    }

    static function getById($id)
    {
        self::getConnetcion()->fetchObject(
            "SELECT  t.tag_id, t.tag_name
            FROM devBlog.tags t
            WHERE t.tag_id = $id", Tags::class
        );
    }

    static function create()
    {
        self::getConnetcion()->query(
            "INSERT INTO devblog.tags (tag_name)
            VALUE (\"Some not so old old tag \");"
        );
    }

    static function update($id)
    {
        self::getConnetcion()->query(
       "UPDATE devBlog.tags SET tag_name=\"Ha ha ha kak smeshno\"
        WHERE tag_id = $id;");

    }

    static function delete($id)
    {
        self::getConnetcion()->query(
            "DELETE FROM devBlog.tags 
            WHERE tag_id = $id; "
        );
    }


}