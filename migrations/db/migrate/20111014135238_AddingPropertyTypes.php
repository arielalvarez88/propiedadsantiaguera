<?php

class AddingPropertyTypes extends Ruckusing_BaseMigration {

    public function up() {
        $this->execute("SET NAMES 'utf8'");
        $propertyTypes = $this->create_table('property_types');
        $propertyTypes->column('name', 'string');
        $propertyTypes->column('description', 'text');        
        $propertyTypes->finish();
        
        $this->execute("INSERT INTO property_types (name,description) VALUES  ('Casa','casa')");
        $this->execute("INSERT INTO property_types (name,description) VALUES  ('Apartamento','Apartamento')");
        $this->execute("INSERT INTO property_types (name,description) VALUES  ('Solar','Solar')");
        $this->execute("INSERT INTO property_types (name,description) VALUES  ('Penthouse','Penthouse')");
        $this->execute("INSERT INTO property_types (name,description) VALUES  ('Local Comercial','Local Comercial')");
        $this->execute("INSERT INTO property_types (name,description) VALUES  ('Edificio','Edificio')");
        $this->execute("INSERT INTO property_types (name,description) VALUES  ('Nave industrial','Nave industrial')");
        $this->execute("INSERT INTO property_types (name,description) VALUES  ('Oficina','Oficina')");
        $this->execute("INSERT INTO property_types (name,description) VALUES  ('Finca','Finca')");
        
        $propertyTypesJoin = $this->create_table('properties_property_types');
        $propertyTypesJoin->column('property_id', 'integer');
        $propertyTypesJoin->column('property_type_id', 'integer');        
        $propertyTypesJoin->finish();
    
    }

//up()

    public function down() {
        
        $this->drop_table('property_types');
        $this->drop_table('properties_property_types');
    }

//down()
}

?>