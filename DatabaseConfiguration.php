<?php

/**
 * A Piwik plugin to set database credentials based on environment variables
 */

namespace Piwik\Plugins\DatabaseConfiguration;

class DatabaseConfiguration extends \Piwik\Plugin
{
	public function registerEvents()
	{
		return [
			'Db.getDatabaseConfig' => 'getDatabaseConfig'
		];
	}

	public function getDatabaseConfig(&$dbConfig)
	{
		if (isset($_SERVER['PRESSFLOW_SETTINGS'])) {
	  		$env_settings = json_decode($_SERVER['PRESSFLOW_SETTINGS'], TRUE);
			$db = $env_settings['databases']['default']['default'];

			$dbConfig['host'] = $db['host'];
			$dbConfig['dbname'] = $db['database'];
			$dbConfig['username'] = $db['username'];
			$dbConfig['password'] = $db['password'];
			$dbConfig['port'] = $db['port'];	
		}
	}
}
