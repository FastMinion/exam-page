<?php

function NavigationModule()
{
    echo '<div class="sidecont">';
    echo '<aside class="nav"><span>';
    echo '<section id="name"><h1>Admin <small>felület</small></h1></section>';
    echo AdminNavBarContent("addbox.png","newarticle","Cikk létrehozása");
    echo AdminNavBarContent("List.png","articlelist", "Cikkek megtekintése");
    echo AdminNavBarContent("logout.png","logout", "Kijelentkezés");
    echo'</span><div class="blank"></div></aside></div>';


}

function NewPost()
{
	global $dbPrefix;
	
	if(isset($_POST['sendNew']))
	{
		global $dbPrefix;
		

		$params = $_POST;

		$params['image'] = $_FILES['image']['name'];

		if(!isset($params['status'])){ $params['status'] = 0; }
		else{ $params['status'] = 1; } 
		unset($params['sendNew']);
		
		if($_FILES['image']['name'] && $_FILES['image']['tmp_name'])
		{

			$tempFile = $_FILES['image']['tmp_name'];

			$fileName = $_FILES['image']['name'];

			move_uploaded_file($tempFile, "../media/news/".$fileName);
		}
		
		DbQuery("INSERT INTO ".$dbPrefix."news VALUES (NULL, :category, :title, :intro, :image, :body, :created, :status)", $params);
	}

	PostForm();
}

