<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$articles = isset($articles)? $articles :null;
$image_helper = new Image_helper();
?>


<div id="related-articles">
    <h2 class="green-text">ARTICULOS RELACIONADOS</h2>
    <div id="related-articles-content">
        <?php foreach($articles as $article):?>
        <div class="relate-articles-content-container">
            
            <img class="related-articles-content-photo" src="<?php echo $image_helper->resize($article->photo,100,76,'/images/articlesPhotosThumbs/');?>" alt="foto-del-articulo"/>
            <div>
                <h3 class="green-text"><a class="no-decoration-anchor" href="<?php echo base_url();?>articulos/ver/<?php echo $article->id;?>"><?php echo $article->preview_title;?></a></h3>
                <p><?php echo $article->preview;?></p>
            </div>
        </div>
        <?php endforeach;?>
    </div>
    
</div>
