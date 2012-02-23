<?php

class AccentToTrasnportePublicoInPropertyClosePlaces extends Ruckusing_BaseMigration {

	public function up() {
            $this->execute("SET NAMES 'utf8'");
                $this->execute("UPDATE property_close_places SET name='Transporte Público',description='Rutas de transporte público' where name='Transporte Público' ");
	}//up()

	public function down() {
$this->execute("UPDATE property_close_places SET name='Transporte Publico',description='Rutas de transporte publico' where name='Transporte Público' ");
	}//down()
}
?>