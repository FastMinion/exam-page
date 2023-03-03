<?php
/*-----------------------NEWS--------------------------*/
function GetArticlesByCategory($category)
{
	global $dbPrefix;

	$articles = DbQuery("SELECT news_id,title,intro,image,created 
			FROM ".$dbPrefix."news 
			WHERE category=:category AND status=1", 
			['category' => $category]);
	

	return $articles;
}

function GetArticleById($newsId)
{
	global $dbPrefix;

	$news = DbQuery("SELECT * 
			FROM ".$dbPrefix."news 
			WHERE news_id=:news AND status=1", 
			['news' => $newsId]);

	if($news)
	{
		return $news[0];
	}
	return null;
}
/*-----------------------IFJNEV--------------------------*/
function IfjnevBycat($category){
	global $dbPrefix;

	$ifjarts = DbQuery("SELECT id,title,intro,image,created FROM '.$dbPrefix.'ifjnev WHERE category=:category AND status=1", ['category'=>$category]);

	return $ifjarts;
}

function IfjnevById($ifjnewsId)
{
	global $dbPrefix;

	$ifjnews = DbQuery("SELECT * FROM ".$dbPrefix."ifjnev WHERE id=:id AND status=1", ['id' => $ifjnewsId]);

	if($ifjnews)
	{
		return $ifjnews[0];
	}
	return null;
}

/*-----------------------GALÉRIA--------------------------*/
function GalleryId($galleryId){
	global $dbPrefix;

	$gallery = DbQuery("SELECT * FROM ".$dbPrefix."gallery WHERE gcategory=:gcategory AND status=1 ", ['gcategory' =>$galleryId]);
	
	return $gallery;

}
function PicsId($picId){
    global $dbPrefix;

    $pics = DbQuery("SELECT * 
			FROM ".$dbPrefix."gallery 
                WHERE gallery_id=:pics AND status=1",
        ['pics' => $picId]);

    if($pics)
    {
        return $pics[0];
    }
    return null;
}