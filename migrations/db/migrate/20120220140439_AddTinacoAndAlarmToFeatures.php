<?php

class AddTinacoAndAlarmToFeatures extends Ruckusing_BaseMigration {

	public function up() {
                    $this->execute("INSERT INTO property_features (name,description) VALUES ('Alarma','Alarma')");
                    $this->execute("INSERT INTO property_features (name,description) VALUES ('Tinaco','Tinaco')");
                    
	}//up()

	public function down() {
                    $this->execute("DELETE FROM property_features WHERE name = 'Alarma' || name='Tinaco'");
	}//down()
}
?>