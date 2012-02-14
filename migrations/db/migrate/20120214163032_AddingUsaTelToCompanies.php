<?php

class AddingUsaTelToCompanies extends Ruckusing_BaseMigration {

	public function up() {
                    $this->execute("ALTER TABLE users ADD COLUMN  usa_tel NVARCHAR(40);");
                    
                            
	}//up()

	public function down() {
                    $this->execute("ALTER TABLE users DROP COLUMN  usa_tel;");
	}//down()
}
?>