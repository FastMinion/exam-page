<?php

function GetPage()
{
    $page = "home";
    
    if(isset($_GET['page']))
    { 
        $page = $_GET['page']; 
    }
    return $page;
}

function GetPost() {
    $article = 0;
    
    if(isset($_GET['read'])) { 
        $article = $_GET['read']; 
    }
   
    return $article;
}


function GetCategory() {
    $category = 0;

    if(isset($_GET['category']))
    { 
        $category = $_GET['category']; 
    }
    return $category;
    
}