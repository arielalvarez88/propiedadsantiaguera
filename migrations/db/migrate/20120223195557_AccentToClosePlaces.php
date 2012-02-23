<?php

class AccentToClosePlaces extends Ruckusing_BaseMigration {

	public function up() {
                $this->execute("SET NAMES 'utf8'");
                $this->execute("UPDATE property_features SET name='Área de lavado',description='Área de lavado' where name='Area de lavado' ");
                $this->execute("UPDATE property_features SET name='Balcón',description='Balcón' where name='Balcon' ");
	}//up()

	public function down() {
                $this->execute("UPDATE property_features SET name='Area de lavado',description='Area de lavado' where name='Área de lavado' ");
                $this->execute("UPDATE property_features SET name='Balcon',description='Balcon' where name='Balcón' ");
	}//down()
}
?>