<?php
$articles = isset($articles) ? $articles : null;

$image_helper = new Image_helper();

$edit_link = isset($edit)? $edit_link : null;
$section = isset($section)? $section : null

?>


<div id="articles-thumbs-pager-container">


    <div id="articles-thumbs-pager">
        <h2 class="front-page-module-header"><img src="/images/common/smallGreenArrow.png" alt=""/>Articulos Recientes</h2>    

        <ul>
            <?php foreach ($articles as $article): ?>
                <li>

                    <img class="article-thumb" src="<?php echo $image_helper->resize($article->photo,72, 63, "/images/articlesPhotosThumbs/");?>" alt="articule_thumb"/>
                    <div class="articles-thumbs-pager-info">
                        <h2><img src="/images/common/smallGreenArrow.png" alt=""/><?php echo $article->preview_title; ?></h2>
                        <div><?php echo $article->preview; ?> ...<a class="green-text" href="/articulos/ver/<?php echo $article->id; ?>">Leer m&aacute;s</a></div>

                    </div>

                </li>
            <?php endforeach;?>
        </ul>

    </div>
</div>
