<?php

class AddingFloorToProperties extends Ruckusing_BaseMigration {

	public function up() {
                $this->execute("ALTER TABLE properties ADD COLUMN floor INT");
	}//up()

	public function down() {
                    $this->execute("ALTER TABLE properties DROP COLUMN floor");
	}//down()
}
?>