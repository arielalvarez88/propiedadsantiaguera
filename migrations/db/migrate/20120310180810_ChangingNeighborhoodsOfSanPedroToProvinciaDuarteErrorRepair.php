<?php

class ChangingNeighborhoodsOfSanPedroToProvinciaDuarteErrorRepair extends Ruckusing_BaseMigration {

	public function up() {
                    $this->execute("UPDATE neighborhoods_provinces SET province_id = 6 where province_id = 30");
                    $this->execute("UPDATE neighborhoods SET province_id = 6 where province_id = 30;");
                    
	}//up()

	public function down() {
                    $this->execute("UPDATE neighborhoods SET province_id = 30 where province_id = 6;");
                    $this->execute("UPDATE neighborhoods SET province_id = 30 where province_id = 6;");
	}//down()
}
?>