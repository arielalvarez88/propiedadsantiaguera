<?php

class PlansTableAndPopulation extends Ruckusing_BaseMigration {

	public function up() {
                    $plans = $this->create_table('plans');
                    $plans->column('nombre','string',array('lmiit'=>50));
                    $plans->column('description','string');
                    $plans->column('property_numbers','integer',array('limit'=>3));
                    $plans->column('graphical_services_number','integer',array('limit',3));
                    $plans->finish();
	}//up()

	public function down() {
                    $this->drop_table('plans');
	}//down()
}
?>