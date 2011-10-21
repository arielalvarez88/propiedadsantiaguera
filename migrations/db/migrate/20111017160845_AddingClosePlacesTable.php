<?php

class AddingClosePlacesTable extends Ruckusing_BaseMigration {

	public function up() {
            $this->execute("SET NAMES 'utf8'");
            $closePlaces = $this->create_table('property_close_places');
            $closePlaces->column('name','string',array('limit' => 40));
            $closePlaces->column('description','text');
            $closePlaces->finish();
            
            $this->execute("INSERT INTO property_close_places (name,description) VALUES ('Centros Comerciales','Centros Comerciales')");
            $this->execute("INSERT INTO property_close_places (name,description) VALUES ('Supermercados','Supermecados')");
            $this->execute("INSERT INTO property_close_places (name,description) VALUES ('Colmados','Colmados')");
            $this->execute("INSERT INTO property_close_places (name,description) VALUES ('Centros Educativos','Centros Educativos')");
            $this->execute("INSERT INTO property_close_places (name,description) VALUES ('Establecimientos de Comida','Establecimientos de Comida')");
            $this->execute("INSERT INTO property_close_places (name,description) VALUES ('Panaderias','Panaderias')");
            $this->execute("INSERT INTO property_close_places (name,description) VALUES ('Gimnasios','Gimnasios')");
            $this->execute("INSERT INTO property_close_places (name,description) VALUES ('Transporte Publico','Rutas de transporte publico')");
            $this->execute("INSERT INTO property_close_places (name,description) VALUES ('Ferreterias','Ferreterias')");
            $this->execute("INSERT INTO property_close_places (name,description) VALUES ('Farmacias','Farmacias')");
            
            
            $closePlacesJoin = $this->create_table('properties_property_close_places');
            $closePlacesJoin->column('property_id','integer');
            $closePlacesJoin->column('property_close_place_id','integer');
            $closePlacesJoin->finish();
            
            
	}//up()

	public function down() {
            $this->drop_table('property_close_places');
            $this->drop_table('properties_property_close_places');

	}//down()
}
?>