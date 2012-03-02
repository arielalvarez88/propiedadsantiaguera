<?php

class RemovingProvinceAndNeighborhoodFromPropertiesTable extends Ruckusing_BaseMigration {

	public function up() {
                $this->execute("ALTER TABLE properties DROP COLUMN province");
                $this->execute("ALTER TABLE properties DROP COLUMN neighborhood");
                
	}//up()

	public function down() {
                    
	}//down()
}
?>