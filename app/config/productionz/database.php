<?
return array(
'connections' => array(

	

		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => $_SERVER['DB2_HOST'],
			'database'  => $_SERVER['DB2_NAME'],
			'username'  => $_SERVER['DB2_USER'],
			'password'  => $_SERVER['DB2_PASS'],
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => ''
		)
		)
);