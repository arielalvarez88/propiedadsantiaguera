<?php

class CmsVideos extends Ruckusing_BaseMigration {

    public function up() {
        $this->execute("SET NAMES 'utf8'");
        $videos = $this->create_table('cms_videos');
        $videos->column('title', 'string', array('limit' => 80));
        $videos->column('description', 'text');
        $videos->column('url', 'text');
        $videos->column('thumbnail', 'text');
        $videos->column('youtube_id', 'string', array('limit' => 20));
        $videos->finish();
    }

//up()

    public function down() {
        $this->drop_table('cms_videos');
    }

//down()
}

?>