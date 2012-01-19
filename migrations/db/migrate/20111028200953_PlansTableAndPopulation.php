<?php

class PlansTableAndPopulation extends Ruckusing_BaseMigration {

    public function up() {
        $this->execute("SET NAMES 'utf8'");
        $plans = $this->create_table('plans');
        $plans->column('name', 'string', array('limit' => 39));        
        $plans->column('description', 'text');
        $plans->column('price', 'integer');                
        $plans->column('number_of_posts', 'integer');
        $plans->finish();
        
         $this->execute("INSERT INTO plans (name,description,price,number_of_posts) VALUES ('Básico','',1500,1)");
        $this->execute("INSERT INTO plans (name,description,price,number_of_posts) VALUES ('Plus','',6000,5)");
        $this->execute("INSERT INTO plans (name,description,price,number_of_posts) VALUES ('Agente','',10000,10)");
        $this->execute("INSERT INTO plans (name,description,price,number_of_posts) VALUES ('Inmobiliaria','',20000,25)");
    }

//up()

    public function down() {
        $this->drop_table("plans");
    }

//down()
}
?>