function PostList()
{

	echo '<div class="block" id="1">';
	echo '<div class="head"><h2>Cikkek listázása</h2><a href="" id="show1"><img class="switch" src="icons/expandmore.png" alt="expand"></a></div>';
	echo '<div class="content" id="hidden1">';
		global $dbPrefix;
		if(isset($_POST['delArticle']))
		{

			DbQuery("DELETE FROM ". $dbPrefix ."news WHERE news_id=:news", ['news' => $_POST['delArticle'] ]);
		}
		$articles = DbQuery("SELECT news_id ,category, cname, title, image, created FROM ". $dbPrefix ."news INNER JOIN ". $dbPrefix ."category ON ". $dbPrefix ."category.category_id = ". $dbPrefix ."news.category ORDER BY created desc" );
		
		echo '<table class="table table-striped table-hover">';
		echo '<thead><tr>';
		echo '<th>Azon.</th><th>Kategória</th><th>Cikk címe</th><th>Kép</th><th>Időpont</th><th> </th><th> </th>';
		echo '</tr></thead>';
		echo '<tbody>';
	

		foreach($articles as $art)
		{

			echo '<tr>';
			echo '<td>'. $art['news_id'] .'</td>';
			echo '<td>'. $art['cname'] .'</td>';
			echo '<td>'. $art['title'] .'</td>';
			
			if(!$art['image'] == ""){
				echo '<td><img src="../media/news/'. $art['image'] .'" style="width:75px"></td>';
			}
			else{
				echo '<td><img src="../media/" style="width:75px"></td>';
			}
			echo '<td>'. $art['created'] .'</td>';
			echo '<td><form method="post"><button class="btn btn-danger" name="delArticle" value="'. $art['news_id'] .'">Törlés</button></form></td>';
			echo '<td><a href="?func=editarticle&news='. $art['news_id'] .'">Szerkesztés</a></td>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
		echo '</div></div>';
}
function EditPost()
{
	if(GetFunc() == "editifj"){

		$id = $_GET['news'];
		echo '<h2>Cikk szerkesztése</h2>';
		
		global $dbPrefix;
		
		if(isset($_POST['sendEdit']))
		{
			$params = $_POST;
			
			if(!isset($params['status'])){ $params['status'] = 0; }
			else{ $params['status'] = 1; }
			$params['ifjid'] = $id;
			unset($params['sendEdit']);
			
			$set = "category=:category, title=:title, intro=:intro, body=:body, created=:created, status=:status";
			
			if($_FILES['image']['name'] && $_FILES['image']['tmp_name'])
			{
				$params['img'] = $_FILES['img']['name'];
				$set = $set . ", img=:image";
				
				$tempFile = $_FILES['image']['tmp_name'];
				$fileName = $_FILES['image']['name'];
				move_uploaded_file($tempFile, "../media/ifjnev/".$fileName);
			}
			
			DbQuery("UPDATE ".$dbPrefix."ifjnev SET ".$set ." WHERE id=:ifjid", $params);
		}
		
		$post = DbQuery("SELECT * FROM ". $dbPrefix ."ifjnev WHERE id =:ifjid", ['ifjid' => $id]);
	
		PostForm($post[0]);

	}
	else{
	$id = $_GET['news'];
	echo '<h2>Cikk szerkesztése</h2>';
	
	global $dbPrefix;
	
	if(isset($_POST['sendEdit']))
	{
		$params = $_POST;
		
		if(!isset($params['status'])){ $params['status'] = 0; }
		else{ $params['status'] = 1; }
		$params['id'] = $id;
		unset($params['sendEdit']);
		
		$set = "category=:category, title=:title, intro=:intro, body=:body, created=:created, status=:status";
		
		if($_FILES['image']['name'] && $_FILES['image']['tmp_name'])
		{
			$params['img'] = $_FILES['img']['name'];
			$set = $set . ", img=:image";
			
			$tempFile = $_FILES['image']['tmp_name'];
			$fileName = $_FILES['image']['name'];
			move_uploaded_file($tempFile, "../media/news/".$fileName);
		}
		
		DbQuery("UPDATE ".$dbPrefix."news SET ".$set ." WHERE news_id=:id", $params);
	}
	
	$post = DbQuery("SELECT * FROM ". $dbPrefix ."news WHERE news_id =:id", ['id' => $id]);

	PostForm($post[0]);
	}
}

function PostForm($post = null)
{

	echo '<div class="block" id="1">';
	echo '<div class="head" id="1"><h2>Cikk létrehozása</h2><a href="" id="show1"><img class="switch" src="icons/expandmore.png" alt="expand"></a></div>';
	echo '<div class="content" id="hidden1">';
	echo '<form method="post" enctype="multipart/form-data">';

	$btnName = "sendEdit";
	$btnText = "Változások mentése";

	if(!$post)
	{ 

		$btnName = "sendNew";
		$btnText = "Létrehozás";

		$post = 
		[
			'category' => 1,
			'title' => null,
			'intro' => null,
			'body' => "",
			'created' => date("Y-m-d H:i:s"),
			'status' => null
		];
	}

	$post['created'] = str_replace(" ", "T", $post['created']);
	CreateSelect("Kategória", "category", GetCategoriesAsArray(), $post['category']);
	CreateInput("Cím", "title", "text", $post['title']);
	CreateInput("Bevezető", "intro", "text", $post['intro']);
	CreateInput("Képfájl", "image", "file");
	echo '<div class="form-group"><textarea name="body" id="body">'. $post['body'] .'</textarea></div>';
	CreateInput("Időpont", "created", "datetime-local", $post['created']);
	CreateInput("Publikus", "status", "checkbox", $post['status']);
	echo '<button class="btn btn-success" name="'. $btnName .'" style="margin-bottom:15px;">'. $btnText .'</button>';
	echo '</form>';
	
	echo '</div></div>';
}
function GetCategoriesAsArray()
{
	global $dbPrefix; 
	$array = [];

	$categories = DbQuery("SELECT * FROM ". $dbPrefix ."category WHERE status=1");

	foreach($categories as $actual)
	{
		$id = $actual['category_id'];
		$name = $actual['cname']; 
		
		$array[ $id ] = $name;
	}
	
	return $array;
}


/*---------------------Kép feltöltés---------------------*/
function PicCatsArray(){
	global $dbPrefix;
	$picarray= [];


	$categories = DbQuery("SELECT * FROM ".$dbPrefix."gallerycat");

		foreach($categories as $actual){
			$id = $actual['gallerycat_id'];
			$name = $actual['gcname'];

			$picarray[$id] = $name;
		}
		return $picarray;
}


function PicUpload(){
	global $dbPrefix;

	if(isset($_POST['upload']))
	{
		global $dbPrefix;
		

		$params = $_POST;

		$params['image'] = $_FILES['image']['name'];

		if(!isset($params['status'])){ $params['status'] = 1; }
		else{ $params['status'] = 1; } 
		unset($params['upload']);

		if($_FILES['image']['name'] && $_FILES['image']['tmp_name'])
		{

			$tempFile = $_FILES['image']['tmp_name'];

			$fileName = $_FILES['image']['name'];

			move_uploaded_file($tempFile, "../media/gallery/".$fileName);
		}
		
		DbQuery("INSERT INTO ".$dbPrefix."gallery VALUES (NULL, :gcategory, :image, :uploaded, :status", $params);}

	PicUploadForm();
}
function PicUploadForm($picpost = null){
	echo '<div class="block" id="3">';
	echo '<div class="head" id="3"><h2>Kép feltöltése</h2><a href="" id="show2"><img class="switch" src="icons/expandmore.png" alt="asd"></a></div>';
	echo '<div class="content" id="hidden2">';

	echo '<form method="post" enctype="multipart/form-data">';

	if(!$picpost){
		$btnName = "upload";
		$btnText = "Feltöltés";

		$picpost =
		[
			'gcategory' => 1,
			'uploaded' => date("Y-m-d H:i:s"),
			'status' => null
		];
	}

	$picpost['uploaded'] = str_replace(" ","T", $picpost['uploaded']);
	CreateSelect("Kategória", "gcategory", PicCatsArray(), $picpost['gcategory']);
	CreateInput("Képfájl", "image", "file");
	CreateInput("Időpont", "uploaded", "datetime-local", $picpost['uploaded']);
	echo '<button class="btn btn-success" name="'. $btnName .'" style="margin-bottom:15px;">'. $btnText .'</button>';
	echo '</form>';

	echo '</div></div>';
}

/*--------------------------Ifjúságnevelés új cikk----------------------------*/
function NewIfjPost(){
	if(isset($_POST['sendIfjNew'])){
		global $dbPrefix;

		$params = $_POST;

		$params['image'] = $_FILES['image']['name'];

		if(!isset($params['status'])){ $params['status'] = 0; }
		else{ $params['status'] = 1; } 
		unset($params['sendNew']);
		
		if($_FILES['image']['name'] && $_FILES['image']['tmp_name'])
		{

			$tempFile = $_FILES['image']['tmp_name'];

			$fileName = $_FILES['image']['name'];

			move_uploaded_file($tempFile, "../media/ifjnev/".$fileName);
		}
		
		DbQuery("INSERT INTO ".$dbPrefix."ifjnev VALUES (NULL, :category, :title, :intro, :image, :body, :created, :status)", $params);
	}
	PostIfjForm();
	
}
function PostIfjForm($ifjpost = null)
{

	echo '<div class="block" id="2">';
	echo '<div class="head"><h2>Ifjúságnevelés cikk létrehozása</h2><a href="" id="show"><img class="switch" src="icons/expandmore.png" alt="expand"></a></div>';
	echo '<div class="content" id="hidden">';
	echo '<form method="post" enctype="multipart/form-data">';

	$btnName = "sendEdit";
	$btnText = "Változások mentése";

	if(!$ifjpost)
	{ 

		$btnName = "sendIfjNew";
		$btnText = "Létrehozás";

		$ifjpost = 
		[
			'category' => 1,
			'title' => null,
			'intro' => null,
			'body' => "",
			'created' => date("Y-m-d H:i:s"),
			'status' => null
		];
	}

	$ifjpost['created'] = str_replace(" ", "T", $ifjpost['created']);
	CreateSelect("Kategória", "category", IfjCatsArray(), $ifjpost['category']);
	CreateInput("Cím", "title", "text", $ifjpost['title']);
	CreateInput("Bevezető", "intro", "text", $ifjpost['intro']);
	CreateInput("Képfájl", "image", "file");
	echo '<div class="form-group"><textarea name="body" id="body">'. $ifjpost['body'] .'</textarea></div>';
	CreateInput("Időpont", "created", "datetime-local", $ifjpost['created']);
	CreateInput("Publikus", "status", "checkbox", $ifjpost['status']);
	echo '<button class="btn btn-success" name="'. $btnName .'" style="margin-bottom:15px;">'. $btnText .'</button>';
	echo '</form>';
	
	echo '</div></div>';
}

function IfjCatsArray(){
	global $dbPrefix;
	$ifjarray = [];

	$categories = DbQuery("SELECT * FROM ".$dbPrefix."ifjnevcat");
	foreach($categories as $cat){
		$id = $cat['icategory_id'];
		$name = $cat['icname'];

		$ifjarray[$id] = $name;
	}
	return $ifjarray;
}
function ListIfj(){
	global $dbPrefix;
		
	echo '<div class="block" id="2">';
	echo '<div class="head"><h2>Ifjúságnevelés cikkek megtekintése</h2><a href="" id="show"><img class="switch" src="icons/expandmore.png" alt="expand    "></a></div>';
	echo '<div class="content" id="hidden">';

	if(isset($_POST['delIfjnev'])){
	DbQuery("DELETE FROM ". $dbPrefix ."ifjnev WHERE id=:ifnews", ['ifnews' => $_POST['delIfjnev'] ]);
	}
	$ifjarts = DbQuery("SELECT id ,category, icname, title, image, created FROM ". $dbPrefix ."ifjnev INNER JOIN ". $dbPrefix ."ifjnevcat ON ". $dbPrefix ."ifjnevcat.icategory_id = ". $dbPrefix ."ifjnev.category ORDER BY created desc");
	
	echo '<table class="table table-striped table-hover">';
	echo '<thead><tr>';
	echo '<th>Azon.</th><th>Kategória</th><th>Cikk címe</th><th>Kép</th><th>Időpont</th><th> </th><th> </th>';
	echo '</tr></thead>';
	echo '<tbody>';
	

	foreach($ifjarts as $ifjart)
	{

		echo '<tr>';
		echo '<td>'. $ifjart['id'] .'</td>';
		echo '<td>'. $ifjart['icname'] .'</td>';
		echo '<td>'. $ifjart['title'] .'</td>';
		
		if(!$ifjart['image'] == ""){
			echo '<td><img src="../media/ifjnev/'. $ifjart['image'] .'" style="width:75px"></td>';
		}
		else{
			echo '<td><img src="../media/test1.jpg" style="width:75px"></td>';
		}
		echo '<td>'. $ifjart['created'] .'</td>';
		echo '<td><form method="post"><button class="btn btn-danger" name="delIfjnev" value="'. $ifjart['id'] .'">Törlés</button></form></td>';
		echo '<td><a href="?func=editifj&news='. $ifjart['id'] .'">Szerkesztés</a></td>';
		echo '</tr>';
	}
	echo '</tbody>';
	echo '</table>';

	echo '</div></div>';
}