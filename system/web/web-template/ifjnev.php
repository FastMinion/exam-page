<div id="AlignHeader">
    <h1>Szent Flórián Önkéntes és Ifjúsági Tűzoltó Egyesület</h1>
    <p>”A nemes tettektől és tenni akarástól leszel több„</p>
</div>
    </header>

<nav class="hidden">
    <div id="menuToggle">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
        <ul id="menu">
            <li><a href="?page=home" class="navmain-a">Főoldal</a></li>
            <li><a href="?page=news"class="navmain-a">Hírek</a></li>
            <li><a href="?page=ifjnev"class="navmain-a">Ifjúságnevelés</a></li>
            <li><a href="?page=gallery"class="navmain-a">Galéria</a></li>
            <li><a href="?page=contact"class="navmain-a">Elérhetőség</a></li>
        </ul>
    </div>
</nav>

<nav class="mainNav">
    <ul>
        <li><a href="?page=home" class="navmain-a">Főoldal</a></li>
        <li><a href="?page=news"class="navmain-a">Hírek</a></li>
        <li><a href="?page=ifjnev"class="navmain-a">Ifjúságnevelés</a></li>
        <li><a href="?page=gallery"class="navmain-a">Galéria</a></li>
        <li><a href="?page=contact"class="navmain-a">Elérhetőség</a></li>
    </ul>
</nav>
<aside>
    <section>
        <h2>Social media</h2>
        <ul>
            <li><a href="https://www.facebook.com/szentflorianote/" target="_blank"><img src="res/logos/facebook-logo.png" alt="Facebook logo"></a></li>
            <li><a href="https://www.instagram.com/szent.florian.ote/" target="_blank"><img src="res/logos/instagram-icon.png" alt="Instagram logo"></a></li>
        </ul>
    </section>
    <section>
        <h2>Partnerek</h2>
        <ul>
            <li><a href="#">Baranya Megyei Katasztrófavédelmi Igazgatóság</a></li>
            <li><a href="#">Beck és Matyóka Adótanácsadó Kft.</a></li>
            <li><a href="#">Béczi Büfé</a></li>
            <li><a href="#">Bernáth Tüzép</a></li>
            <li><a href="#">Dräger Magyarország</a></li>
            <li><a href="#">Duplex-Rota Nyomdaipari Kft.-Pécs</a></li>
            <li><a href="#">Kajus Dániel autójavító</a></li>
            <li><a href="#">Meyer Róbert pincészet</a></li>
            <li><a href="#">Mokos pincészet</a></li>
            <li><a href="#">Palkonya Önkormányzata</a></li>
        </ul>
    </section>
</aside>

    <div class="container">
        <section class="navcategory">
        <h1>Ifjúságnevelés</h1>

            <nav><ul>
                <?php
                $categs = DbQuery("SELECT * FROM ote__ifjnevcat WHERE status = 1");

                foreach($categs as $final):
                ?>
                <li><a href="?page=ifjnev&category=<?= $final['icategory_id'] ?>" class="navcategory-a"><?= $final['icname'] ?></a></li>
                <?php endforeach; ?>
            </ul></nav>
        </section>

        <?php
            global $dbPrefix;
                $category = GetCategory();
                $post = GetPost();
                if($category){
                    
                    ifjPosts($category);
                }
                if($post){
                    IfjReadPost($post);
                }
                else if(!isset($_GET['category'])){
                    $news = DbQuery("SELECT * FROM ".$dbPrefix."ifjnev WHERE status=1 ORDER BY created desc");
                    if($news){
                    foreach($news as $result){
                        echo '<div class="newspanel">';
                        echo '<section>';
                        echo '<h3>'. $result['title'] .'</h3>';
                        echo '<div class="content">';
                        if(!$result['image'] == null){
                            echo '<img src="media/ifjnev/'. $result['image'] .'">';}
                        echo '<p>'. $result['intro'] .'</p>';
                        echo '<a href="?page=ifjnev&read='. $result['id'] .'" id="read">Elolvasom</a>';
                        echo '</div></section></div>';
                    }
                    }
                    else{
                        echo'<h1 style="margin-bottom: 100px;">Nem található bejegyzés se melyik kategóriában!</h1>';
                    }
                }
            ?>
        
    </div>
