<?php

class AddingGraphicalServicesLeftColumnToUserTable extends Ruckusing_BaseMigration {
                
	public function up() {
                $this->execute("SET NAMES 'utf8'");
                    $this->execute("ALTER TABLE users  ADD COLUMN graphical_services_left INT(3);");
	}//up()

	public function down() {
                    $this->execute("ALTER TABLE users drop column graphical_services_left;");
	}//down()
}
?>