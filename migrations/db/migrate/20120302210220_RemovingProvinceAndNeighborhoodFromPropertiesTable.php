<?php

class RemovingProvinceAndNeighborhoodFromPropertiesTable extends Ruckusing_BaseMigration {

	public function up() {
                $this->execute("ALTER TABLE properties DROP COLUMN province");
                $this->execute("ALTER TABLE properties DROP COLUMN neighborhood");
                
	}//up()

	public function down() {
                    $this->execute("ALTER TABLE properties ADD COLUMN province VARCHAR(70)");
                    $this->execute("ALTER TABLE properties DROP COLUMN neighborhood VARCHAR(70)");
	}//down()
}
?>