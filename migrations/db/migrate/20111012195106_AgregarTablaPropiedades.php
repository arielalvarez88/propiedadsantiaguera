<?php

class AgregarTablaPropiedades extends Ruckusing_BaseMigration {

    public function up() {
        $propiedades = $this->create_table('properties');
        $propiedades->column('address', 'text');
        $propiedades->column('sell_price_dollars', 'integer');
        $propiedades->column('sell_price_pesos', 'integer');
        $propiedades->column('rent_price_dollars', 'integer');
        $propiedades->column('rent_price_pesos', 'integer');
        $propiedades->column('display_property', 'boolean',array('default' => 0));
        $propiedades->column('sector', 'string', array('limit' => 40));
        $propiedades->column('coordenates', 'string', array('limit' => 100));
        $propiedades->column('visits', 'integer',array('default' => 0));
        $propiedades->column('bedrooms', 'integer', array('limit' => 3));
        $propiedades->column('bathrooms', 'integer', array('limit' => 3));
        $propiedades->column('livingrooms', 'integer', array('limit' => 3));
        $propiedades->column('kitchens', 'integer', array('limit' => 3));
        $propiedades->column('parkings', 'integer', array('limit' => 3));
        $propiedades->column('terrain', 'interger',array('limit' => 4));
        $propiedades->column('construction', 'integer',array('limit' => 4));
        $propiedades->column('stories', 'integer', array('limit' => 3));
        $propiedades->column('last_payment', 'integer', array('limit' => 3));
        $propiedades->column('post_date', 'integer', array('limit' => 3));
        $propiedades->column('max_photos_number', 'integer', array('limit' => 2));
        $propiedades->column('photos_number', 'integer', array('limit' => 2));
        $propiedades->finish();
        
         $propertyTypes = $this->create_table('property-types');
        $propertyTypes->column('name', 'string');
        $propertyTypes->column('description', 'text');        
        $propertyTypes->finish();
        
        $this->execute("INSERT INTO property-types (name,description) VALUES  ('Casa','casa')");
        $this->execute("INSERT INTO property-types (name,description) VALUES  ('Apartamento','Apartamento')");
        $this->execute("INSERT INTO property-types (name,description) VALUES  ('Solar','Solar')");
        $this->execute("INSERT INTO property-types (name,description) VALUES  ('Penthouse','Penthouse')");
        $this->execute("INSERT INTO property-types (name,description) VALUES  ('Local Comercial','Local Comercial')");
        $this->execute("INSERT INTO property-types (name,description) VALUES  ('Edificio','Edificio')");
        $this->execute("INSERT INTO property-types (name,description) VALUES  ('Nave industrial','Nave industrial')");
        $this->execute("INSERT INTO property-types (name,description) VALUES  ('Oficina','Oficina')");
        
        $propertyTypesJoin = $this->create_table('properties_property-types');
        $propertyTypesJoin->column('property_id', 'string');
        $propertyTypes->column('property-type_id', 'text');        
        $propertyTypes->finish();
    
        $propertyFeatures = $this->create_table('property-features');
        $propertyFeatures->column('name', 'string');
        $propertyFeatures->column('description', 'string');
        $propertyFeatures->finish();
        
        $this->execute("INSERT INTO property-features (name,description) VALUES  ('Piscina','Piscina')");
        
        $propertyTypesJoin = $this->create_table('properties_property-features');
        $propertyTypesJoin->column('property_id', 'string');
        $propertyTypes->column('property-feature_id', 'text');        
        $propertyTypes->finish();
        
        
        
    }

//up()

    public function down() {
                $this->drop_table('properties');
                
    }

//down()
}

?>