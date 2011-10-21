<?php

class AgregarCampoToken extends Ruckusing_BaseMigration {

	public function up() 
        {
              $query = "ALTER TABLE `users` ADD `token` varchar(13)";
              $this->execute($query);
              
	}//up()

	public function down() 
        {
              $query = "ALTER TABLE `users` DROP `token`";
              $this->execute($query);
	}//down()
}
?>