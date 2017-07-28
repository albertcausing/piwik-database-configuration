Piwik Database Configuration plugin
===

This repo is a simple plugin for the Piwik web analytics package to set database credentials
based on environment variables. This is great for containerisation, since it means that one
container image is good for all environments.

It should work with both Piwik 2 and Piwik 3.

Installation
---

To start with I empty the settings in `config.ini.php`, to ensure that connection information
only comes through environment variables:

	; file automatically generated or modified by Piwik; you can manually override the default values in global.ini.php by redefining them in this file.
	[database]
	host = ""
	username = ""
	password = ""
	dbname = ""

Next, copy the `DatabaseConfiguration.php` file into `plugins/DatabaseConfiguration/DatabaseConfiguration.php` in the Piwik project.

Finally, there are two configuration changes to be made:

1. Add the following to `config.ini.php`. If you are Dockerising you will probably have a full copy of
this file in your repo:

        [PluginsInstalled]
        PluginsInstalled[] = "DatabaseConfiguration"

(You don't need to add `[PluginsInstalled]` if you add this into the existing section of that name,
of course).

2. Add the following to the end of the `[Plugins]` section in your `global.ini.php`. If you are
Dockerising, you will need a script to insert the additional line in the right block; it is not
sufficient to merely append it.

        Plugins[] = DatabaseConfiguration


