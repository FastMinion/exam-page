<link rel="stylesheet" href="src/jquery.fancybox.min.css">

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

<script src="src/jquery.fancybox.min.js"></script>


    <div class="container">
        <div class="gallerycatpics">
                <ul>
                    <?php
                    global $dbPrefix;
                    $gcats = DbQuery("SELECT * FROM ".$dbPrefix."gallerycat WHERE status=1");
                    if(!isset($_GET['category'])):
                        foreach($gcats as $gcat):
                    ?><div class="contain" style="max-width:260px;display: inline-block; margin-right: 25px;">
                    <li><a href="?page=gallery&category=<?=$gcat['gallerycat_id']?>" style="max-width: 260px; width: 260px;"><img src="media/gallery/gallerycats/<?=$gcat['image']?>" alt="<?=$gcat['gcname']?>"><center style="max-width: 260px; width: 260px;"><?=$gcat['gcname']?></center></a></li>
                            </div>
                    <?php endforeach;endif;
                    ?><div class="gallery"><?php
                    if(isset($_GET['category'])){
                        $gcat = GetCategory();
                        
                        if($gcat){
                            gPics($gcat);
                        }
                    }
                     ?></div>
                    <script src="src/script.js"></script>
                </ul>
            
        </div>

    </div>
