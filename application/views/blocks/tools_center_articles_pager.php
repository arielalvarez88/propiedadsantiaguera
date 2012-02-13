<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$articles = isset($articles) ? $articles : null;
?>

<div id="tools-center-articles-pager">

    <?php if ($articles): ?>

        <?php foreach ($articles as $article): ?>
            <div class="tools-center-articles-pager-article-container">
                <h2 class="green-text"><a href="<?php echo base_url();?>articulos/ver/<?php echo $article->id;?>" class="no-decoration-anchor"><?php echo $article->preview_title; ?></a></h2>
                <div class="tools-center-articles-pager-body">
                    <?php echo $article->preview; ?>
                </div>
                
                <div class="tools-center-articles-pager-actions">
                    <div class="fb-like" data-href="<?php echo base_url();?>/articulos/ver/<?php echo $article->id;?>" data-send="false" data-width="450" data-show-faces="true"></div>
                </div>
                
            </div>



        <?php endforeach; ?>
    <?php else: ?>

        <h2>No se contraron articulos.</h2>
    <?php endif; ?>
</div>




