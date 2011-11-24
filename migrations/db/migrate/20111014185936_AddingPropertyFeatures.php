 <?php

class AddingPropertyFeatures extends Ruckusing_BaseMigration {

    public function up() {
        $this->execute("SET NAMES 'utf8'");
        
        $propertyFeatures = $this->create_table('property_features');
        $propertyFeatures->column('name', 'string');
        $propertyFeatures->column('description', 'text');
        $propertyFeatures->finish();
        

        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Ascensor','Ascensor')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Area de juegos','Area de Juegos')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Area de lavado','Area de lavado')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Balcon','Balcon')");        
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Baños en áreas recreativas','Baños en áreas recreativas')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Calentador de agua eléctrico','Calentador de agua eléctrico')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Calentador de agua de gas','Calentador de gas')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Caseta de guardianes','Caseta de guardianes')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Cisterna','Cisterna')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Closet de ropa blanca','Closet de ropa blanca')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Cocina equipada','Cocina equipada')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Comedor','Comedor')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Construcción antisísmica','Construcción antisísmica')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Cornisas en yeso','Cornisas en yeso')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Cuarto de máquinas','Cuarto de máquinas')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Cuarto de servicio con baño','Cuarto de servicio con baño')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Desayunador','Desayunador')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Despensa','Despensa')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Dormitorio principal con baño','Dormitorio principal con baño')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Ducto de basura','Ducto de basura')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Estar familiar','Estar familiar')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Gas común','Gas común')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Grifería importada','Grifería importada')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Intercom','Intercom')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Jacuzzi','Jacuzzi')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Jardín','Jardín')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Kiosco','Kiosco')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Lobby','Lobby')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Marquesina doble','Marquesina doble')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Medio baño para visitas','Medio baño para visitas')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Recibidor','Recibidor')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Parqueos extra','Parqueos extra')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Patio con jardín','Patio con jardín')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Piscina','Piscina')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Pisos en mármol','Pisos en mármol')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Planta eléctrica','Planta eléctrica')");        
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Terminación en caoba','Terminación en caoba')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Terraza','Terraza')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Todos los servicios pre-instalados','Todos los servicios pre-instalados')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Topes de granito en la cocina','Topes de granito en la cocina')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Portón eléctrico a control remoto','Portón eléctrico a control remoto')");
        $this->execute("INSERT INTO property_features (name,description) VALUES  ('Walk in closet','Walk in closet')");
        
        
        $propertyFeaturesJoin = $this->create_table('properties_property_features');
        $propertyFeaturesJoin->column('property_id', 'integer');
        $propertyFeaturesJoin->column('property_feature_id', 'integer');
        $propertyFeaturesJoin->finish();
    }

//up()

    public function down() {
        $this->drop_table('property_features');
        $this->drop_table('properties_property_features');
    }

//down()
}

?>   