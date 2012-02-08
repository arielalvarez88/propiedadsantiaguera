<?php

class AddingArticlesDb extends Ruckusing_BaseMigration {



    public function up() {
        $this->execute("SET NAMES 'utf8'");
        $articles = $this->create_table('articles');
        $articles->column('title', 'string', array('limit' => 80));
        $articles->column('subtitle', 'string', array('limit' => 100));
        $articles->column('photo', 'string', array('limit' => 100));
        $articles->column('body', 'text');
        $articles->column('display_in_front_page', 'boolean', array('default' => 0));
        $articles->column('author', 'string', array('limit' => 80));
        $articles->column('preview', 'text');
        $articles->column('preview_title', 'string', array('limit' => 30));
        $articles->finish();                
    }

//up()

    public function down() {
        $this->drop_table('articles');
        
    }

//down()


}
?>