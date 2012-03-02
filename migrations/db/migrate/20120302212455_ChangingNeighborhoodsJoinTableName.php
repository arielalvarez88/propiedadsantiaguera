<?php

class ChangingNeighborhoodsJoinTableName extends Ruckusing_BaseMigration {

	public function up() {
                $this->execute("RENAME TABLE properties_neighborhoods TO neighborhoods_properties;");
                
	}//up()

	public function down() {
                    $this->execute("RENAME TABLE neighborhoods_properties TO properties_neighborhoods ;");
	}//down()
}
?>