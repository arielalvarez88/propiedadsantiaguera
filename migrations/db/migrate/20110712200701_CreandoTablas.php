<?php

class CreandoTablas extends Ruckusing_BaseMigration {

    public function up() {
        
        $this->execute("SET NAMES 'utf8'");
        $users = $this->create_table('users');
        $users->column('name', 'string', array('limit' => 20));
        $users->column('lastname', 'string', array('limit' => 20));
        $users->column('email', 'string', array('limit' => 40));
        $users->column('password', 'string', array('limit' => 40));
        $users->column('website', 'string', array('limit' => 60));
        $users->column('description', 'text');
        $users->column('photo', 'string');
        $users->column('tel', 'string', array('limit' => 10));
        $users->column('cel', 'string', array('limit' => 10));
        $users->column('fax', 'string', array('limit' => 10));
        $users->column('rnc', 'string', array('limit' => 20));
        $users->column('address', 'text', array('limit' => 100));
        $users->column('registration_date', 'datetime');
        $users->column('payment_status', 'boolean');
        $users->column('total_posts', 'integer');        
        $users->column('posts_left', 'integer', array('default'=>0));
        
       
        
        
       
        
        

//        
//        

//        
//        
//        $propertyStatus = $this->create_table('property-statuses');
//        $propertyStatus->column('name', 'string');
//        $propertyStatus->column('description', 'text');
//        
//        $propertyStatusJoin = $this->create_table('properties_property-statuses');
//        $propertyStatusJoin->column('property-status_id', 'string');
//        $propertyStatusJoin->column('property_id', 'string');
//        
//        $propertyLeaserTypes = $this->create_table('property-lease-types');
//        $propertyLeaserTypes->column('name', 'string');
//        $propertyLeaserTypes->column('description', 'text');
//        
//        $propertyLeaserTypesJoin = $this->create_table('properties_property-lease-types');
//        $propertyLeaserTypesJoin->column('property-lease-type_id', 'string');
//        $propertyLeaserTypesJoin->column('property_id', 'string');
//        
//   
//        
//        $userType = $this->create_table('user-types');
//        $userType->column('name', 'string', array('limit' => 20));
//        $userType->column('description', 'text');
//        
//        $userTypeJoin = $this->create_table('user-types_users');
//        $userTypeJoin->column('user-type_id', 'string', array('limit' => 20));
//        $userTypeJoin->column('user_id', 'text');
//        
//        
//
//        
//        $agents = $this->create_table('agents');
//        $agents->column('name', 'string', array('limit' => 20));
//        $agents->column('lastname', 'string', array('limit' => 20));
//        $agents->column('email', 'string', array('limit' => 40));        
//        $agents->column('photo', 'string', array('limit' => 60));
//        $agents->column('tel', 'string', array('limit' => 10));
//        $agents->column('cel', 'string', array('limit' => 10));
//        
//        $agentsJoin = $this->create_table('agents_users');
//        $agentsJoin->column('user_id', 'string', array('limit' => 20));
//        $agentsJoin->column('agents_id', 'string', array('limit' => 20));
//        
//        $plans = $this->create_table('plans');
//        $plans->column('name', 'string', array('limit' => 20));
//        $plans->column('description', 'text');
//        $plans->column('price_per_property', 'string', array('limit' => 3));
//        $plans->column('number_of_properties', 'string', array('limit' => 3));
//        
//        

        

        $users->finish();

//        $propiedades->finish();
//        $propertyTypes->finish();
//        $propertyTypesJoin->finish();
//        $propertyStatus->finish();
//        $propertyStatusJoin->finish();
//        $propertyLeaserTypes->finish();
//        $propertyLeaserTypesJoin->finish();
//        
//        $userType->finish();
//        $userTypeJoin->finish();
//        $agents->finish();
//        $agentsJoin->finish();
//        $plans->finish();
//        $files->finish();
        
    }

//up()

    public function down() {
        $this->drop_table('users');
        
//        $this->drop_table('propiedades');
//        $this->drop_table('archivos');
//        $this->drop_table('tipos_usuarios');
//        $this->drop_table('tipos_usuarios_usuarios');
//        $this->drop_table('tipos_propiedades');
//        $this->drop_table('propiedades_usuarios');
//        $this->drop_table('estados_propiedades');
//        $this->drop_table('propiedades_tipos_propiedades');
//        $this->drop_table('estados_propiedades_propiedades');
//        $this->drop_table('tipos_archivos');
//        $this->drop_table('archivos_tipos_archivos');
//        $this->drop_table('caracteristicas_propiedades');
//        $this->drop_table('caracteristicas_propiedades_propiedades');
    }

//down()
}

?>
