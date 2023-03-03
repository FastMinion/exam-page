
<link  rel="stylesheet" href="style.css" type="text/css">

<?php
session_start();

//Szükséges állományok beágyazása
include '../system/database.php';
include 'functions.php';
include 'modules.php';

//

//
echo '<meta charset="utf-8">';
echo '<link rel="stylesheet" href="bootstrap.css">';
echo '<link rel="stylesheet" href="responsive.css" type="text/css">';
//
echo '<script src="ckeditor4/ckeditor.js"></script>';
echo '<script src="jquery.js"></script>';
echo '<script src="bootstrap.js"></script>';
echo '<link rel="stylesheet" href="mobilemenu.css">';
echo '<div class="container>"';

//

    LoginHandler();

if($_SESSION['login'])
{
	NavigationModule();


    if(GetFunc() == "newarticle")
    {
        NewPost();
        NewIfjPost();
        PicUpload();
    }
    elseif(GetFunc() == "articlelist")
    {
        PostList();
        ListIfj();
    }
    elseif(GetFunc() == "editarticle" || GetFunc() == "editifj")
    {
        EditPost();
    }
	echo '<script src="script.js"></script>';
    echo '</div>';
}
else
{
    echo '<div class="login"><center>';
	echo '<div class="text-center" style="max-width: 900px; ">';
	echo '<p class="alert alert-warning">Bejelentkezés szükséges</p>';

	echo '<form method="post" action="index.php">';
	CreateInput("Felhasználónév", "user");
	CreateInput("Jelszó", "pass", "password");
	echo '<button name="loginSend" class="btn btn-primary">Belépés</button>';
	echo '</form>';
	echo '</div>';
    echo '</center></div>';
}

