<?php

class AddingMaintenaceToProperties extends Ruckusing_BaseMigration {

	public function up() {
                    $this->execute("ALTER TABLE properties ADD COLUMN maintenance INT");
	}//up()

	public function down() {
                    $this->execute("ALTER TABLE properties DROP COLUMN maintenance");
	}//down()
}
?>