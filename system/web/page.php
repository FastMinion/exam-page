<?php

function PageBegin(){
    require_once 'system/web/web-template/page-begin.php';
}
function PageEnd(){
    require_once 'system/web/web-template/page-end.php';
}
/*------------------NEWS----------------------------*/
function Posts($categoryId) {
    $newses = GetArticlesByCategory($categoryId);
    if($newses) {

        foreach($newses as $newpost) {
            echo '<div class="newspanel">';
            echo '<section>';
            echo '<h3>'. $newpost['title'] .'</h3>';
            echo '<div class="content">';
            if(!$newpost['image'] == ""){
                echo '<img src="media/news/'. $newpost['image'] .'">';
            }
            echo '<p>'. $newpost['intro'] .'</p>';
            echo '<a href="?page=news&read='. $newpost['news_id'] .'" id="read">Elolvasom</a>';
            echo '</div></section></div>';
        }
    }
    else{
        echo '<h1>Nem található hír ebben a kategóriában!</h1>';
    }

}

function ReadPost($newsId) {
    $news = GetArticleById($newsId);

	if($news)
	{
        echo '<div class="post">';
        echo '<h1>'. $news['title'] .'</h1>';
        echo '<p><strong>'. $news['intro'] .'</strong></p>';
        echo '</div>';
        if(!$news['image'] == null){
	    echo '<div class="npic">';
        echo'<center><img src="media/news/'.$news['image'].'"></center>';
        echo'</div>';
        }

        echo '<div class="post">';
        echo '<article id="text">'.$news['body'].'</article>';
        echo '</div>';
	}
	else
	{
		echo '<h1>Cikk nem található</h1>';
		echo '<p>A kért bejegyzés nem található</p>';
	}
}

function HomeNews()
{
    global $dbPrefix;
    for($i = 0; $i <= 3; $i++) {
        $test = DbQuery('SELECT news_id, title, image FROM '.$dbPrefix.'news where image != "" AND status = 1 ORDER BY created desc');

        $newsid = $test[$i]['news_id'];
        $title = $test[$i]['title'];
        $image = $test[$i]['image'];

        echo '<div class="News">';
        echo '<a href="?page=news&read='.$newsid.'">';
        echo '<h2>'.$title.'</h2>';    
        if(!$image == null){
            echo '<div class="goto" style="background-image: url(media/news/'.$image.')">' ;
        }
        echo '</div></a></div>';
    }
}
/*-----------------------IFJNEV--------------------------*/
function ifjPosts($ifjcatId) {
    $ifjnewses = IfjnevBycat($ifjcatId);


    if($ifjnewses) {

        foreach($ifjnewses as $ifjpost) {
            echo '<div class="newspanel">';
            echo '<section>';
            echo '<h3>'. $ifjpost['title'] .'</h3>';
            echo '<div class="content">';
            if(!$ifjpost['image'] == null){
                echo '<img src="media/ifjnev/'. $ifjpost['image'] .'">';
            }
            echo '<p>'. $ifjpost['intro'] .'</p>';
            echo '<a href="?page=ifj&read='. $ifjpost['id'] .'" id="read">Elolvasom</a>';
            echo '</div></section></div>';
        }
    }    else{
        echo '<h1>Nem található hír ebben a kategóriában!</h1>';
    }

}

function IfjReadPost($ifjnewsId) {
    $ifjnews = IfjnevById($ifjnewsId);
    
    
	if($ifjnews)
	{
        echo '<div class="post">';
        echo '<h1>'. $ifjnews['title'] .'</h1>';
        echo '<p><strong>'. $ifjnews['intro'] .'</strong></p></div>';
        if(!$ifjnews['image'] == null){
            echo '<div class="npic">';
            echo '<center><img src="media/ifjnev/'. $ifjnews['image'] .'"></center></div>';
        }

        echo '<div class="post">';
        echo '<article id="text">'.$ifjnews['body'].'</article>';
        echo '</div>';
	}
	else
	{
		echo '<h1>Cikk nem található</h1>';
		echo '<p>A kért bejegyzés nem található</p>';
	}
}
/*------------------GALLERY--------------------*/
function gPics($gId) {
    $gpics = GalleryId($gId);

    if($gpics) {

        foreach($gpics as $gpic) {
            echo '<li style="margin-top: 25px;">';
            echo '<a href="media/gallery/'.$gpic['image'].'" target="_blank">';
            echo '<img src="media/gallery/'.$gpic['image'].'" alt="'.$gpic['gallery_id'].'">';
            echo '</a>';
            echo '</li>';
        }
    }

}

