<?php
/*
 *
			'name' => ,
			'user' => ,
			'pass' => getenv(''),
			'charset' => 'utf-8'
 */
$container->setParameter('db_hostname', 'pgsql');
$container->setParameter('db_name', getenv('AGARESINFO_PGSQL_1_ENV_POSTGRES_DB'));
$container->setParameter('db_username', getenv('AGARESINFO_PGSQL_1_ENV_POSTGRES_USER'));
$container->setParameter('db_password', getenv('AGARESINFO_PGSQL_1_ENV_POSTGRES_PASSWORD'));
