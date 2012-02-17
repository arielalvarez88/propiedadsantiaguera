<?php

class AddingFurnituredFeatureToProperties extends Ruckusing_BaseMigration {

	public function up() {
                    $this->execute("INSERT INTO property_features (name,description) VALUES  ('Amueblada','Propiedad Amueblada')");
	}//up()

	public function down() {
                    $this->execute("DELETE FROM property_features where name = 'Amueblada'");
	}//down()
}
?>