<?php


//----------------------------
// DATABASE CONFIGURATION
//----------------------------
$ruckusing_db_config = array(
	
  'development' => array(
     'type'      => 'mysql',
     'host'      => 'localhost',
     'port'      => 3306,
     'database'  => 'propiedad_santiaguera',
     'user'      => '5050mkt',
     'password'  => 'sle9her'
  ),

	'test' 					=> array(
			'type' 			=> 'mysql',
			'host' 			=> 'localhost',
			'port'			=> 3306,
			'database' 	=> 'php_migrator_test',
			'user' 			=> 'root',
			'password' 	=> ''
	),
	'production' 		=> array(
			'type' 			=> 'mysql',
			'host' 			=> 'mysql.propiedad_santiaguera.com',
			'port'			=> 3306,
			'database' 	=> 'propiedad_santiaguera',
			'user' 			=> '5050mkt',
			'password' 	=> ''
	)
	
);


?>
