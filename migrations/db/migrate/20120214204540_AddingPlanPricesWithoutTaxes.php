<?php

class AddingPlanPricesWithoutTaxes extends Ruckusing_BaseMigration {

	public function up() {
                    $this->execute("ALTER TABLE plans ADD COLUMN taxless_price INT");
                    $this->execute("UPDATE plans SET taxless_price= price-(price*0.16)");
                    
                    
	}//up()

	public function down() {
                    $this->execute("ALTER TABLE plans DROP COLUMN taxless_price");
	}//down()
}
?>