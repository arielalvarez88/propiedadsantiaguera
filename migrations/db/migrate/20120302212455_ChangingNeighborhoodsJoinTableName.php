<?php

class ChangingNeighborhoodsJoinTableName extends Ruckusing_BaseMigration {

	public function up() {
                $this->execute("RENAME TABLE properties_neighborhods TO neighborhods_properties;");
                
	}//up()

	public function down() {
                    $this->execute("RENAME TABLE neighborhods_properties TO properties_neighborhods ;");
	}//down()
}
?>