<?php

class AddBBpinToUser extends Ruckusing_BaseMigration {

	public function up() {
                    $this->execute("ALTER TABLE users ADD COLUMN bbpin nvarchar(10);");
	}//up()

	public function down() {
                    $this->execute("ALTER TABLE users DROP COLUMN bbpin;");
	}//down()
}
?>