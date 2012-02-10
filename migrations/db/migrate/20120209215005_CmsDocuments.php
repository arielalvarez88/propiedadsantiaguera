<?php

class CmsDocuments extends Ruckusing_BaseMigration {

	public function up() {
            
            $this->execute("SET NAMES 'utf8'");
        $cms_documents = $this->create_table('cms_documents');
        $cms_documents->column('title', 'string', array('limit' => 80));        
        
        $cms_documents->column('description', 'text');
        $cms_documents->column('path', 'string', array('limit' => 300));
        
        $cms_documents->finish();                

	}//up()

	public function down() {
                    $this->drop_table("cms_documents");
	}//down()
}
?>