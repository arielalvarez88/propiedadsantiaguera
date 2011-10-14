<?php

class AddingPropertyFeatures extends Ruckusing_BaseMigration {

    public function up() {
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
                $this->drop_table('property-features');
        $this->drop_table('properties_property-features');
    }

//down()
}

?>