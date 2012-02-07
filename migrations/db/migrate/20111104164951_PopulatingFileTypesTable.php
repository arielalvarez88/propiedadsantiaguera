<?php

class PopulatingFileTypesTable extends Ruckusing_BaseMigration {

	public function up() {       
            $this->execute("SET NAMES 'utf8'");
                    $this->execute("INSERT into file_types (name,description) VALUES ('foto','fotografía de la casa')");
                    $this->execute("INSERT into file_types (name,description) VALUES ('video','video')");
                    
	}//up()

	public function down() {

	}//down()
}
?>