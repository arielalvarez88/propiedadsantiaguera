<?php

class ProvincesAndNeighborhoods extends Ruckusing_BaseMigration {

    public function up() {
        $this->execute("SET NAMES 'utf8'");
        $provinces = $this->create_table('provinces');
        $provinces->column('name', 'string', array('limit' => 39));
        $provinces->finish();
        
        $this->execute("INSERT INTO provinces (id,name) VALUES (1,'Azua')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (2,'Bahoruco')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (3,'Barahona')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (4,'Dajabón')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (5,'Distrito Nacional')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (6,'Duarte')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (7,'El Seibo')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (8,'Espaillat')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (9,'Hato Mayor')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (10,'Hermanas Mirabal')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (11,'Independencia')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (12,'La Altagracia')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (13,'La Romana')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (14,'La Vega')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (15,'María Trinidad Sánchez')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (16,'Monseñor Nouel')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (17,'Montecristi')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (18,'Monte Plata')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (19,'Pedernales')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (20,'Peravia')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (21,'Puerto Plata')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (22,'Pedernales')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (23,'Peravia')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (24,'Puerto Plata')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (25,'Samaná')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (26,'Sánchez Ramírez')");        
        $this->execute("INSERT INTO provinces (id,name) VALUES (27,'San Cristóbal')");        
        $this->execute("INSERT INTO provinces (id,name) VALUES (28,'San José de Ocoa')");        
        $this->execute("INSERT INTO provinces (id,name) VALUES (29,'San Juan')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (30,'San Pedro de Macorís')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (31,'Santiago')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (32,'Santiago Rodríguez')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (33,'Santo Domingo')");
        $this->execute("INSERT INTO provinces (id,name) VALUES (34,'Valverde')");


        
        $neighborhoods = $this->create_table('neighborhoods');
        $neighborhoods->column('name', 'string', array('limit' => 39));
        $neighborhoods->column('province_id', 'integer');
        $neighborhoods->finish();

        
        $neighborhoods_provinces = $this->create_table('neighborhoods_provinces');
        $neighborhoods_provinces->column('neighborhood_id', 'integer');
        $neighborhoods_provinces->column('province_id', 'integer');
        $neighborhoods_provinces->finish();

        
        $properties_provinces = $this->create_table('properties_provinces');
        $properties_provinces->column('property_id', 'integer');
        $properties_provinces->column('province_id', 'integer');
        $properties_provinces->finish();
        
         
        $properties_neighborhoods = $this->create_table('properties_neighborhoods');
        $properties_neighborhoods->column('property_id', 'integer');
        $properties_neighborhoods->column('neighborhood_id', 'integer');
        $properties_neighborhoods->finish();
        


      
    }

//up()

    public function down() {
                $this->execute("DROP TABLE provinces");
                $this->execute("DROP TABLE neighborhoods_provinces");
                $this->execute("DROP TABLE neighborhoods");
                
                $this->execute("DROP TABLE properties_provinces");
                $this->execute("DROP TABLE properties_neighborhoods");
                
    }

//down()
}

?>