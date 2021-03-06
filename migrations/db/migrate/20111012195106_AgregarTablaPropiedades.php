<?php

class AgregarTablaPropiedades extends Ruckusing_BaseMigration {

    public function up() {
        $this->execute("SET NAMES 'utf8'");
        $propiedades = $this->create_table('properties');
        $propiedades->column('title','string',array('limit' =>50));
        $propiedades->column('province','integer');
        $propiedades->column('description', 'text');
        $propiedades->column('address', 'text');        
        $propiedades->column('sell_price_us', 'integer');
        $propiedades->column('sell_price_dr', 'integer');
        $propiedades->column('rent_price_us', 'integer');
        $propiedades->column('rent_price_dr', 'integer');
        $propiedades->column('display_property', 'boolean',array('default' => 0));
        $propiedades->column('days_left', 'integer',array('default' => 0));
        $propiedades->column('neighborhood', 'integer', array('limit' => 4));
        $propiedades->column('coordenates', 'string', array('limit' => 100));
        $propiedades->column('visits', 'integer',array('default' => 0));
        $propiedades->column('bedrooms', 'integer', array('limit' => 3));
        $propiedades->column('bathrooms', 'integer', array('limit' => 3));
        $propiedades->column('livingrooms', 'integer', array('limit' => 3));
        $propiedades->column('kitchens', 'integer', array('limit' => 3));
        $propiedades->column('parkings', 'integer', array('limit' => 3));
        $propiedades->column('terrain', 'integer',array('limit' => 4));
        $propiedades->column('construction', 'integer',array('limit' => 4));
        $propiedades->column('stories', 'integer', array('limit' => 3));        
        $propiedades->column('post_date', 'datetime');        
        $propiedades->column('photos_number', 'integer', array('limit' => 2));
        $propiedades->column('condition', 'integer', array('limit' => 2));       
        $propiedades->column('main_photo', 'text');
        $propiedades->column('type', 'integer', array('limit' => 2));
        $propiedades->column('auto_reactivation', 'boolean', array('default'=> 0));
        $propiedades->column('expiration_email_sent', 'boolean', array('default'=> 0));
        $propiedades->column('video', 'text');
        $propiedades->finish();
        
            $propiedadesUsersJoin = $this->create_table('properties_users');
        $propiedadesUsersJoin->column('property_id', 'text');
        $propiedadesUsersJoin->column('user_id', 'integer');
        $propiedadesUsersJoin->finish();
        
       
        
        
        
    }

//up()

    public function down() {
                $this->drop_table('properties');
                $this->drop_table('properties_users');
                
    }

//down()
}

?>