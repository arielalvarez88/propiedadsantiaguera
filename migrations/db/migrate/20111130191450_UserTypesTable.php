<?php

class UserTypesTable extends Ruckusing_BaseMigration {

    public function up() {
        $this->execute("SET NAMES 'utf8'");
        $userType = $this->create_table('user_types');
        $userType->column('name', 'string', array('limit' => 50));
        $userType->column('description', 'text');
        $userType->finish();
        
        $this->execute("INSERT INTO user_types (name,description) VALUES ('Particular','Usuario Particular')");
        $this->execute("INSERT INTO user_types (name,description) VALUES ('Empresa','Inmobiliarias, Financieras, Constructoras, etc')");
        $this->execute("INSERT INTO user_types (name,description) VALUES ('Agentes de Empresas','Agentes de las empresas')");
        $this->execute("INSERT INTO user_types (name,description) VALUES ('Agentes Independientes','Agentes Independientes')");

        $userTypeJoin = $this->create_table('user_types_users');
        $userTypeJoin->column('user_type_id', 'string', array('limit' => 20));
        $userTypeJoin->column('user_id', 'text');
        $userTypeJoin->finish();
    }

//up()

    public function down() {
        $this->drop_table('user_types');
        $this->drop_table('user_types_users');
    }

//down()
}

?>