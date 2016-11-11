<?php
/**
 * Created by PhpStorm.
 * User: ghettogeek
 * Date: 18.10.16
 * Time: 14:44
 */
header('Content-type: text/html; charset=utf-8');
include 'services/Autoloader.php';
spl_autoload_register([new Autoloader(), 'getClass']);






$article = new Article();



$all = $article->getById(4);

var_dump($all);



