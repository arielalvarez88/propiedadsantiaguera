<?php

class CreatingFilesTablesAndRelatedJoinTables extends Ruckusing_BaseMigration {

    public function up() {

        $files = $this->create_table("files");
        $files->column("path" , "string");
        $files->column("type" , "integer");


        $file_types = $this->create_table("file_types");
        $file_types->column("name" , "string", array("limit" => 40));
        $file_types->column("description" , "string", array("limit" => 80));



        $files_properties = $this->create_table("files_properties");
        $files_properties->column("property_id", "integer");
        $files_properties->column("file_id", "integer");
        



        $file_types_files = $this->create_table("file_types_files");
        $file_types_files->column("file_id" , "integer");
        $file_types_files->column("file_type_id" , "integer");


        $files->finish();
        $file_types->finish();
        $file_types_files->finish();
        $files_properties->finish();
    }

//up()

    public function down() {
        $this->drop_table("files");
        $this->drop_table("file_types");
        $this->drop_table("files_properties");
        $this->drop_table("file_types_files");
    }

//down()
}

?>