<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$article = isset($article)? $article : null;
?>

<?php if($article):?>
<div id="article-viewer-container">
    <h1 class="green-text"><?php echo $article->title;?></h1>
    <?php if($article->subtitle):?>
    <h3 ><?php echo $article->subtitle;?></h3>
    
    <?php endif;?>
    
    <?php if($article->author):?>
        <p > Autor: <?php echo $article->author;?></p>
    <?php endif;?>
    <div id="article-viewer">
        <img id="article-viewer-article-photo" src="<?php echo $article->photo;?>" alt="Foto del Articulo"/>
        
        <div id="article-viewer-article-body">
            <?php echo $article->body;?>
        </div>
    </div>
    <div class="fb-comments" data-href="<?php echo base_url();?>articulos/ver/<?php echo $article->id;?>" data-num-posts="30" data-width="565"></div>
</div>
<?php endif;?>