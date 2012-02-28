<?php


//----------------------------
// DATABASE CONFIGURATION
//----------------------------
$ruckusing_db_config = array(
	
  'development' => array(
     'type'      => 'mysql',
     'host'      => 'localhost',
     'port'      => 3306,
     'database'  => 'propiedom',
     'user'      => '5050mkt',
     'password'  => 'sle9her'
  ),

	'test' 					=> array(
			'type' 			=> 'mysql',
			'host' 			=> 'mysql.5050mkt.com',
			'port'			=> 3306,
			'database' 	=> 'propiedom',
			'user' 			=> '5050mkt',
			'password' 	=> 'sle9her'
	),
	'production' 		=> array(
			'type' 			=> 'mysql',
			'host' 			=> 'mysql.5050mkt.com',
			'port'			=> 3306,
			'database' 	=> 'propiedad_santiaguera',
			'user' 			=> '5050mkt',
			'password' 	=> 'sle9her'
	)
	
);


?>
