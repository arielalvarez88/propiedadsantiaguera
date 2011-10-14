<?php

class AddingPropertyTypes extends Ruckusing_BaseMigration {

    public function up() {
        
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
    
  
        
        
        
        
    }

//up()

    public function down() {
        
        $this->drop_table('property-types');
        $this->drop_table('properties_property-types');
    }

//down()
}

?>