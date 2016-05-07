<?php

return [
	'paths' => [
		'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
		'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds',
	],
	'environments' => [
		'default_migration_table' => 'phinxlog',
		'default_database' => 'development',
		'development' => [
			'adapter' => 'pgsql',
			'host' => 'pgsql',
			'name' => getenv('AGARESINFO_PGSQL_1_ENV_POSTGRES_DB'),
			'user' => getenv('AGARESINFO_PGSQL_1_ENV_POSTGRES_USER'),
			'pass' => getenv('AGARESINFO_PGSQL_1_ENV_POSTGRES_PASSWORD'),
			'charset' => 'utf-8'
		]
	]
];