<?php
$webdir = "system/web/web-template/";
include "system/web/page.php";
include "system/database.php";
include "system/web/request.php";
include 'system/model.php';



PageBegin();

$page = GetPage();

if($page == "home"){
    require_once $webdir.'home.php';
}
else if($page == "news"){
    require_once $webdir.'news.php';
} 
if($page == "ifjnev"){
    require_once $webdir.'ifjnev.php';
}
if($page == "gallery"){
    require_once $webdir.'gallery.php';
}
if($page == "contact"){
    require_once $webdir.'contact.php';
}
else{
    if($page != "news" && $page!="gallery" && $page!="contact" && $page!="ifjnev" && $page!="home"){
        require_once $webdir.'404.php';
    }

}

PageEnd();